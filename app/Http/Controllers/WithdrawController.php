<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Approval;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Show the form for creating a new withdrawal request.
     */
    public function createWithdrawRequest()
    {
        return view('admin.withdraw.create')->render();
    }

    /**
     * Store a newly created withdrawal request in storage.
     */
    public function storeWithdrawRequest(Request $request)
    {
        if(auth()->user()->role != 'bidder'){
            return redirect()->back()->with('error', 'Sorry this request is not permitted for you..!');
        }
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        WithdrawRequest::create([
            'user_id' => Auth::id(),
            'amount'  => $request->amount,
            'status'  => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Withdrawal request submitted successfully.');
    }

    /**
     * Display a listing of the user's withdrawal requests.
     */
    public function listWithdrawRequests()
    {
        $withdrawRequests = WithdrawRequest::all();

        return view('admin.withdraw.list', compact('withdrawRequests'))->render();
    }

    /**
     * Show the form for creating a file with pending withdrawal requests.
     */
    public function createFile()
    {
        $pendingRequests = WithdrawRequest::where('status', 'pending')->get();

        return view('file.create', compact('pendingRequests'));
    }

    /**
     * Store the newly created file in storage.
     */
    public function storeFile(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'withdraw_requests' => 'required|array',
        ]);

        $file = File::create([
            'file_name' => $request->file_name,
            'status' => 'pending',
            'account_id' => Auth::id(),
        ]);

        $file->withdrawRequests()->attach($request->withdraw_requests);

        WithdrawRequest::whereIn('id', $request->withdraw_requests)
            ->update(['status' => 'under_review']);

        return redirect()->route('file.list')
            ->with('success', 'File created and requests submitted successfully.');
    }

    /**
     * Display a listing of the pending files for approval.
     */
    public function listFiles()
    {
        $files = File::where('status', 'pending')->get();

        return view('file.list', compact('files'));
    }

    /**
     * Approve or reject a file.
     */
    public function approveFile(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'comments' => 'nullable|string',
        ]);

        $file = File::findOrFail($id);

        if ($request->status === 'approved') {
            $file->status = 'submitted_to_ceo';
        } else {
            $file->status = 'rejected';
            $file->withdrawRequests()->update(['status' => 'rejected']);
        }

        $file->save();

        Approval::create([
            'file_id' => $file->id,
            'approved_by' => Auth::id(),
            'role' => 'business_head', // Adjust this based on the role of the current user
            'status' => $request->status,
            'comments' => $request->comments,
        ]);

        return redirect()->route('file.list')
            ->with('success', 'File has been processed.');
    }
}
