<?php

namespace App\UseCases\Master\User;

use App\Models\User;

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
        $items = User::where(json_decode($filter))
                    ->select(json_decode($fileds))
                    ->orderBy('id')
                    ->get()
                    ->toArray();

        return $items;
    }
}
