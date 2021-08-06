<?php

namespace Tests\Feature\Web;

use Tests\TestCase;

class AdminLoginShowTest extends TestCase
{
    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {
        // アクセス
        $response = $this->get('/login/admin');
        // チェック
        $response->assertStatus(200);
    }
}
