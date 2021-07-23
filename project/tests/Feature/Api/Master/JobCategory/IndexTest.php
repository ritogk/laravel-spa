<?php

namespace Tests\Feature\Api\Master\JobCategory;

use Tests\TestCase;
use App\Models\JobCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;

class IndexTest extends TestCase
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
        $query = [
            "filters_json" => json_encode(''),
            "fields" => ['*'],
        ];

        $before_jobcategories = JobCategory::all();

        // 登録データ1
        $job_category1 = JobCategory::factory()->create();
        $job_category1->image = Storage::url($job_category1->image);
        // 登録データ2
        $job_category2 = JobCategory::factory()->create();
        $job_category2->image = Storage::url($job_category2->image);

        $response = $this->call('GET', '/api/job_categories', $query, $this->prepareCookiesForRequest());

        $response->assertOk()
                ->assertJsonCount($before_jobcategories->count() + 2)
                ->assertJsonFragment($job_category1->toArray())
                ->assertJsonFragment($job_category2->toArray());

    }
}
