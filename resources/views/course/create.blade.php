@extends('layouts.main')

@section('content')
<div class="w-full flex-grow flex flex-col justify-center items-center">
<form class="rounded-xl flex flex-col p-16 bg-zinc-900 items-center gap-5 md:w-1/2 w-9/12 custom-shadow" action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <span class="text-3xl">Create a Course</span>
        <div class="flex flex-col gap-3 items-start text-lg w-full justify-between">
            <label for="title">title</label>
            <input type="text" name="title" id="title" class="border-2 border-sky-500 bg-transparent rounded-xl p-1 w-full">
        </div>

        <div class="flex flex-col gap-3 items-start text-lg w-full justify-between">
            <label for="description">description</label>
            <textarea type="text" name="description" id="description" class="border-2 border-sky-500 bg-transparent rounded-xl p-1 w-full"></textarea>
        </div>

        <div class="flex flex-col gap-3 items-start text-lg w-full justify-between">
            <input type="file" name="files[]" id="files" class="border-2 border-sky-500 bg-transparent rounded-xl p-1 w-full hidden" multiple>
            <div class="flex flex-col gap-3 items-start w-full" id="fileDiv"></div>
            <button type="button" id="addButton" onclick="addFile()">add files</button>
        </div>

        <button type="submit">Submit</button>
</form>
</div>

@endsection

@section('script')
<script>
    function addFile(e){
        let files = document.getElementById('files');
        files.click();
    }
    document.getElementById('files').addEventListener('change',function(e){
        let tmp = "";
        for (let i = 0; i < this.files.length; i++) {
            const element = this.files.item(i).name;
            tmp += "<span>"+element+"</span>";
        }
        document.getElementById('fileDiv').innerHTML = tmp;
        });
</script>


@endsection