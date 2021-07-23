<?php

namespace App\UseCases\Master\Job;

use Maatwebsite\Excel\Facades\Excel;
use App\Excel\Exports\JobExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportAction{
    /**
     * __invoke
     *
     * @return BinaryFileResponse
     */
    public function __invoke(): BinaryFileResponse
    {
        return Excel::download(new JobExport, 'jobs.xlsx');
    }
}
