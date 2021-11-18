<?php

namespace App\Http\Controllers;

use App\Models\TransaksiStok;
use Illuminate\Http\Request;

class TransaksiStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = TransaksiStok::get();

        dd($barangs);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiStok  $transaksiStok
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiStok $transaksiStok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiStok  $transaksiStok
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiStok $transaksiStok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiStok  $transaksiStok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiStok $transaksiStok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiStok  $transaksiStok
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiStok $transaksiStok)
    {
        //
    }
}
