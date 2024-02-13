@extends('layouts.main')

@section('content')
<div class="w-full bg-zinc-700 py-3 md:px-32 px-0 flex flex-row gap-4 items-center justify-around">
    @foreach($categories as $category)
    <a href="{{route('dashboard',['search'=>$search,'sort' => $sort == 'selling' ? 'newest' : 'selling','category' => $category->id])}}">{{$category->title}}</a>
    @endforeach
    <a class="bg-zinc-800 p-1 rounded-xl" href="{{route('dashboard',['search'=>$search,'sort' => $sort == 'selling' ? 'newest' : 'selling','category' => $query_category ? $query_category->id : ''])}}"> sort by {{$sort ? $sort : 'newest'}}</a>
</div>
<div class="w-full flex-grow flex flex-wrap p-10 justify-evenly gap-4">
    @forelse($courses as $course)
    @include('components.course',['course'=>$course])
    @empty
    <span>no courses yet</span>
    @endforelse
</div>
@endsection