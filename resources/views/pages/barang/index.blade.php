@extends('layouts.default')

@section('content')
<section>
    <div class="card">
        <div class="card-header flex d-flex justify-content-between align-items-center">
            <h2 class="my-auto font-weight-bold">Barang</h2>
            <nav class="navbar navbar-light row d-flex">
                <a href="/barang/create"><div class="btn btn-primary mr-3 text-uppercase">NEW ITEM</div></a>
                <form class="form-inline" action="/barang" method="GET">
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
                        <th class="text-center align-middle">No</th>
                        <th class="text-center align-middle">Nama</th>
                        <th class="text-center align-middle">Harga Modal</th>
                        <th class="text-center align-middle">Harga Jual</th>
                        <th class="text-center align-middle">Total Stok</th>
                        <th class="text-center align-middle">Stok Terjual</th>
                        <th class="text-center align-middle">Stok Tersisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td class="text-center">{{$loop->iteration + $barangs->firstItem() - 1}}.</td>
                        <td>{{$barang->nama}}</td>
                        <td class="text-center">Rp.{{number_format($barang->harga_modal, 0, '', '.')}},-</td>
                        <td class="text-center">Rp.{{number_format($barang->harga_jual, 0, '', '.')}},-</td>
                        <td class="text-center">{{$barang->stoks->qty + $barang->terjual}}</td>
                        <td class="text-center">{{$barang->terjual}}</td>
                        <td class="text-center">{{$barang->stoks->qty}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        {{-- <td colspan="6" align="right">barangs</td> --}}
                        <td colspan="6">
                            <div class="float-right">{{ $barangs->links() }}</div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@stop