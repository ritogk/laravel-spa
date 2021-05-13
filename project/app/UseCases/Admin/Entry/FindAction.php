<?php

namespace App\UseCases\Admin\Entry;

use App\Models\Entry;

class FindAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return array
     */
    public function __invoke(string $id): array
    {
        return Entry::where('id', $id)
                    ->first()
                    ->toArray();
    }
}
