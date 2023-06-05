@extends('layouts.app')
@section('body')
    @php use Illuminate\Support\Facades\Storage; @endphp
    <div class="container mx-auto px-4">
        <div class="text-right mt-6">
            <a
                class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                href="{{route('art.index')}}">Back</a>
            <br/>
        </div>
        <form method="post" action="{{route('art.update',$model)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    for="title1">
                    Title
                </label>
                <input
                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                    type="text"
                    name="title"
                    id="title1"
                    placeholder="Title" value="{{old('title',$model->title)}}"
                />
            </div>
            <div>
                <label
                    for="desc1"
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                >Description</label>
                <input
                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                    type="text" name="descr" id="desc1" placeholder="Description"
                    value="{{old('descr',$model->descr)}}"/>
            </div>

            <div>
                @if($model->mainImg)
                    <img class="w-1/6 h-auto max-w-sm rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                         loading="lazy"
                         src="{{ Storage::url('main_img/'.$model->mainImg->file_name)}}" alt=""/>
                    <label>{{ $model->mainImg->file_name }}</label><br/>
                @endif
                <label
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    for="main_img1">Main Image</label>
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file"
                    name="main_img"
                    id="main_img1"
                />
            </div>

            <div>
                @php
                    $model->setRelation('galery',$model->galery->keyBy('position'));
                @endphp
                <h1>Gallery</h1>
                <label
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    for="galery1">Image 1</label><br/>
                @if(isset($model->galery[0]))
                    <img class="w-1/6 h-auto max-w-sm rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                         loading="lazy"
                         src="{{ Storage::url('galery/'.$model->galery[0]->file_name)}}" alt=""/>
                    <label>{{ $model->galery[0]?->file_name }}</label><br/>
                @endif
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file"
                    name="galery[]"
                    id="galery1"
                /><br/>
                <label
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    for="galery2">Image 2</label><br/>
                @if(isset($model->galery[1]))
                    <img class="w-1/6 h-auto max-w-sm rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                         loading="lazy"
                         src="{{ Storage::url('galery/'.$model->galery[1]?->file_name)}}" alt=""/>
                    <label>{{ $model->galery[1]?->file_name }}</label><br/>
                @endif
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file"
                    name="galery[]"
                    id="galery2"
                /><br/>
                <label
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    for="galery3">Image 3</label><br/>
                @if(isset($model->galery[2]))
                    <img class="w-1/6 h-auto max-w-sm rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                         loading="lazy"
                         src="{{ Storage::url('galery/'.$model->galery[2]?->file_name)}}" alt=""/>
                    <label>{{ $model->galery[2]?->file_name }}</label><br/>
                @endif
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file"
                    name="galery[]"
                    id="galery3"
                />
            </div>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
                type="submit">Update</button>
        </form>
    </div>
@endsection
