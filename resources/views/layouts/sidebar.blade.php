 <!-- sidenav  -->
 <aside
     class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased transition-transform duration-200 xl:left-0 xl:translate-x-0 ps xl:bg-white shadow-soft-xl">
     <div class="h-19.5">
         <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
             sidenav-close></i>
         <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
             <!-- <img src="../assets/img/logo-ct.png" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" /> -->
             <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Logo</span>
         </a>
     </div>

     <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent mb-4" />

     <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
         <ul class="flex flex-col pl-0 mb-0">
             <li class="mt-0.5 w-full">
                 <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                     <x-slot name="icon">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-full h-full">
                             <path fill-rule="evenodd"
                                 d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                                 clip-rule="evenodd" />
                             <path
                                 d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                         </svg>
                     </x-slot>
                     {{ __('Dashboard') }}
                 </x-sidebar-link>
             </li>

             <li class="mt-0.5 w-full">
                 <x-sidebar-link :href="route('property.index')" :active="request()->routeIs('property.index')">
                     <x-slot name="icon">
                         <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>office</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1869.000000, -293.000000)" fill="currentColor"
                                     fill-rule="nonzero">
                                     <g transform="translate(1716.000000, 291.000000)">
                                         <g transform="translate(153.000000, 2.000000)">
                                             <path class="fill-slate-800 opacity-60"
                                                 d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                             </path>
                                             <path class="fill-slate-800"
                                                 d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                             </path>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>
                     </x-slot>
                     {{ __('Property') }}
                 </x-sidebar-link>
             </li>

             <li class="mt-0.5 w-full">
                 <x-sidebar-link :href="route('owners.index')" :active="request()->routeIs('owners.index')">
                     <x-slot name="icon">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-6 h-6">
                             <path
                                 d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                         </svg>
                     </x-slot>
                     {{ __('Owners') }}
                 </x-sidebar-link>
             </li>


             <!--  -->
             <li class="w-full mt-4">
                 <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Account</h6>
             </li>
             <!--  -->

             <li class="mt-0.5 w-full">
                 <x-sidebar-link :href="route('profile')" :active="request()->routeIs('profile')">
                     <x-slot name="icon">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-6 h-6">
                             <path fill-rule="evenodd"
                                 d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                 clip-rule="evenodd" />
                         </svg>
                     </x-slot>
                     {{ __('Profile') }}
                 </x-sidebar-link>
             </li>
             <li class="mt-0.5 w-full">
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <x-sidebar-link :href="route('logout')"
                         onclick="event.preventDefault();this.closest('form').submit();">
                         <x-slot name="icon">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-6 h-6">
                                 <path fill-rule="evenodd"
                                     d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z"
                                     clip-rule="evenodd" />
                             </svg>
                         </x-slot>
                         {{ __('Log Out') }}
                     </x-sidebar-link>
                 </form>
             </li>
         </ul>
     </div>

 </aside>