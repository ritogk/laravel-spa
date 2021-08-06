<?php

namespace Tests\Feature\Web;

use Tests\TestCase;

class AdminShowTest extends TestCase
{
    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {
        // ログイン
        $this->post('/api/auth/admin/login', ['email'=>'test@test.co.jp', 'password'=>'test', 'remember'=>true]);
        // アクセス
        $response = $this->get('/admin');
        // チェック
        $response->assertStatus(200);
    }
}
