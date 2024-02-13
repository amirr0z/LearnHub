@extends('layouts.main')

@section('content')
<div class="w-full flex-grow flex flex-col p-16">

    <div class="flex flex-wrap justify-between p-3 gap-4 ">
        <a class="bg-zinc-900 overflow-hidden rounded-lg p-2 border-sky-600 custom-shadow" href="{{route('course.create')}}">Create a Course</a>
        <a class="bg-zinc-900 overflow-hidden rounded-lg p-2 {{\Request::route()->getName() == 'course.mycourses' ? 'border-2' : ''}} border-sky-600 custom-shadow" href="{{route('course.mycourses')}}">My Courses</a>
        <a class="bg-zinc-900 overflow-hidden rounded-lg p-2 {{\Request::route()->getName() == 'course.purchased' ? 'border-2' : ''}} border-sky-600 custom-shadow" href="{{route('course.purchased')}}">Purchased Courses</a>
    </div>

    <div class="w-full flex-grow flex flex-wrap p-10 justify-evenly border-t-2 border-sky-600">
        @forelse($courses as $course)
        @include('components.course',['course'=>$course])
        @empty
        <span>nothing to show</span>
        @endforelse
    </div>

</div>

@endsection