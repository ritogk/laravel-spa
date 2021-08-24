<?php

namespace App\UseCases\Master\NewsLetter;

use App\Models\NewsLetter;
use Illuminate\Support\Facades\Storage;

class FindAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return array
     */
    public function __invoke(string $id): array
    {
        $item = NewsLetter::where('id', $id)
                            ->first()
                            ->toArray();
        return $item;
    }
}
