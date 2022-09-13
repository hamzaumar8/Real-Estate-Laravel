<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">

            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    @isset($back)
                    <div class="flex px-3 w-full">
                        <x-back-link href=" {{ $back }}" class="mb-4">back</x-back-link>
                    </div>
                    @endisset
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                        @isset($header)
                        <h6 class="mb-0 font-bold capitalize">{{ $header }}</h6>
                        @endisset
                    </div>
                    <div class="flex justify-end w-1/2 max-w-full px-3 text-right">
                        @isset($headerActions)
                        {{$headerActions}}
                        @endisset
                    </div>
                </div>
            </div>
            <div class="flex-auto p-6">


                @if(Session::has('success'))
                <x-alert-success>{{Session::get('success')}}</x-alert-success>
                @endif

                @if(Session::has('error'))
                <x-alert-error>{{Session::get('error')}}</x-alert-error>
                @endif
                <x-errors class="mb-4" />

                {{ $slot }}
            </div>
        </div>
    </div>
</div>