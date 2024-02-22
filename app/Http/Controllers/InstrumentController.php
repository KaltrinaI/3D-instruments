<?php

namespace App\Http\Controllers;

use App\Models\InstrumentsFamily;
use App\Models\InstrumentsInfo;
use Illuminate\Routing\Controller as Controller;

class InstrumentController extends Controller
{
    public function home() {
        $post = InstrumentsInfo::orderBy('created_at','desc')->take(3)->get();
        return view('home', ['post' => $post]);
    }


    public function instruments($id) {

        $posts = InstrumentsInfo::where('instrument_family' ,$id)->orderBy('created_at','desc')->paginate(9);

        $data = array('family' => $id, 'instruments' => $posts );

        return view('instruments.catalogue')->with($data);
    }

    public function instrument_info($id, $index) {

        $instrument = InstrumentsInfo::find($index);

        $family = InstrumentsFamily::find($id);

        $data = array('instrument' => $instrument, 'family_name' => $family);

        return view('instruments.instrument_info')->with($data);
    }

    public function instrument_info_home($id, $index) {

        $instrument = InstrumentsInfo::find($index);

        $family = InstrumentsFamily::find($id);

        $data = array('instrument' => $instrument, 'family_name' => $family);

        return view('instruments.instrument_info_home')->with($data);
    }

}
