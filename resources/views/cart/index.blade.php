@extends('layouts.main')

@section('content')
<div class="w-full flex-grow flex flex-col relative items-center">
    <div class="flex flex-wrap justify-around gap-4 p-4">
        @forelse($courses as $course)
        @include('components.course',['course' => $course])
        @empty
        <span>no items has selected</span>
        @endforelse
    </div>
    <div class="absolute w-full bottom-0 p-4 bg-zinc-900 border-t-2 border-sky-600 flex flex-row justify-between items-center text-xl">
        <span>You are puchasing {{$courses->count()}} courses with total value of {{$courses->sum('cost')}} .Your Currency is {{Auth::user()->currency}} .Do You Confirm?</span>
        <a class="bg-sky-600 text-zinc-900 rounded-xl p-1" href="{{route('cart.purchase')}}">Confirm</a>
    </div>
</div>
@endsection