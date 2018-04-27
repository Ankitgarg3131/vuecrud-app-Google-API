<?php

namespace App\Http\Controllers;
use App\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    function showDataMap(Request $request)
    {
        // "hello controller";
        $lat = $request->lat;
        $lng=$request->lng;
       
        $maps= Map::whereBetween('latitude',[$lat-0.1,$lat+0.1])->whereBetween('longitude',[$lng-0.1,$lng+0.1])->get();
        return $maps;
    }
}
