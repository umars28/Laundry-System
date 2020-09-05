<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contact = ContactUs::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'contact_number' => 'required',
            'email' => 'required|email|unique:contact_us,email,' .$id,
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required'
        ]);
        $contact = ContactUs::findOrFail($id);
        $contact->contact_number = $request->contact_number;
        $contact->email = $request->email;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->whatsapp = $request->whatsapp;
        $contact->saveOrFail();
        session()->flash('success', 'Data berhasil diupdate');
        return redirect()->back();
    }
}
