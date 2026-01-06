<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransfersExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize,WithEvents
{

    protected $transfers;

    public function __construct($transfers)
    {
        $this->transfers = $transfers;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->transfers->map(function ($transfer) {
            return[
                $transfer->id,
                $transfer->date,
                $transfer->serie,
                $transfer->correlative,
                $transfer->originWarehouse->name,
                $transfer->destinationWarehouse->name,
                $transfer->total,
            ];
        });
    }

    public function headings(): array
    {
        return[
            'id',
            'Fecha',
            'Serie',
            'Correlativo',
            'Almacén de Origen',
            'Almacén de Destino',
            'Total',
        ];
    }


    public function styles(Worksheet $sheet)
    {

        $lastRow = $sheet->getHighestRow();
        $lasColumn = $sheet->getHighestColumn();

        $fullRange = 'A1:' . $lasColumn . $lastRow;

        return[
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 14,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FFCCCCCC',
                    ],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ],
            $fullRange => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ]
        ];
    }


    public function registerEvents():array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getDelegate()->setSelectedCell(('A1'));
            }
        ];
    }
}
