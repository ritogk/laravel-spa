<?php

namespace Tests\Feature\Front;

use Tests\TestCase;

class LoginShowTest extends TestCase
{
    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {
        // アクセス
        $response = $this->get('/login');
        // チェック
        $response->assertStatus(200);
    }
}
