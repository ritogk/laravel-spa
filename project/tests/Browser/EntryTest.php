<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EntryTest extends DuskTestCase
{

    CONST pause_time_1 = 500;
    CONST pause_time_2 = 10000;
    CONST pause_time_3 = 5000;

    /**
     * 求人応募した物が選考画面に表示される
     *
     * @return void
     */
    public function 求人応募した物が選考画面に表示される()
    {
        $this->browse(function (Browser $browser){
            $browser->maximize();
            // 【職種選択画面】
            $browser->visit('/')
                    ->screenshot('select_categories');

        });
    }
}
