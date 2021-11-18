<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Stok;
use App\Models\TransaksiStok;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barangs = Barang::with('stoks.transaksi_stoks')
            ->when(!empty($request->s), function($query) use ($request) {
                $search = $request->s;
                return $query->where('nama', 'like', "%$search%");
            })
            ->orderBy('nama')
            ->paginate(15);

        foreach ($barangs as $barang) {
            $terjual = 0;
            foreach ($barang->stoks->transaksi_stoks as $transaksi_stok) {
                if ($transaksi_stok->is_keluar) {
                    $terjual += $transaksi_stok->qty;
                }
            }
            $barang['terjual'] = $terjual;
        }

        // echo '<pre>';
        // foreach ($barangs as $barang) {
        //     print_r(['transaksi_stoks' => $barang->stoks->transaksi_stoks->toArray()]);
        // }
        // echo '</pre>';

        // dd($barangs);

        return view('pages.barang.index', [
            'asset'     => 'barang/barang',
            'search'    => $request->s,
            'barangs'   => $barangs,
        ]);
    }

    public function getBarang(Request $request)
    {
        $barangs = Barang::when(!empty($request->s), function($query) use ($request) {
                $search = $request->s;
                return $query->where('nama', 'like', "%$search%");
            })
            ->orderBy('nama')
            ->limit(5)
            ->get();

        $response = array();
        foreach($barangs as $barang){
            $barang->value = $barang->_id;
            $barang->label = $barang->nama;
            $barang->harga_modal = number_format($barang->harga_modal, 0, '', '.');
            $barang->harga_jual = number_format($barang->harga_jual, 0, '', '.');
        }

        return response()->json([
            'success' => true,
            'message' => 'get data success',
            'data' => $barangs,
        ]);
    }

    public function create()
    {
        return view('pages.barang.create', [
            'asset' => 'barang/barang'
        ]);
    }

    public function store(Request $request)
    {
        // var_dump($request->tanggal_masuk . ' ' . $request->waktu_masuk);
        $tgl_transaksi = new Carbon($request->tanggal_masuk . ' ' . $request->waktu_masuk);
        // die(var_dump(str_replace('.', '', $request->harga_modal)));

        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->harga_modal = str_replace('.', '', $request->harga_modal);
        $barang->harga_jual = str_replace('.', '', $request->harga_jual);
        $barang->deskripsi = $request->deskripsi;
        $barang->note = $request->note;
        $barang->save();

        $stok = new Stok;
        $stok->barang_id = $barang->_id;
        $stok->qty = $request->qty;
        $stok->note = $request->stok_note;
        $stok->save();

        $t_stok = new TransaksiStok;
        $t_stok->stok_id = $stok->_id;
        $t_stok->qty = $request->qty;
        $t_stok->tgl_transaksi = $tgl_transaksi->toDateTimeString();
        $t_stok->note = $request->stok_note;
        $t_stok->save();

        return redirect('/barang');
    }

    public function show(Barang $barang)
    {
        //
    }

    public function edit(Barang $barang)
    {
        //
    }

    public function update(Request $request, Barang $barang)
    {
        //
    }

    public function destroy(Barang $barang)
    {
        //
    }
}
