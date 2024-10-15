<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {

        /*  $categories = Category::whereNull('parent_id')->with('children')->get(); */
        $result = Category::getCategories();


        /*  $tree = json_decode($result); */


        $n = $result;

        var_dump($n);








        /* return view('categories')->with('categories', $categories); */
    }
    public function create()
    {
        $categories = Category::all();
        return view('add')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories,title|max:255',
            'parent_id' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect('/create')
                ->with('status', 'failed')
                ->withErrors($validator->errors());
        }
        Category::create(
            [
                'title' => $request['title'],
                'parent_id' => $request['parent_id'],
            ]
        );
        return redirect('/')->with('status', 'success');
    }

    public function destroy($id)
    {
        if (!$category = Category::find($id)) {
            return response()->json([], 404);
        }
        if (!$deleted = $category->delete()) {
            return response()->json([], 403);
        }
        return response()->json([], 201);
    }



}
