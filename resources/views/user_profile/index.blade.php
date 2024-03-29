@extends('layouts.app')
@section('body')
    <div class="container mx-auto px-4">
        <div class="text-right mt-6">
            <a class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"

               href="{{ route('up.create') }}">Create</a>
        </div>


        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4" style="width: 20px">#</th>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4" style="width: 50px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($models as $model)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$model->id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$model->name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$model->email}}</td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            href="{{ route('up.edit', $model) }}"
                                        >Edit</a></td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
