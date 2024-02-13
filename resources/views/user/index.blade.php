@extends('layouts.main')

@section('content')
<div class="w-full flex-grow flex flex-col md:p-16 p-4 gap-4">
    <div class="bg-zinc-900 custom-shadow rounded-xl p-4 flex md:flex-row flex-col items-center w-full justify-around gap-4 truncate">
        <span>
            <svg width="5rem" height="5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="9" r="3" stroke="#0EA5E9" stroke-width="1.5" />
                <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
                <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
            </svg>
        </span>
        <span class="text-2xl">{{Auth::user()->name}}</span>
        <span class="text-2xl">{{Auth::user()->email}}</span>
        <span class="text-2xl">{{Auth::user()->currency}}</span>
        <div class="flex md:flex-col gap-2 flex-row">
            <a href="{{route('user.edit')}}">Edit</a>
            <a href="{{route('user.logout')}}">Logout</a>
        </div>
    </div>

    @if(Auth::user()->role == 'admin')
    <div class="flex flex-col gap-4 justify-around border-t-2 pt-4 border-sky-600">
        @forelse(App\Models\User::whereNot('id',Auth::id())->get() as $user)
        <a class="bg-zinc-900 p-4 flex md:flex-row flex-col rounded-xl items-center w-full justify-between" href="{{route('user.show',$user->id)}}">
            <span>
                <svg width="4rem" height="4rem" viewBox=" 0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="9" r="3" stroke="#0EA5E9" stroke-width="1.5" />
                    <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </span>
            <span class="md:w-1/5 text-center truncate">{{$user->name}}</span>
            <span class="md:w-1/5 text-center truncate">{{$user->email}}</span>
            <span class="md:w-1/5 text-center truncate">{{$user->currency}}</span>
            <span class="md:w-1/5 text-center truncate">view</span>
        </a>
        @empty
        <span>no user yet</span>
        @endforelse
    </div>
    @endif
</div>
@endsection