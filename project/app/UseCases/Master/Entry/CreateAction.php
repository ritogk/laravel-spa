<?php

namespace App\UseCases\Master\Entry;

use App\Models\Entry;

class CreateAction{
    /**
     * __invoke
     *
     * @param array $entry
     * @return void
     */
    public function __invoke(array $entry): void
    {
        Entry::create($entry);
    }
}
