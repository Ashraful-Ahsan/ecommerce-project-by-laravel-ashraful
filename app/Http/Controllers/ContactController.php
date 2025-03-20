<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // Store message in database
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }



    public function destroy($id)
    {
        $message = ContactMessage::find($id);

        if ($message) {
            $message->delete();
            return redirect()->back()->with('success', 'Message deleted successfully!');
        }

        return redirect()->back()->with('error', 'Message not found!');
    }



}
