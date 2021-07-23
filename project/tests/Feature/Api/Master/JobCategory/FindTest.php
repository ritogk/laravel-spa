<?php

namespace Tests\Feature\Api\Master\JobCategory;

use Tests\TestCase;
use App\Models\JobCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;

class FindTest extends TestCase
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
        // 登録データ
        $job_category = JobCategory::factory()->create();
        $job_category->image = Storage::url($job_category->image);

        $response = $this->get('/api/job_categories/'. $job_category->id);

        $response->assertOk()
                ->assertJson($job_category->toArray());

    }
}
