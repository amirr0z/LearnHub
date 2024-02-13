@extends('layouts.main')

@section('content')

<div class="w-full flex items-center justify-center bg-auth flex-grow">
    <form class="rounded-xl flex flex-col p-16 bg-zinc-900 items-center gap-5 md:w-1/3 w-9/12 custom-shadow" action="{{route('user.auth')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h4 class="text-3xl">Login</h4>


        <div class="flex flex-col gap-3 items-start text-lg w-full justify-between">
            <label for="email">email</label>
            <input type="text" name="email" id="email" class="border-2 border-sky-500 bg-transparent rounded-xl p-1 w-full">
        </div>

        <div class="flex flex-col gap-3 items-start text-lg w-full justify-between">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="border-2 border-sky-500 bg-transparent rounded-xl p-1 w-full">
        </div>
        <button type="submit" class=" p-3 rounded-xl bg-sky-600 text-zinc-900">Submit</button>
    </form>
</div>
@endsection