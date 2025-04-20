<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'desc'); 
        $messages = \App\Models\Message::orderBy('created_at', $sortOrder)->get();
        return view('admin.messages.index', compact('messages', 'sortOrder'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create and save the new message
        $message = new Message();
        $message->first_name = $validated['first-name'];
        $message->last_name = $validated['last-name'];
        $message->email = $validated['email'];
        $message->subject = $validated['subject'];
        $message->content = $validated['message'];
        if (Auth::check()) {
            $message->user_id = Auth::id();
        }
        $message->save();

        session()->flash('success', 'Your message has been sent successfully!');

        // Redirect or return a response after saving the message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
