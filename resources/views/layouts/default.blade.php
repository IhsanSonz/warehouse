<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.includes.head')
</head>

<body class="position-relative m-0 p-0" style="min-height: 100vh;">
    <header>
        @include('components.includes.header')
    </header>

    <div class="container my-4">
        <div id="main">
            @yield('content')
        </div>
    </div>

    <footer class="position-absolute w-100" style="bottom: 0; margin-bottom: -100px">
        @include('components.includes.footer')
    </footer>
</body>

</html>