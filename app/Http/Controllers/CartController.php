<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:!admin');
    }

    function index()
    {
        $coursesId = Cart::where('user_id', Auth::id())->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $coursesId)->get();
        return view('cart.index', ['courses' => $courses]);
    }

    function add($id)
    {
        $course = Course::findOrFail($id);
        if (
            !UserCourse::where('course_id', $course->id)->where('user_id', Auth::id())->exists()
            and Auth::user()->role != 'admin'
            and $course->user->id != Auth::id()
            and !Cart::where('user_id', Auth::id())->where('course_id', $course->id)->exists()
        )
            Cart::create([
                'user_id' => Auth::id(),
                'course_id' => $course->id
            ]);
        return redirect()->back();
    }

    function remove($id)
    {
        $course = Course::findOrFail($id);
        $cart = Cart::where('user_id', Auth::id())->where('course_id', $course->id)->firstOrFail();
        $cart->delete();
        return redirect()->back();
    }

    function purchase(Request $req)
    {
        $user = User::findOrFail(Auth::id());
        $coursesId = Cart::where('user_id', $user->id)->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $coursesId)->get();
        if ($courses->sum('cost') > $user->currency) {
            return redirect()->back();
        }
        foreach ($courses as $course) {
            UserCourse::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
            ]);
        }
        $user->update(['currency' => $user->currency - $courses->sum('cost')]);
        $carts = Cart::where('user_id', $user->id)->get();
        foreach ($carts as $cart)
            $cart->delete();
        return redirect()->route('course.purchased');
    }
}
