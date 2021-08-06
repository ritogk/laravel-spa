<?php

namespace Tests\Feature\Api\Master\JobCategory;

use Tests\TestCase;
use App\Models\JobCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;

class CreateTest extends TestCase
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

        $job_category = JobCategory::factory()->make();
        $file = UploadedFile::fake()->image('dummy.png');
        $response = $this->post('/api/job_categories', ['file' => $file, 'item' => json_encode($job_category->toArray())]);

        $create = JobCategory::where('name', $job_category->name)
                                ->where('content', $job_category->content)
                                ->where('sort_no', $job_category->sort_no)
                                ->first();
        $this->assertNotEmpty($create);

    }
}
