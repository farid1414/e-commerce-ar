<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    @stack('css')
    @yield('css')
    @include('admin.include.style')
</head>

<body>

    @include('admin.komponenadmin.header')
    @include('admin.komponenadmin.sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>@yield('head_breadcumb')</h1>
            <nav>
                <ol class="breadcrumb">
                    @yield('content_header')
                </ol>
            </nav>
        </div>

        @yield('content')
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @include('admin.komponenadmin.footer')

    @include('admin.include.script')
    @stack('js')
    @yield('js')
</body>

</html>
