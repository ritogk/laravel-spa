<?php

namespace App\UseCases\Master\NewsLetter;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Models\User;

use App\Jobs\SendNewsLetterEmail;

class SendAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return array
     */
    public function __invoke(string $id): array
    {
        $users = User::all();
        $news_letter = NewsLetter::where('id', $id)->first();
        foreach ($users as $key => $user) {
            SendNewsLetterEmail::dispatch($user, $news_letter->subject, $news_letter->message);
        }

        NewsLetter::where('id', $id)->update(['send' => true]);
        return [];
    }
}
