<a
    {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-500 focus:outline-none focus:border-green-500 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    <i class="fa fa-arrow-left mr-2"></i>
    {{ $slot }}
</a>