<?php

namespace App\UseCases\Admin\Master\JobCategory;

use Maatwebsite\Excel\Facades\Excel;
use App\Excel\Exports\JobCategoriesExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportAction{
    /**
     * __invoke
     *
     * @return BinaryFileResponse
     */
    public function __invoke(): BinaryFileResponse
    {
        return Excel::download(new JobCategoriesExport, 'job_categories.xlsx');
    }
}
