<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Client;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();
        return view('/index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('create');

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
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'phone'=> 'required',
            'agree'=> 'required'
      ]);

        $client = new Client;
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->phone = $request->input('phone');
        $client->call_time = $request->input('call_time');
        $client->agree = $request->input('agree');
        $client->save();
        return redirect('/')->with('success', 'Klient vytvořen');
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
        $client = Client::find($id);
        return view ('show')->with('client', $client);
    }

    public function download(){

        $client = Client::find($id);

        /* return view ('index')->with('client', $client); */

    }
}