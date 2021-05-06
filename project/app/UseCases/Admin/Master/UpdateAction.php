<?php

namespace App\UseCases\Admin\Master;

use App\Models\General;

class UpdateAction{
    /**
     * __invoke
     *
     * @param array $general
     * @param string $id
     * @return void
     */
    public function __invoke(array $general, string $id): void
    {
        $update = [
            'kbn' => $general['kbn'],
            'value' => $general['value'],
            'sort_no' => $general['sort_no']
        ];
        General::where('id', $id)->update($update);
    }
}
