<?php
namespace App\UseCases\Master\NewsLetter;

use App\Models\NewsLetter;
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
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        return NewsLetter::create($create)->toArray();
    }
}
