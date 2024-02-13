<div class="w-96 h-64 rounded-xl custom-shadow flex flex-col overflow-hidden">
    <img src="{{asset('images/2022_08_MicrosoftTeams-image-13-2-1.jpg')}}" alt="" class="h-36 w-full">
    <div class="text-xl py-2 px-3 flex justify-between items-center">
        <h4 class="truncate">{{$course->title}} - {{$course->user->name}}</h4>
        <a href="{{route('course.show',$course->id)}}" class="text-xl px-2 py-1 bg-sky-600 text-zinc-900 rounded">View</a>
    </div>
    <span class="text-lg truncate p-2">{{$course->description}}</span>
</div>