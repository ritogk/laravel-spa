<?php

namespace App\UseCases\Master\NewsLetter;

use App\Models\NewsLetter;

class DeleteAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return void
     */
    public function __invoke(string $id): void
    {
        NewsLetter::where('id', $id)->delete();
    }
}
