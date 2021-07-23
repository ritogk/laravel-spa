<?php

namespace App\UseCases\Master\Job;

use App\Models\Job;

class DeleteAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return void
     */
    public function __invoke(string $id): void
    {
        Job::where('id', $id)->delete();
    }
}
