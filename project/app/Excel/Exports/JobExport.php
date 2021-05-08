<?php

namespace App\Excel\Exports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

// マスタデータ出力
class JobExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents{
    // 出力ファイル中身
    public function collection(){
        return Job::all();
    }

    // ヘッダ
    public function headings():array{
        return ['id',
                'title',
                'content',
                'attention',
                'job_category_id',
                'price',
                'image',
                'sort_no',
                'created_at',
                'updated_at',
                'deleted_at',];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // 出力後に、全セルの書式を文字列に変更する
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
            },
        ];
    }
}
