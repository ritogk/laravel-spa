<?php

namespace Tests\Feature\Front;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowActionTest extends TestCase
{
    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {
        // アクセス
        $response = $this->get('/');
        // チェック
        $response->assertStatus(200);
    }
}
