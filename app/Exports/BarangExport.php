<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Carbon\Carbon;

use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $barangs = Barang::all();
        
        foreach ($barangs as $item) {

            $item->created_time = Carbon::parse($item->created_at)->format('l H:i, d F Y');
            unset($item['created_at']);
            $item->updated_time = Carbon::parse($item->updated_at)->format('l H:i, d F Y');
            unset($item['updated_at']);
        }

        return view('exports.barang.index', ['barangs' => $barangs]);
    }

    public function registerEvents(): Array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
            }
        ];
    }
}
