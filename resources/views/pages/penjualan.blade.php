@extends('layouts.default')

@section('content')
<section>
    <div class="card">
        <div class="card-header flex d-flex justify-content-between align-items-center">
            <h2 class="my-auto font-weight-bold">Penjualan</h2>
            <nav class="navbar navbar-light bg-light row d-flex">
                <form class="form-inline" action="/penjualan" method="GET">
                    <input class="form-control mr-sm-2" name="s" type="search" placeholder="Search Nama"
                        aria-label="Search" size="40" value="{{$search}}">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr class="table-head">
                        <th class="text-center align-middle" width="20%">Tanggal & Jam</th>
                        <th class="text-center align-middle">Nama Barang</th>
                        <th class="text-center align-middle" width="10%">Harga Modal</th>
                        <th class="text-center align-middle" width="5%">Stok Terjual</th>
                        <th class="text-center align-middle" width="10%">Total Harga</th>
                        <th class="text-center align-middle" width="10%">Total Keuntungan</th>
                        {{-- <th class="text-center">Catatan</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($penjualans as $penjualan)
                    <tr class="table-data">
                        <td class="text-center">{{$penjualan->date}}, &nbsp; {{$penjualan->time}}</td>
                        <td>{{$penjualan->nama_barang}}</td>
                        <td class="text-center">Rp.{{number_format($penjualan->harga_modal, 0, '', '.')}},-</td>
                        <td class="text-center">{{$penjualan->transaksi_stoks->qty}}</td>
                        <td class="text-center">Rp.{{number_format($penjualan->total_harga, 0, '', '.')}},-</td>
                        <td class="text-center">
                            Rp.{{number_format($penjualan->total_harga - $penjualan->harga_modal, 0, '', '.')}},-
                        </td>
                        {{-- <td>{{$penjualan->note}}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-700">
                        <td colspan="6" class="p-4 rounded-b-lg">
                            {{ $penjualans->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@stop