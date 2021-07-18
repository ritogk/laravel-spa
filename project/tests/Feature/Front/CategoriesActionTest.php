<?php

namespace Tests\Feature\Front;

use Tests\TestCase;
use App\UseCases\Front\CategoriesAction;

class CategoriesActionTest extends TestCase
{
    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {
        // アクセス
        $response = $this->get('/api/front/categories');
        // データ取得
        $action =  new CategoriesAction();
        // チェック
        $response->assertStatus(200)
                ->assertJson($action());

    }
}
