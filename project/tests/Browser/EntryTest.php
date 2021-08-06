<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use Illuminate\Support\Facades\Auth;

use App\Models\JobCategory;
use App\Models\Job;
use App\Models\Entry;

class EntryTest extends DuskTestCase
{

    CONST pause_time_1 = 1000;
    CONST pause_time_2 = 3000;
    CONST pause_time_3 = 5000;

    /**
     * 応募した仕事が選考画面に表示される
     *
     * @return void
     */
    public function test_応募した仕事が選考画面に表示される()
    {
        $this->browse(function (Browser $browser){
            $browser->maximize();

            $category = JobCategory::where('name', 'IT')->first();

            // 会員登録
            $browser->visit('/')
                    ->pause(self::pause_time_1)
                    ->assertSee('会員登録')
                    ->clickLink('会員登録')
                    ->screenshot('register')
                    ->pause(self::pause_time_2);
            $name = 'テスト 太郎';
            $self_pr = '自己PR文章';
            $tel = '011-1111-1111';
            $email = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 8). '@test2.co.jp';
            $password = 'test2test2';
            $browser->assertSee('会員登録')
                    ->type('#name', $name)
                    ->type('#self_pr', $self_pr)
                    ->type('#tel', $tel)
                    ->type('#email', $email)
                    ->type('#password', $password)
                    ->type('#password_confirmation', $password)
                    ->press('会員登録')
                    ->screenshot('register')
                    ->pause(self::pause_time_2);

            // 職種一覧 ITが表示されている。
            $browser->pause(self::pause_time_1)
                    ->screenshot('select_categories')
                    ->assertSee($category->name)
                    ->assertSee($category->content)
                    ->pause(self::pause_time_2);
            // 職種一覧 職種(IT)選択
            $browser->click(sprintf("#category-%s", $category->id))
                    ->pause(self::pause_time_1)
                    ->screenshot('select_jobs');

            $job = Job::where('job_category_id', $category->id)
                        ->orderByDesc('attention')
                        ->orderBy('sort_no')
                        ->first();

            // 仕事一覧 仕事を選択
            $browser->click(sprintf("#job-%s", $job->id))
                        ->pause(self::pause_time_1)
                        ->screenshot('job_detail');

            // 仕事詳細 入力
            $browser->screenshot('job_detail_input')
                    ->pause(self::pause_time_1)
                    ->scrollIntoView('#btn_entry')
                    ->press('申し込む')
                    ->pause(self::pause_time_1)
                    ->screenshot('job_detail_input_complete');

            // ログイン 入力
            $browser->clickLink('管理画面')
                    ->type('#email', 'test@test.co.jp')
                    ->type('#password', 'test')
                    ->screenshot('login')
                    ->press('ログイン')
                    ->screenshot('admin')
                    ->pause(self::pause_time_1);

            // 管理画面(選考一覧) 申込した仕事が表示される。
            $browser->clickLink('選考一覧')
                    ->pause(self::pause_time_1)
                    ->screenshot('admin_job_entry_list')
                    ->assertSee($job->title)
                    ->assertSee($name)
                    ->assertSee($email)
                    ->assertSee($tel)
                    ->assertSee(str_replace("\n", " ", $self_pr));
        });
    }
}
