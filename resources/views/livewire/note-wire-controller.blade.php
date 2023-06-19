@php use Carbon\Carbon; @endphp
<div
     class="container mx-auto px-4">
    {{-- Listing --}}
    <div class="text-right mt-6">
        <a class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
           wire:click.prevent="$emitTo('modal-window','showModal')"
           href="#">Create</a>
    </div>
    <div
        class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4" style="width: 20px">#</th>
                            <th scope="col" class="px-6 py-4">Title</th>
                            <th scope="col" class="px-6 py-4">Price</th>
                            <th scope="col" class="px-6 py-4">Publish</th>
                            <th scope="col" class="px-6 py-4">From Date</th>
                            <th scope="col" class="px-6 py-4">To Date</th>
                            <th scope="col" class="px-6 py-4" style="width: 50px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($models as $model)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{$model->id}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$model->title}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$model->price}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$model->publish}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$model->from_date}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$model->till_date}}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <a
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        href="#"
                                        wire:click="$emitTo('modal-window','showModal',{{$model->id}})"
                                    >Edit</a>
                                    <a
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        href="#"
                                        wire:click="onDelete({{$model->id}})"
                                    >Delete</a>
                                </td>
                            </tr>
                        @empty
                            <h2>No records found!</h2>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$models->links()}}
</div>
<livewire:modal-window>
</livewire:modal-window>
