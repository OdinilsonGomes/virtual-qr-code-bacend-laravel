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
        if(!isset($request->name)){
            return response()->json('Error: Name can`t be null',450);
        }else if(!isset($request->linkedin_url)){
            return response()->json('Error: Linkedin URL can`t be null', 450);
        }else if(!isset($request->github_url)){
            return response()->json('Error: Github URL can`t be null', 450);
        }
        $exist = \App\Models\Card::where('name', 'Like',"$request->name")->get();
        if(count($exist)>0){
            return response()->json('Error: This name already exists. Names should be unique', 450);
        }
        $card->name = $request->name;
        $card->linkedin_url = $request->linkedin_url;
        $card->github_url = $request->github_url;
        // Save data in to Data Base
        $card->save();
        //return QrCode::size(100)->generate('http://localhost:3000/'.$card->name);
        $url='http://localhost:3000/scan/'.$card->name;
        return response()->json($url,200);

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
