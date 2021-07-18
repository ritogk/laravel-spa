<?php

namespace Tests\Feature\Front;

use Tests\TestCase;
use App\Models\Entry;

class SaveEntryActionTest extends TestCase
{
    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {
        $post_data = Entry::factory()->make();
        // アクセス
        $response = $this->post('/api/front/entry', $post_data->toArray());
        // チェック
        $response->assertStatus(200);
        // 登録データ存在チェック
        $this->assertTrue(Entry::where('job_id', $post_data->job_id)
                                ->where('full_name', $post_data->full_name)
                                ->where('email', $post_data->email)
                                ->where('self_pr', $post_data->self_pr)
                                ->where('tel', $post_data->tel)
                                ->exists());
    }

    /**
     * 400 test
     *
     * @return void
     */
    public function test_400()
    {
        // アクセス
        $response = $this->post('/api/front/entry');
        // ステータスチェック
        $response->assertStatus(400);
    }
}
