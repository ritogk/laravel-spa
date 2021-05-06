<?php

namespace App\UseCases\Admin\Master\General;

use Maatwebsite\Excel\Facades\Excel;
use App\Excel\Exports\GeneralsExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportAction{
    /**
     * __invoke
     *
     * @return BinaryFileResponse
     */
    public function __invoke(): BinaryFileResponse
    {
        return Excel::download(new GeneralsExport, 'generals.xlsx');
    }
}
