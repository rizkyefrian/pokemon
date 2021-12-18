<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $response = Http::get('https://pokeapi.co/api/v2/pokemon');
        $dt = $response->json();
        $data = $dt['results']; //list
        foreach($data as $key=>$dt){
            $url = $dt['url'];
            $responses = Http::get($url);//detail
            $dts = $responses->json(); 
            $data[$key]['types']      = $dts['types']; 
         } 
         return view('stats.index', [
            'datas' => $data
        ]); 
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$id);
         $data = $response->json();
         $types = $data['types'];
         $species = $data['species']['url'];
         $stats = $data['stats'];
         $abilities = $data['abilities'];
         
         $response = Http::get($species);
         $data2 = $response->json();
         $sp = $data2['flavor_text_entries'][7];
         
         $response = Http::get('https://pokeapi.co/api/v2/evolution-chain/'.$id);
         $data3 = $response->json();
         $idd = $data3['id'];
         $chain = $data3['chain']['evolves_to'];
        //  dd($chain);
        //  dd($data3); 
         return view('stats.detail', [
            'species' => $data['species'],
            'sprites' => $data['sprites'],
            'types' => $types,
            'desc' => $sp,
            'stats' => $stats,
            'chain' => $chain,
            'id' => $idd,
            'abilities' => $abilities
        ]); 
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
