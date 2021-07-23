<?php

namespace Tests\Feature\Web;

use Tests\TestCase;

class FrontShowTest extends TestCase
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
