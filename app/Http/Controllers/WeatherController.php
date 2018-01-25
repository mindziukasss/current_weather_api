<?php

namespace App\Http\Controllers;

use Gmopx\LaravelOWM\LaravelOWM;
use Illuminate\Http\Request;


class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $city = $request->city;
        $api_key = $request->lowm;

        $del = 'https://www.delfi.lt/';
        $wunderground = 'http://api.wunderground.com/api/';
        $qwtm = 'http://api.openweathermap.org/data/2.5/weather?q=';

        if((!empty($t = file_get_contents($del))) &&
            !empty(json_decode($t) && (strlen($api_key) === 10 )))
        {
            $current_weather = file_get_contents($del);
        }
        elseif((!empty($t = file_get_contents($wunderground.$api_key.'/conditions/q/CA/'.$city.'.json'))) &&
            !empty(json_decode($t)) && (strlen($api_key) === 16 ))
        {
            $current_weather = file_get_contents($wunderground.$api_key.'/conditions/q/CA/'.$city.'.json');
            $from = "https://www.wunderground.com";
        }
        elseif((!empty($t = file_get_contents($qwtm .$city.'&appid='.$api_key))) &&
            !empty(json_decode($t)) && (strlen($api_key) === 32 ))
        {
            $current_weather = file_get_contents($qwtm.$city.'&appid='.$api_key);
            $from = "https://openweathermap.org";
        }

        else
        {
            $current_weather = null;
        }

        $current_weather = json_decode($current_weather);


        return view('weather.data')->with(['current_weather' => $current_weather,'from' => $from]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weather.weather');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
