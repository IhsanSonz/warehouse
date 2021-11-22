<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\TransaksiStok;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StokController extends Controller
{
    public function index(Request $request)
    {
        // $request->s = 'mobil';
        $search = $request->s;
        $stoks = Stok::with('barangs:nama')
            ->when(!empty($search), function ($query) use ($search) {
                return $query->whereHas('barangs', function ($query) use ($search) {
                    return $query->where('nama', 'like', "%$search%");
                });
            })
            ->with('transaksi_stoks')
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        foreach ($stoks as $i => $stok) {
            $terjual = 0;
            foreach ($stok->transaksi_stoks as $transaksi_stok) {
                if ($transaksi_stok->is_keluar) {
                    $terjual += $transaksi_stok->qty;
                }
            }
            $stok['terjual'] = $terjual;

            // if (empty($stok->barangs)) {
            //     unset($stoks[$i]);
            // }
        }

        // return dd($stoks);

        return view('pages.stok.index', [
            'asset' => 'stok/stok',
            'search'    => $request->s,
            'stoks'     => $stoks,
        ]);
    }

    public function create()
    {
        return view('pages.stok.create', [
            'asset' => 'stok/stok'
        ]);
    }

    public function store(Request $request)
    {
        var_dump($request->tanggal_masuk . ' ' . $request->waktu_masuk);
        $tgl_transaksi = new Carbon($request->tanggal_masuk . ' ' . $request->waktu_masuk);
        var_dump($tgl_transaksi->toDateTimeString());

        $barang_id = $request->barang_id;

        $trans_stok = new TransaksiStok;
        $trans_stok->qty = $request->qty;
        $trans_stok->is_keluar = false;
        $trans_stok->tgl_transaksi = $tgl_transaksi->toDateTimeString();
        $trans_stok->note = $request->note;

        $stok = Stok::where('barang_id', $barang_id)->latest()->first();
        $stok->qty = intval($stok->qty) + intval($request->qty);

        // dd($trans_stok);
        // dd($stok);
        // dd($stok->save());

        $trans_stok->save();
        $stok->save();

        return redirect('/stok');
    }

    public function show(Stok $stok)
    {
        //
    }

    public function edit(Stok $stok)
    {
        //
    }

    public function update(Request $request, Stok $stok)
    {
        //
    }

    public function destroy(Stok $stok)
    {
        //
    }
}
