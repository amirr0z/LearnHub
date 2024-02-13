<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\File;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('role:!admin')->only(['']);
    }

    function index(Request $req)
    {
        $courses = Course::query();
        $category = null;
        if ($req->has('search'))
            $courses->where('title', 'like', '%' . $req->search . '%');
        if ($req->has('category') and $req->category) {
            $category = Category::findOrFail($req->category);
            $cc = CourseCategory::where('category_id', $category->id)->get()->pluck('course_id');
            $courses->whereIn('id', $cc);
        }
        if ($req->has('sort') and $req->sort == 'selling') {
            $uc = UserCourse::groupBy('course_id')->select('course_id', DB::raw('count(*) as total'))->get()->pluck('total', 'course_id');
            $courses = $courses->get()->sortByDesc(function ($course) use ($uc) {
                return isset($uc[$course->id]) ? $uc[$course->id] : 0;
            });
        } else {

            $courses = $courses->get()->sortByDesc('id');
        }
        // dd($category);

        return view('dashboard', ['courses' => $courses, 'categories' => Category::get(), 'search' => $req->search ?? '', 'sort' => $req->sort ?? '', 'query_category' => $category ?? '']);
    }

    function mycourses()
    {
        $courses = Course::where('user_id', Auth::id())->get();
        return view('course.index', ['courses' => $courses]);
    }

    function show($id)
    {
        $course = Course::findOrFail($id);
        return view('course.show', ['course' => $course]);
    }

    function create()
    {
        return view('course.create');
    }

    function store(Request $req)
    {
        $req->validate(['title' => 'required|max:255', 'description' => 'required|max:1999']);
        $course = Course::create([
            'title' => $req->title,
            'description' => $req->description,
            'user_id' => Auth::id(),
        ]);
        if ($req->hasFile('files')) {
            $files = array();
            foreach ($req->file('files') as $file) {
                $name = time() . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('courses'))
                    mkdir('courses', 0755, true);
                $file->move('courses/', $name);
                File::create(['course_id' => $course->id, 'file_name' => $name]);
            }
        }
        return view('course.create');
    }

    function purchased()
    {
        $usercourses = UserCourse::where('user_id', Auth::id())->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $usercourses)->get();
        return view('course.index', ['courses' => $courses]);
    }
}
