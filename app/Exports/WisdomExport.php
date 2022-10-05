<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class WisdomExport implements FromView, ShouldAutoSize, WithEvents
{
    
    public function __construct($wisdomStudents)
    {
        $this->wisdomStudents = $wisdomStudents;
    }

    public function view(): View
    {
        return view('excel.wisdom-students',[
            'students'=>$this->wisdomStudents
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
