@extends('layouts.default')

@section('content')
<section>

    {{ Form::open(array('url' => 'barang/'.$target, 'method' => $method)) }}
    <div class="card">
        <div class="card-header">
            <h2 class="my-auto font-weight-bold">Create Data Barang</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('nama', 'Nama Barang') !!}
                {!! Form::text('nama', @$barang->nama, ['placeholder' => 'Robot', 'id' => 'nama', 'class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('harga_modal', 'Harga Modal') !!}
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        {!! Form::text('harga_modal', @$barang->harga_modal, ['placeholder' => '12.500', 'id' => 'harga_modal', 'class' => 'form-control money', 'required']) !!}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('harga_jual', 'Harga Jual') !!}
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        {!! Form::text('harga_jual', @$barang->harga_jual, ['placeholder' => '15.000', 'id' => 'harga_jual', 'class' => 'form-control money', 'required']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('deskripsi', 'Deskripsi') !!}
                {!! Form::textarea('deskripsi', @$barang->deskripsi, ['id' => 'deskripsi', 'class' => 'form-control', 'rows' => 3, 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('note', 'Note') !!}
                {!! Form::text('note', @$barang->note, ['placeholder' => 'Optional', 'id' => 'note', 'class' => 'form-control', 'required']) !!}
            </div>
            @if (Route::currentRouteName() == 'barang.create')
            <div class="form-group">
                <h4 class="font-weight-bold mt-5">Data Stok</h4>
            </div>
            <div class="form-row">
                <div class="form-group col-md">
                        {!! Form::label('tanggal_masuk', 'Tanggal') !!}
                        <div class="form-row">
                            <div class="form-group col-md">{!! Form::text('tanggal_masuk', '', ['class' => 'form-control text-center datepicker', 'required']) !!}</div>
                            <div class="form-group col-md">{!! Form::time('waktu_masuk', '', ['class' => 'form-control text-center', 'required']) !!}</div>
                        </div>
                </div>
                <div class="form-group col-md">
                    {!! Form::label('qty', 'Quantity') !!}
                    {!! Form::number('qty', '', ['class' => 'form-control text-center money', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                    {!! Form::label('stok_note', 'Note') !!}
                    {!! Form::text('stok_note', '', ['placeholder' => 'Optional', 'class' => 'form-control', 'required']) !!}
            </div>
            @endif
        </div>
        <div class="mx-auto mb-4">
            <input class="btn btn-primary px-4 mr-2" type="button" value="TESTING" onclick="testkuy()">
            <input class="btn btn-primary px-4 ml-2" type="submit" value="SUBMIT">
        </div>
    </div>
    {{ Form::close() }}

</section>
@stop