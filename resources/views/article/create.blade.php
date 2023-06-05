@extends('layouts.app')
@section('body')
    <div class="container mx-auto px-4">
        <div class="text-center mt-6">
            <a
                class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                href="{{route('art.index')}}">Back</a>
            <br/>
        </div>
        <form method="post" action="{{route('art.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    for="title1">Title</label>
                <input
                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"

                    type="text" name="title" id="title1" placeholder="Title" value="{{old('title',$model->title)}}"/>
            </div>
            <div>
                <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    for="desc1">Description</label>
                <input
                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                    type="text" name="descr" id="desc1" placeholder="Description"
                       value="{{old('descr',$model->descr)}}"/>
            </div>

            <div>
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
                <h1>Gallery</h1>
                <label
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    for="galery1">Image 1</label><br/>
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file"
                    name="galery[]"
                    id="galery1"
                /><br/>
                <label
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    for="galery2">Image 2</label><br/>

                <input
                    type="file"
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"

                    name="galery[]"
                    id="galery2"
                /><br/>
                <label
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    for="galery3">Image 3</label><br/>
                <input
                    type="file"
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"

                    name="galery[]"
                    id="galery3"
                />
            </div>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"

                type="submit">Create</button>
        </form>
    </div>
@endsection
