<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
         $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('categories')->with('categories', $categories);
    }
    public function create()
    {
        $categories = Category::all();
        return view('add')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories|max:255',
            'parent_id' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect('/create')->with('status', 'failed');
        }
        Category::create(
            [
                'title' => $request['title'],
                'parent_id' => $request['parent_id'],
            ]
        );
        return redirect('/')->with('status', 'success');
    }



}
