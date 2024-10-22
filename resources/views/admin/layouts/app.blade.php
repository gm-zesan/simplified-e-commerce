<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recruitment Task</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.includes.styles')
    @stack('custom-style')

</head>
<body style="overflow-x: hidden">
    <div id="main-wrapper">
        @include('admin.includes.sidebar')
        <div class="content scrollbar" id="fullpage" style="background-color: #f0f1f7;">
            @include('admin.includes.header')
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>


    @include('admin.includes.scripts')
    
    @stack('custom-scripts')

</body>
</html>
