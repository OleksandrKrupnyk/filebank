@if($showModal)
<div
    class="fixed left-0 top-0 z-[1055] h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="exampleModal"
    tabindex="500">
    <div
        class="pointer-events-none relative top-[50px] w-auto translate-y-[-50px] transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                <!--Modal title-->
                <h5
                    class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Edit
                </h5>
                <!--Close button-->
                <button
                    type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    wire:click="onClose()"
                   >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-6 w-6">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!--Modal body-->
            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                <form wire:submit.prevent="onSave" id="{{$formId}}">
                    <div>
                        <label
                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                            for="title">Title</label>
                        <input
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                            type="text" name="title" id="title" placeholder="Title of Notes"
                            value="{{old('title',$model->title)}}"
                            wire:model.lazy="model.title"
                        />
                    </div>
                    <div>
                        <label
                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                            for="content">Content</label>
                        <input
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                            type="text" name="content" id="content" placeholder="Type short decsription of content"
                            value="{{old('content',$model->content)}}"
                            wire:model.lazy="model.content"
                        />
                    </div>
                    <div>
                        <label
                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                            for="form_date">From date</label>
                        <input
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                            type="datetime-local"
                            name="from_date"
                            id="from_date"
                            wire:model.lazy="model.from_date"
                            value="{{old('form_date',$model->from_date)}}"/>
                    </div>
                    <div>
                        <label
                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                            for="to_date">To Date</label>
                        <input
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                            type="datetime-local"
                            name="till_date"
                            id="till_date"
                            wire:model.lazy="model.till_date"
                            value="{{old('to_date',$model->till_date)}}"/>
                    </div>
                    <div>
                        <label
                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                            for="price">Price</label>
                        <input
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                            type="number" name="price" id="price" placeholder="100"
                            wire:model.lazy="model.price"
                            value="{{old('price',$model->price)}}"/>
                    </div>
                </form>
            </div>

            <!--Modal footer-->
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button
                    type="button"
                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                    wire:click="onClose()"
                >
                    Close
                </button>
                <button
                    type="submit"
                    class="bg-blue-500 ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    form="{{$formId}}"
                >
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
@else
    <div></div>
@endif

