<?php

namespace App\UseCases\Master\Entry;

use App\Models\Entry;

class ListAction{
    /**
     * __invoke
     *
     * @param string $filters_json
     * @param array $fileds
     * @return array
     */
    public function __invoke(string $filters_json, array $fileds): array
    {
        $filters = json_decode($filters_json, true);
        $wheres = [];
        if(isset($filters['full_name']) && $filters['full_name'] != '') {
            $wheres[] = ['full_name', 'LIKE', '%'. $filters['full_name']. '%'];
        }
        return Entry::where($wheres)
                    ->select($fileds)
                    ->orderBy('created_at')
                    ->get()
                    ->toArray();
    }
}
