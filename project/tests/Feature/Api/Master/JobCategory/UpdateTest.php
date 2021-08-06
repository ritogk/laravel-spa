<?php

namespace Tests\Feature\Api\Master\JobCategory;

use Tests\TestCase;
use App\Models\JobCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;

class UpdateTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * 200 test
     *
     * @return void
     */
    public function test_200()
    {
        // ログイン
        $this->post('/api/auth/admin/login', ['email'=>'test@test.co.jp', 'password'=>'test', 'remember'=>true]);

        $before_category = JobCategory::factory()->create()->toArray();

        // 変更値
        $input = $before_category;
        $input['name'] = '変更_name';
        $input['content'] = '変更_content';
        $input['sort_no'] = 100;
        $file = UploadedFile::fake()->image('dummy.png');

        $response = $this->put('/api/job_categories/'. $before_category['id'],
                                ['file' => $file, 'item' => json_encode($input)]);

        $after_category = JobCategory::where('id', $before_category['id'])
                                        ->first();
        // id以外が変更されている
        $this->assertEquals($after_category->id, $before_category['id']);
        $this->assertNotEquals($after_category->name, $before_category['name']);
        $this->assertNotEquals($after_category->content, $before_category['content']);
        $this->assertNotEquals($after_category->image, $before_category['image']);
        $this->assertNotEquals($after_category->sort_no, $before_category['sort_no']);
    }
}
