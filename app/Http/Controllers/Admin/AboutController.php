<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $about = About::findOrFail($id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->saveOrFail();
        session()->flash('success', 'Data berhasil diupdate');
        return redirect()->back();
    }
}
