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
        // アクセス
        $response = $this->get('/api/front/jobs');
        // データ取得
        $action =  new SearchJobsAction();
        // チェック
        $response->assertStatus(200)
                ->assertJsonFragment($action());
    }
}
