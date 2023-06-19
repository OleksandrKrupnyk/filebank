<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>
    <link rel="shortcut icon" href="assets/img/favicon.ico"/>
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="./assets/img/apple-icon.png"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <title>Dashboard | File Bank</title>
    <script src="{{URL::asset('build/lib/ckeditor5-build-classic/ckeditor.js' )}}"></script>
    <script src="{{URL::asset('build/lib/tinymce/tinymce.min.js')}}"></script>

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="text-blueGray-700 antialiased">
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root">
    @include('layouts.nav')
    <div class="relative md:ml-64 bg-blueGray-50">
        @include('layouts.header')
        <!-- Header -->
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div>
                    <!-- Card stats -->
                </div>
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                            <div class="flex flex-wrap items-center" id="app">
                                @yield('body')
                                {{ $slot??'' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </div>


</div>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="{{URL::asset('build/lib/theme.js')}}"></script>
<!--scripts-->
@yield('scripts')
<!--scripts-stack-->
@stack('scripts')
@vite('resources/js/app.js')
@livewireScripts
</body>
</html>
