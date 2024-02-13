<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    function store(Request $req)
    {
        $req->validate(['title' => 'required']);
        Category::create(['title' => $req->title]);
        return redirect()->back();
    }

    function toggle($course_id, $category_id)
    {
        $cc = CourseCategory::where('course_id', $course_id)->where('category_id', $category_id)->first();
        if ($cc) {
            $cc->delete();
        } else {
            CourseCategory::create(['course_id' => $course_id, 'category_id' => $category_id]);
        }
        return redirect()->back();
    }
}
