<?php

namespace App\UseCases\Master\Entry;

use App\Models\Entry;
use Illuminate\Http\Request;

class CreateAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $create = [
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
        ];
        return Entry::create($create)->toArray();
    }
}
