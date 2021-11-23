@php 
    $border = 'border: 1px solid black;';
@endphp
<table>
    <thead>
        <tr>
            <th style="background-color: #ADD8E6;{{$border}}" align="center">No</th>
            <th style="background-color: #ADD8E6;{{$border}}" align="center">Nama</th>
            <th style="background-color: #ADD8E6;{{$border}}" align="center">Harga Modal</th>
            <th style="background-color: #ADD8E6;{{$border}}" align="center">Harga Jual</th>
            <th style="background-color: #ADD8E6;{{$border}}" align="center">Waktu Create</th>
            <th style="background-color: #ADD8E6;{{$border}}" align="center">Waktu Update</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
            $even = 'background-color: #E0FFFF';
        @endphp
        @foreach ($barangs as $barang)
        @php ($style = ($no % 2 == 0) ? $even : '')
        <tr>
            <td style="{{$border}}background-color: #ADD8E6;">{{$no++}}.</td>
            <td style="{{$border . $style}}">{{$barang->nama}}</td>
            <td style="{{$border . $style}}" align="right">Rp.{{number_format($barang->harga_modal, 0, '', '.')}},-</td>
            <td style="{{$border . $style}}" align="right">Rp.{{number_format($barang->harga_jual, 0, '', '.')}},-</td>
            <td style="{{$border . $style}}" align="center">{{$barang->created_time}}</td>
            <td style="{{$border . $style}}" align="center">{{$barang->updated_time}}</td>
        </tr>
        @endforeach
    </tbody>
</table>