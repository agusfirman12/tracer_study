<?php

namespace App\Http\Controllers;


use App\Models\trc_bankSoal;
use Illuminate\Http\Request;

class BankSoalController extends Controller
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
    public function store($status,$skip)
    {
        $result = trc_bankSoal::where('type', $status)->orderBy('id')->skip($skip)->take(1)->get();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bankSoal  $bankSoal
     * @return \Illuminate\Http\Response
     */
    public function show(trc_bankSoal $bankSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bankSoal  $bankSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(trc_bankSoal $bankSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bankSoal  $bankSoal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trc_bankSoal $bankSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bankSoal  $bankSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(trc_bankSoal $bankSoal)
    {
        //
    }
}
