<?php

namespace Tests\Feature\Api\File;

use Tests\TestCase;
use App\Models\JobCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;

class UploadTest extends TestCase
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

        // ダミー画像作成
        $file = UploadedFile::fake()->image('dummy.png');

        // 登録
        $response = $this->post('/api/files', ['file' => $file,]);

        Storage::assertExists(json_decode($response->content())->storage_path);
    }
}
