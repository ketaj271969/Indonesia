<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use App\Provinces;
use App\ptbtregion;
use App\ptbtcountry;
use App\ptbtstprov;
use App\ptbtcity;
//use App\Regencies;
use App\Districts;
use App\Villages;

class CountryController extends Controller
{

    // public function provinces(){
    public function ptbtregion()
    {
        // $provinces = Provinces::all();
        // return view('indonesia', compact('provinces'));
        $ptbtregion = ptbtregion::all();
        return view('indonesia', compact('ptbtregion'));
    }

    //public function regencies()
    public function ptbtcountry()
    {
        //$provinces_id = Input::get('province_id');
        //$regencies = Regencies::where('province_id', '=', $provinces_id)->get();
        //return response()->json($regencies);
        $ptbtregion_id = Input::get('PTBTRegionId');
        $countries = ptbtcountry::where('PTBTRegionId', '=', $ptbtregion_id)->get();
        return response()->json($countries);
    }

    //public function districts()
    public function ptbtstprov()
    
    {
        $ptbtcountry_id = Input::get('PTBTCountryId');
        $ptbtstprov = ptbtstprov::where('PTBTCountryId', '=', $ptbtcountry_id)->get();
        return response()->json($ptbtstprov);
    }

    public function ptbtcity()
    {
        $stprov_id = Input::get('PTBTStProvId');
        $villages = ptbtcity::where('PTBTStProvId', '=', $stprov_id)->get();
        return response()->json($villages);
    }
}