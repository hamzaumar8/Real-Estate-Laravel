@props(['active'])

@php
$classes = ($active ?? false)
? 'bg-green-500 shadow-soft-2xl mr-2 flex h-9 w-9 items-center justify-center rounded-lg bg-center stroke-0
text-center xl:p-2.5 text-white'
: 'shadow-soft-2xl mr-2 flex h-9 w-9 items-center justify-center rounded-lg bg-center fill-current stroke-0
text-center
xl:p-2.5 bg-gray-200';

$cls = ($active ?? false) ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors': 'py-2.7 text-sm ease-nav-brand my-0 mx-4 flex
items-center whitespace-nowrap rounded-lg px-3 font-semibold text-slate-700 transition-colors shadow-none';
@endphp


<a {{ $attributes->merge(['class' => $cls]) }}>
    <div {{ $attributes->merge(['class' => $classes]) }}>
        {{ $icon }}
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft ">{{ $slot }}</span>
</a>