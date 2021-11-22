<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\TransaksiStok;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $penjualans = Penjualan::with('transaksi_stoks')
            ->when(!empty($request->s), function($query) use ($request) {
                $search = $request->s;
                return $query->where('nama_barang', 'like', "%$search%");
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        foreach ($penjualans as $penjualan) {
            $penjualan['date'] = \Carbon\Carbon::parse($penjualan->transaksi_stoks->tgl_transaksi)->setTimezone('Asia/Jakarta')->format('d M Y');
            $penjualan['time'] = \Carbon\Carbon::parse($penjualan->transaksi_stoks->tgl_transaksi)->setTimezone('Asia/Jakarta')->format('g:i A');
        }
        // echo '<pre>';
        // print_r($penjualans->toArray());
        // echo '</pre>';

        // return dd($penjualans);

        return view('pages.penjualan.index', [
            'asset' => 'penjualan/penjualan',
            'search'        => $request->s,
            'penjualans'    => $penjualans,
        ]);
    }

    public function create()
    {
        $tgl = date('d/m/Y');
        $time = date('H:i');
        return view('pages.penjualan.create', [
            'asset' => 'penjualan/penjualan',
            'tgl' => $tgl,
            'time' => $time,
        ]);
    }

    public function store(Request $request)
    {
        var_dump($request->tgl_transaksi . ' ' . $request->waktu_transaksi);
        $tgl_transaksi = Carbon::createFromFormat('d/m/Y H:i', $request->tgl_transaksi . ' ' . $request->waktu_transaksi);
        var_dump($tgl_transaksi->toDateTimeString());

        $total_modal = intval(implode('', explode('.', $request->total_modal)));
        $total_harga = intval(implode('', explode('.', $request->total_harga)));

        $barang_id = $request->barang_id;

        $stok = Stok::where('barang_id', $barang_id)->latest()->first();
        $stok->qty = intval($stok->qty) - intval($request->qty);
        $stok->save();
        $stok_id = $stok->_id;

        $trans_stok = new TransaksiStok;
        $trans_stok->stok_id = $stok_id;
        $trans_stok->qty = $request->qty;
        $trans_stok->is_keluar = true;
        $trans_stok->tgl_transaksi = $tgl_transaksi->toDateTimeString();
        $trans_stok->note = "Barang terjual";
        $trans_stok->save();
        $trans_stok_id = $trans_stok->_id;
        var_dump($trans_stok->_id);

        $penjualan = new Penjualan;
        $penjualan->transaksi_stok_id = $trans_stok_id;
        $penjualan->nama_barang = $request->nama_barang;
        $penjualan->harga_modal = $total_modal;
        $penjualan->total_harga = $total_harga;
        $penjualan->note = $request->note;
        $penjualan->save();


        return redirect('/penjualan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
