<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index() {

        $model = new Content();

        $newsContent = $model->getContent();

        $collection = collect($newsContent);
        
        dd($collection);
    }
}

//