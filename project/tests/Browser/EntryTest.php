<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\Models\JobCategory;
use App\Models\Job;
use App\Models\Entry;

class EntryTest extends DuskTestCase
{

    CONST pause_time_1 = 500;
    CONST pause_time_2 = 10000;
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

            // 職種一覧 ITが表示されている。
            $browser->visit('/')
                    ->pause(self::pause_time_1)
                    ->screenshot('select_categories')
                    ->assertSee($category->name)
                    ->assertSee($category->content);
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
            $browser->type('#full_name', '山田 太郎')
                    ->type('#self_pr', "私は新規開発案件を何度も経験しているため、作るべき物の製作時間を予測する事が得意です。\n例として、建設会社向け基幹システムの新規開発案件では、開発側のスケジュール作成は私の方で行っておりました。\nその経験もあり見積作成も任されておりました。")
                    ->type('#email', 'test@test.co.jp')
                    ->type('#tel', '090-9999-8888')
                    ->screenshot('job_detail_input')
                    ->press('申し込む')
                    ->pause(self::pause_time_1)
                    ->screenshot('job_detail_input_complete');

            // ログイン 入力
            $browser->clickLink('管理画面')
                    ->type('#email', 'test@test.co.jp')
                    ->type('#password', 'test')
                    ->screenshot('login')
                    ->press('ログイン')
                    ->screenshot('admin');

            // 管理画面(選考一覧) 申込した仕事が表示される。
            $entry = Entry::where('job_id', $job->id)->first();
            $browser->clickLink('選考一覧')
                    ->pause(self::pause_time_1)
                    ->screenshot('admin_job_entry_list')
                    ->assertSee($job->title)
                    ->assertSee($entry->full_name)
                    ->assertSee($entry->email)
                    ->assertSee($entry->tel)
                    ->assertSee(str_replace("\n", " ", $entry->self_pr));
        });
    }
}
