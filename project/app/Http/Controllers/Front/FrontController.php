<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\View\View as View;
use Illuminate\Http\Request;
// Request
use App\Http\Requests\Front\JobSeachRequest;

// UseCases
use App\UseCases\Front\ShowAction as ShowAction;
use App\UseCases\Front\SearchJobsAction as SearchJobsAction;

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
     * @param JobSeachRequest $request
     * @param SearchJobsAction $action
     * @return array
     */
    public function searchJobs(JobSeachRequest $request, SearchJobsAction $action): array{
        \Log::debug($request);
        return $action($request);
    }
}
