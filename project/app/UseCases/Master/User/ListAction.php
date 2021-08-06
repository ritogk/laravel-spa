<?php

namespace App\UseCases\Master\User;

use App\Models\User;

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
        if(isset($filters['name']) && $filters['name'] != '') {
            $wheres[] = ['name', 'LIKE', '%'. $filters['name']. '%'];
        }

        $items = User::where($wheres)
                    ->select($fileds)
                    ->orderBy('id')
                    ->get()
                    ->toArray();

        return $items;
    }
}
