<?php

namespace App\UseCases\Master\Entry;

use App\Models\Entry;

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
        return Entry::where(json_decode($filter, true))
                    ->select(json_decode($fileds, true))
                    ->orderBy('created_at')
                    ->get()
                    ->toArray();
    }
}
