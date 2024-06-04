<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    const ROUTE = 'master.category.';

    public function __construct()
    {
        view()->share('this_helper', self::ROUTE);
    }

    public function indexDataran()
    {
        return view('admin.kategoridataran');
    }
}
