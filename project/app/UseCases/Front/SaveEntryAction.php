<?php

namespace App\UseCases\Front;

use App\Models\Entry;
use Illuminate\Http\Request;

class SaveEntryAction{
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
