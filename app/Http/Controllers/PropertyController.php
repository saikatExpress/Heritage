<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Notifications\NewPostNotification;
use Illuminate\Support\Facades\Notification;

class PropertyController extends Controller
{
    /**
     * Display a listing of the properties with search and filter functionality.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = auth()->user()->role;

        $search = $request->input('search');
        $bedrooms = $request->input('bedrooms');

        $properties = Property::query()
            ->with(['owner']); // Eager load the owner relationship

        if ($role === 'bidder') {
            // When the user is a bidder, join bids and order by the highest bid
            $properties = $properties->leftJoin('bids', 'properties.id', '=', 'bids.property_id')
                ->select('properties.*')
                ->groupBy('properties.id')
                ->orderByRaw('MAX(bids.bid_amount) DESC')
                ->when($search, function ($query, $search) {
                    return $query->where('properties.title', 'like', "%{$search}%")
                                ->orWhere('properties.description', 'like', "%{$search}%");
                })
                ->when($bedrooms, function ($query, $bedrooms) {
                    return $query->where('properties.bedrooms', $bedrooms);
                });
        } else {
            $properties = $properties->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                            ->orWhere('description', 'like', "%{$search}%");
            })
            ->when($bedrooms, function ($query, $bedrooms) {
                return $query->where('bedrooms', $bedrooms);
            })
            ->where('owner_id', auth()->user()->id);
        }

        $properties = $properties->get();

        return view('properties.index', ['properties' => $properties]);
    }

    public function create()
    {
        return view('properties.create');
    }

    public function placeBid(Request $request, $propertyId)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:0',
        ]);

        $property = Property::findOrFail($propertyId);

        // Ensure bid is higher than the current highest bid
        $highestBid = $property->highestBid();
        $minBid = $highestBid ? $highestBid->bid_amount + 1 : $property->min_bid;

        if ($request->bid_amount < $minBid) {
            return back()->with('error', 'Your bid must be at least $' . $minBid);
        }

        // Create the bid
        Bid::create([
            'bidder_id' => auth()->id(),
            'property_id' => $propertyId,
            'bid_amount' => $request->bid_amount,
        ]);

        return back()->with('success', 'Bid placed successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'bedrooms'    => 'required|integer',
            'bathrooms'   => 'required|integer',
            'size'        => 'required|integer',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric',
            'image'       => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('property_images', 'public');
        }

        $post = Property::create([
            'title'       => $request->title,
            'description' => $request->description,
            'bedrooms'    => $request->bedrooms,
            'bathrooms'   => $request->bathrooms,
            'size'        => $request->size,
            'location'    => $request->location,
            'price'       => $request->price,
            'owner_id'    => auth()->user()->id,
            'image'       => $imagePath,
        ]);

        $users = User::where('id', '!=', auth()->id())->where('role', 'bidder')->get();
    
        // Batch size
        $batchSize = 1000;

        // Process users in batches
        $users->chunk($batchSize, function ($batch) use ($post) {
            Notification::send($batch, new NewPostNotification($post));
        });

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    /**
     * Display the specified property.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find property by ID
        $property = Property::findOrFail($id);
        $highestBid = $property->bids()->orderBy('bid_amount', 'desc')->first();

        // Return view with property details
        return view('properties.show', ['property' => $property, 'highestBid' => $highestBid]);
    }
}
