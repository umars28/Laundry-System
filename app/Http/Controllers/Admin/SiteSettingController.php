<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index() {
//        $setting = DB::table('setting')->select('key', 'value');
        // select dan pluck beda
//        $setting = Setting::all()->pluck('key', 'value');
        return view('admin.setting.index');
    }

    public function update(Request $request) {
        $updates = $request->all();
        foreach($updates as $key => $value) {
            if($key == 'main_content_background' || $key == 'image_logo' || $key == 'image_pavicon') {
                $file = $request->file($key);
                $filename = $file->getClientOriginalName();
                $file->storeAs('images/setting/', $filename, 'public');
                $value = $filename;
            }
            SiteSetting::where('key',$key)->update(['value' => $value]);
        }
        session()->flash('success', 'Data berhasil diupdate');
        return redirect()->back();
    }
}
