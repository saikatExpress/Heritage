<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

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
        // Get search and filter parameters
        $search = $request->input('search');
        $bedrooms = $request->input('bedrooms');

        // Query to get properties
        $properties = Property::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->when($bedrooms, function ($query, $bedrooms) {
                return $query->where('bedrooms', $bedrooms);
            })
            ->get();

        // Return view with properties
        return view('properties.index', ['properties' => $properties]);
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'bedrooms'    => 'required|integer',
            'image'       => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('property_images', 'public');
        }

        Property::create([
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => 'Dhaka',
            'price'       => 103939,
            'bathrooms'   => 2,
            'bedrooms'    => $request->bedrooms,
            'size'        => 1200,
            'owner_id'    => auth()->user()->id,
            'image'       => $imagePath,
        ]);

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
