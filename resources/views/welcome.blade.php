@extends('layouts.app')
@section('body')
    <div class="container mx-auto px-4">
        <div>
        <label
            for="ckeditor"
            class="block uppercase text-gray-700 text-xs font-bold mb-2"
        >Editor</label>
        <textarea
            id="ckeditor"
            class=""
            rows="9"
            name="content"
        ></textarea>
        </div>
        <div>
            <h2>Loading file DropZone</h2>
            <input id="file1" type="hidden">
            <vd-dropzone
                _id="file1"
                _name="fileName"
                _upload-url="#"
                :_dz-options='{"maxFiles":1}'
            ></vd-dropzone>
        </div>
    </div>
@endsection
@once
    @push('scripts')
        <script>
            ClassicEditor
                .create( document.querySelector( '#ckeditor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush
@endonce

