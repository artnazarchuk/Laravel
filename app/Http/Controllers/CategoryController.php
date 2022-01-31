<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $model = new Category();
        // $newsCategory = $model->getNewsCategory();
        // return view('news.category', [
            // 'category' => $newsCategory
        // ]);

        $categories = Category::with('news')->get();
        return view('news.categories', [
        'categories' => $categories
        ]);
    }
}
