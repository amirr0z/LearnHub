<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen w-full bg-zinc-800 text-sky-500 flex flex-col relative">

    <div class="flex flex-row justify-between items-center sticky top-0 p-3 md:px-32 px-0 bg-zinc-900 border-b-2 border-sky-500 z-50">
        <div class="flex flex-row gap-4">
            <a class="relative" href="{{route('cart.index')}}">
                <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="2rem" height="2rem" viewBox="0 0 32 32" xml:space="preserve" fill="#0EA5E9">
                    <path d="M25,29.5c0,0.828-0.672,1.5-1.5,1.5S22,30.328,22,29.5s0.672-1.5,1.5-1.5S25,28.672,25,29.5z
                    M10.5,28C9.672,28,9,28.672,9,29.5S9.672,31,10.5,31s1.5-0.672,1.5-1.5S11.328,28,10.5,28z M30.007,9.003
                    c0.65,0,1.127,0.611,0.97,1.242l-2.991,11.997C27.874,22.687,27.474,23,27.015,23H9.28l0.5,2H25c0.553,0,1,0.448,1,1s-0.447,1-1,1
                    H8.985c-0.459,0-0.859-0.313-0.97-0.758L3.22,7H1C0.447,7,0,6.552,0,6s0.447-1,1-1h2.998c0.459,0,0.859,0.312,0.97,0.757L5.78,9
                    L30.007,9.003z M28.72,11H6.28l2.5,10h17.438L28.72,11z M11,13h-1v1h1V13z M13,13h-1v1h1V13z M15,13h-1v1h1V13z M17,13h-1v1h1V13z
                    M19,13h-1v1h1V13z M21,13h-1v1h1V13z M23,13h-1v1h1V13z M25,13h-1v1h1V13z M25,15h-1v1h1V15z M25,17h-1v1h1V17z M23,15h-1v1h1V15z
                    M21,15h-1v1h1V15z M19,15h-1v1h1V15z M17,15h-1v1h1V15z M15,15h-1v1h1V15z M13,15h-1v1h1V15z M11,15h-1v1h1V15z M11,18v-1h-1v1H11z
                    M13,17h-1v1h1V17z M15,17h-1v1h1V17z M17,17h-1v1h1V17z M19,17h-1v1h1V17z M21,17h-1v1h1V17z M23,17h-1v1h1V17z" />
                </svg>
                <span class="absolute -bottom-1 -right-1 text-zinc-900 bg-sky-600 text-xs rounded-xl p-0.5 border">{{App\Models\Cart::where('user_id',Auth::id())->count()}}</span>
            </a>

            <button onclick="showSearchbar()">
                <svg width="2rem" height="2rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

        </div>
        <a href="{{route('dashboard')}}" class="text-xl font-bold">NEProject</a>
        @guest
        <div class="flex flex-row items-center gap-3">
            <a href="{{route('user.login')}}">login</a>
            <a href="{{route('user.register')}}">sign up</a>
        </div>
        @endguest
        @auth
        <div class="flex flex-row items-center gap-3">
            <a href="{{route('user.index')}}">
                <svg width="2rem" height="2rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="9" r="3" stroke="#0EA5E9" stroke-width="1.5" />
                    <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#0EA5E9" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </a>
            <a href="{{route('course.mycourses')}}">
                <svg width="2rem" height="2rem" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1 2h16v11H1z" />
                    <path fill="none" stroke="#0EA5E9" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M4 5.5v5s3-1 5 0v-5s-2-2-5 0zM9 5.5v5s3-1 5 0v-5s-2-2-5 0z" />
                    <path fill="#0EA5E9" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M8.5 14l-3 3h7l-3-3z" />
                </svg>
            </a>
        </div>
        @endauth
    </div>

    <div class="absolute min-h-screen w-full bg-zinc-900 bg-opacity-30 backdrop-blur-md z-[60] top-0 left-0 hidden flex items-center justify-center" id="searchBar" onclick="hideSearchbar()">
        <form action="{{route('dashboard')}}" method="get" class="flex flex-col items-center p-4 bg-zinc-800 rounded-xl" onclick="fun(event)">
            <input type="text" name="search" class="border-2 border-sky-500 bg-transparent rounded-xl p-1 w-52">
            <button type="submit">Search</button>
        </form>
    </div>

    @yield('content')
    @if($errors->any())
    <div class="flex flex-col items-start justify-between p-3 gap-3 text-red-400 rounded-xl bg-zinc-900 absolute bottom-0 right-0 m-3 transition-all" id="errorDiv">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif

    <script>
        let errorDiv = document.getElementById('errorDiv');
        if (errorDiv) {
            setTimeout(function() {
                errorDiv.classList.add('hidden');
            }, 3000);
        }

        function showSearchbar() {
            document.body.classList.add('h-screen');
            document.body.classList.add('overflow-hidden');
            document.getElementById('searchBar').classList.remove('hidden');

        }

        function hideSearchbar() {
            document.body.classList.remove('h-screen');
            document.body.classList.remove('overflow-hidden');
            document.getElementById('searchBar').classList.add('hidden');

        }

        function fun(event) {
            event.stopPropagation();
        }
    </script>
    @yield('script')
</body>

</html>