<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Card;
use Nette\Utils\Json;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card= new Card();
        // Get Request data
        $card->name = $request->name;
        $card->linkedin_url = $request->linkedin_url;
        $card->github_url = $request->github_url;
        // Save data in to Data Base
        $card->save();
        //return QrCode::size(100)->generate('http://localhost:3000/'.$card->name);
        return 'http://localhost:3000/scan/'.$card->name;

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $card = \App\Models\Card::where('name', 'Like',"$name")->get();
        return response()->json($card,200);
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
