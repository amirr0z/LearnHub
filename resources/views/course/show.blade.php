@extends('layouts.main')

@section('content')
<div class="flex-grow w-full flex flex-col items-center p-10 gap-4">
    <div class="flex flex-col w-9/12 bg-zinc-900 custom-shadow p-5 rounded-xl overflow-hidden">
        <div class="flex items-center justify-center w-full rounded-xl overflow-hidden relative h-56">
            <img src="{{asset('images/2022_08_MicrosoftTeams-image-13-2-1.jpg')}}" alt="" class="absolute w-full h-auto opacity-30 z-10">
            <span class="flex items-center justify-center w-full h-56 z-20 text-3xl">
                {{$course->title}} - {{$course->user->name}}
            </span>
        </div>

        <div class="p-4 text-xl">{{$course->description}}</div>

        <div class="flex flex-wrap gap-4 p-4 border-t-2 border-sky-600">
            @if(!Auth::check())
            <a href="{{route('user.login')}}">login first!</a>
            @elseif(Auth::user()->role == 'admin' or $course->user->id == Auth::id() or App\Models\UserCourse::where('user_id',Auth::id())->where('course_id',$course->id)->exists())
            @forelse($course->files as $file)
            <a href="{{asset('courses/'.$file->file_name)}}">{{$file->file_name}}</a>
            @empty
            <span>no attachments</span>
            @endforelse
            @elseif(App\Models\Cart::where('user_id',Auth::id())->where('course_id',$course->id)->exists())
            <a class="bg-red-400 text-zinc-900 rounded-xl p-2" href="{{route('cart.remove',$course->id)}}">remove</a>
            @else
            <a class="bg-sky-600 text-zinc-900 rounded-xl p-2" href="{{route('cart.add',$course->id)}}">Buy Now</a>
            @endif
        </div>
    </div>

    @if(Auth::check() and Auth::user()->role == 'admin')
    <div class="flex flex-wrap w-9/12 gap-4 overflow-hidden">
        @foreach(App\Models\Category::get() as $category)
        <a href="{{route('category.toggle',['category_id'=>$category->id,'course_id'=>$course->id])}}" class="bg-zinc-900 rounded-xl p-2 items-center flex border-sky-600 {{App\Models\CourseCategory::where('category_id',$category->id)->where('course_id',$course->id)->exists()?'border-2':''}}">{{$category->title}}</a>
        @endforeach
        <form action="{{route('category.store')}}" class="bg-zinc-900 rounded-xl p-2" method="post">
            @csrf
            <input class="border-2 border-sky-500 bg-transparent rounded-xl p-1 w-32" type="text" id="categoryName" name="title" placeholder="Category Name">
            <button type="submit" class="text-xl font-bold">+</button>
        </form>
    </div>
    @else
    <div class="flex flex-wrap w-9/12 gap-4 overflow-hidden">
        @foreach(App\Models\Category::get() as $category)
        <div class="bg-zinc-900 rounded-xl p-2 items-center flex border-sky-600 {{App\Models\CourseCategory::where('category_id',$category->id)->where('course_id',$course->id)->exists()?'border-2':''}}">{{$category->title}}</div>
        @endforeach
    </div>
    @endif

    @if(Auth::check() and Auth::id() == $course->user->id)
    <div class="flex flex-col gap-4 justify-around border-t-2 pt-4 border-sky-600 w-9/12">
        @forelse(App\Models\UserCourse::where('course_id',$course->id)->get() as $userCourse)
        <div class="bg-zinc-900 p-4 flex md:flex-row flex-col rounded-xl items-center w-full justify-between">
            <span>
                <svg width="4rem" height="4rem" viewBox=" 0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="9" r="3" stroke="#0EA5E9" stroke-width="1.5" />
                    <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </span>
            <span class="md:w-1/5 text-center truncate">{{$userCourse->user->name}}</span>
            <span class="md:w-1/5 text-center truncate">{{$userCourse->user->email}}</span>
            <span class="md:w-1/5 text-center truncate">{{$userCourse->user->currency}}</span>
        </div>
        @empty
        <span>no user yet</span>
        @endforelse
    </div>
    @endif
</div>
@endsection