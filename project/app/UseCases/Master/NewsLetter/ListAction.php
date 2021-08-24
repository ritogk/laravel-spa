<?php

namespace App\UseCases\Master\NewsLetter;

use App\Models\NewsLetter;

class ListAction{
    /**
     * __invoke
     *
     * @param string $filter
     * @param string $fileds
     * @return array
     */
    public function __invoke(string $filter, string $fileds): array
    {
        return NewsLetter::where(json_decode($filter, true))
                        ->select(json_decode($fileds, true))
                        ->orderBy('updated_at')
                        ->get()
                        ->toArray();
    }
}
