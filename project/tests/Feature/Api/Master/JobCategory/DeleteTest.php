<?php

namespace Tests\Feature\Api\Master\JobCategory;

use Tests\TestCase;
use App\Models\JobCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteTest extends TestCase
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
        $this->post('/api/auth/login', ['email'=>'test@test.co.jp', 'password'=>'test', 'remember'=>true]);

        $category = JobCategory::factory()->create();
        $response = $this->delete('/api/job_categories/'. $category['id']);

        $this->assertTrue(JobCategory::where('id', $category['id'])->doesntExist ());

    }
}
