<?php

namespace App\UseCases\Admin\Master\Job;

use App\Models\Job;

class FindAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return array
     */
    public function __invoke(string $id): array
    {
        return Job::where('id', $id)
                    ->first()
                    ->toArray();
    }
}
