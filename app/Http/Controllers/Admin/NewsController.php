<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new News();
        $news = $model->getNews();

        // dd(\DB::table('news')
        // ->select(['id', 'title', 'slug', 'author', 'status', 'description'])
        // ->get());

        // dd(
        //     \DB::table('categories')->count(),
        //     \DB::table('categories')->max('id'),
        //     \DB::table('categories')->min('id'),
        //     \DB::table('categories')->avg('id'),
        //     \DB::table('categories')
        //         ->join('news', 'news.category_id', '=', 'categories.id')
        //         ->select('categories.*', 'news.title as newsTitle')
        //         ->get()
        // );

        // $news = \DB::table('news')
        //         ->where('title', 'like', '%'.request()->query('s').'%')
        //         ->where('id', '<', 10)
        //         ->where([
        //             ['title', 'like', '%'.request()->query('s').'%'],
        //             ['id', '<', 10],
        //             ['display', '=', true]
        //         ])
        //         ->orWhere('display', '=', false)
        //         ->whereIn('id', [1,6,9])
        //         ->whereNotIn('id', [1,6,9])
        //         ->whereBetween('id', [1,4])
        //         ->whereNotBetween('id', [1,3])
        //         ->orderBy('id', 'desc')
        //         ->offset(5)
        //         ->limit(3)
        //         ->get()
        //         ->toArray();
        
        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5']
        ]);
        
        $data = json_encode($request->except('_token'));
        
        file_put_contents(public_path('newsdata/data.json'), $data);

        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
