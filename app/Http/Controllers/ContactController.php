<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Store a newly submitted contact form.
     */
    public function store(Request $request)
    {
        // 1) Validate the incoming data
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'message' => 'required|string',
        ]);

        // 2) Save into the database
        Contact::create($data);

        // 3) Redirect back with a flash message
        return back()->with('success', 'Thanks for getting in touch! We’ll reply soon.');
    }
}
