<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\View\View as View;
use Illuminate\Http\Request;
// Request
use App\Http\Requests\Front\JobSeachRequest;
use App\Http\Requests\Front\EntryRequest;

// UseCases
use App\UseCases\Front\ShowAction as ShowAction;
use App\UseCases\Front\SearchJobsAction as SearchJobsAction;
use App\UseCases\Front\CategoriesAction as CategoriesAction;
use App\UseCases\Front\SaveEntryAction as SaveEntryAction;

class FrontController extends Controller
{
    /**
     * 画面表示
     *
     * @param ShowAction $action
     * @return View
     */
    public function index(ShowAction $action): View
    {
        return $action();
    }

    /**
     * 仕事一覧取得
     *
     * @param SearchJobsAction $action
     * @return array
     */
    public function index_jobs(SearchJobsAction $action): array{
        return $action();
    }

    /**
     * カテゴリ一覧取得
     *
     * @return array
     */
    public function index_categories(CategoriesAction $action): array{
        return $action();
    }

    /**
     * エントリー登録
     *
     * @param EntryRequest $request
     * @param SaveEntryAction $action
     * @return void
     */
    public function store_entry(EntryRequest $request, SaveEntryAction $action): void{
        $action($request->all());
    }
}
