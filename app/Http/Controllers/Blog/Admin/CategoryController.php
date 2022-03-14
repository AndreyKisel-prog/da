<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(5);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = BlogCategory::find($id);

        if (empty($item)) {
            return back()->withErrors(['msg' => "Message id=[{$id}] was not found"])->withInput();
        };

        $data = $request->all();
        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()->route('blog.admin.categories.edit', $item->id)->with(['success' => 'Saved successfully']);
        } else {
            return back()->withErrors(['msg' => 'Error saving'])->withInput();
        }

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->description = $request->description;

        $category->save();
        return redirect()->back()->withSuccess();
    }

}
