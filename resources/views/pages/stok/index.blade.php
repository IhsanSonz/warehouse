@extends('layouts.default')

@section('content')
<section>
    <div class="card">
        <div class="card-header flex d-flex justify-content-between align-items-center">
            <h2 class="my-auto font-weight-bold">Stok</h2>
            <nav class="navbar navbar-light bg-light row d-flex">
                <a href="/stok/create"><div class="btn btn-primary mr-3 text-uppercase">ADD STOK</div></a>
                <form class="form-inline" action="/stok" method="GET">
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
                        <th class="text-center align-middle">Nama</th>
                        <th class="text-center align-middle">Stok Awal</th>
                        <th class="text-center align-middle">Stok Terjual</th>
                        <th class="text-center align-middle">Stok Tersisa</th>
                        <th class="text-center align-middle">Catatan</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($stoks as $stok)
                    <tr class="table-data">
                        <td>
                            <div>
                                <p class="text-black">{{@$stok->barangs->nama}}</p>
                            </div>
                        </td>
                        <td class="text-center">{{$stok->qty + $stok->terjual}}</td>
                        <td class="text-center">{{$stok->terjual}}</td>
                        <td class="text-center">{{$stok->qty}}</td>
                        <td>{{$stok->note}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-700">
                        <td colspan="6" class="p-4 rounded-b-lg">
                            {{ $stoks->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@stop