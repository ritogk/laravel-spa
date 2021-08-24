<?php

namespace App\UseCases\Master\NewsLetter;

use App\Models\NewsLetter;
use Illuminate\Http\Request;

class UpdateAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @param string $id
     * @return array
     */
    public function __invoke(Request $request, string $id): array
    {
        $update = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        NewsLetter::where('id', $id)->update($update);
        return NewsLetter::where('id', $id)->first()->toArray();
    }
}
