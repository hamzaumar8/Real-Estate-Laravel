<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/tooltips.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- CSS Files -->

    <link href="{{ asset('assets/css/perfect-scrollbar.css') }}">
    <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css?v=1.0.4') }}" rel="stylesheet" />

    <!-- styles -->
    @livewireStyles
    @powerGridStyles

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <x-notifications />
    @include('layouts.sidebar')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full min-h-screen rounded-xl transition-all duration-200">
        @include('layouts.navigation')

        <!--  -->
        @if (!Route::is('dashboard'))
        <div class="w-full px-6 py-6 mx-auto">
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="leading-normal text-sm">
                    <a class="text-slate-700 font-semibold" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="opacity-50 text-sm pl-2 capitalize leading-normal text-gray-900 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                    aria-current="page">{{request()->segment(1)}}</li>
            </ol>
        </div>
        @endif

        <!--  -->
        <div class="w-full px-6 py-6 mx-auto">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                            &copy;
                            <script>
                            document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="#" class="font-semibold text-slate-700" target="_blank">Onestepp</a>
                        </div>
                    </div>
                    <!-- <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="#"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                    target="_blank">#</a>
                            </li>

                        </ul>
                    </div> -->
                </div>
            </div>
        </footer>
    </main>


    <!-- Scripts -->
    @livewireScripts
    @powerGridScripts
    @livewire('livewire-ui-modal')

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4')}}" async></script>

    <script src="{{ asset('assets/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/tooltips.js') }}"></script>
    <script src="{{ asset('assets/js/nav-pills.js') }}"></script>
    <script src="{{ asset('assets/js/dropdown.js') }}"></script>
    <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
    <script src="{{ asset('assets/js/navbar-sticky.js') }}"></script>

</body>

</html>