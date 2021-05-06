<?php

namespace App\UseCases\Admin\Master;

use App\Models\General;

class DeleteAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return void
     */
    public function __invoke(string $id): void
    {
        General::where('id', $id)->delete();
    }
}
