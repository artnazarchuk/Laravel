<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $newsCategory = $this->getNewsCategory();
        return view('news.category', [
            'category' => $newsCategory
        ]);
    }
}
