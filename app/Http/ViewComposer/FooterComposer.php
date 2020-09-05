<?php


namespace App\Http\ViewComposer;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Paket;

class FooterComposer
{
    public function compose(View $view) {
        $abouts = DB::table('abouts')->select('description')->first();
        $contact = DB::table('contact_us')->first();
        $pakets = Paket::all();
        $view->with([
            'abouts' => $abouts,
            'contact' => $contact,
            'pakets' => $pakets
        ]);
    }
}
