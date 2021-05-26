<?php

namespace Tests\Feature\Front;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\UseCases\Front\SearchJobsAction;
use Illuminate\Http\Request;

class SearchJobsActionTest extends TestCase
{
    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {

        $post_data = ['category' => '', 'content' => '', 'price' => '', 'attention' => ''];
        // アクセス
        $response = $this->post('/front/jobs', $post_data);
        // データ取得
        $action =  new SearchJobsAction();
        // チェック
        $response->assertStatus(200)
                ->assertJsonFragment($action($post_data));
    }
}
