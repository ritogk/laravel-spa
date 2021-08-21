<?php

namespace App\UseCases\Master\Entry;

use App\Models\Entry;
use Illuminate\Http\Request;

class CreateAction{
    /**
     * __invoke
     *
     * @param array $entry
     * @return void
     */
    public function __invoke(Request $request): void
    {
        $create = [
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
        ];
        Entry::create($create);
    }
}
