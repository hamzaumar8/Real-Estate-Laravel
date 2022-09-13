<x-app-layout>
    <x-table-card header="owner's Details ({{$owner->title}} {{$owner->name}})" back="{{ route('owners.index') }}">
        <!--  -->
        <div class="grid grid-cols-3 gap-5 mt-4">
            <div class="col-span-3 text-right">
                <div class="relative flex justify-end items-center">
                    <div
                        class="relative flex justify-center items-center h-[250px] w-[250px] border border-solid overflow-hidden rounded-2xl border-gray-300">
                        @if($owner->passport_picture)
                        <img src="{{$owner->passport_picture}}" class="w-full h-full" alt="">
                        @else
                        <x-application-logo class="inline h-full w-full transition-all duration-200 ease-nav-brand"
                            alt="main_logo" />

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Name
            </div>
            <div class="col-span-2">
                {{$owner->title}} {{$owner->name}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Email
            </div>
            <div class="col-span-2">
                {{$owner->email}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Phone Number
            </div>
            <div class="col-span-2">
                {{$owner->phone1}} {{$owner->phone2 ? ", $owner->phone2 ": ""}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Address
            </div>
            <div class="col-span-2">
                {{$owner->address}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                National Identification Number
            </div>
            <div class="col-span-2">
                {{$owner->nid}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Tin Number
            </div>
            <div class="col-span-2">
                {{$owner->tin}}
            </div>
            <div class="col-span-3 border-b"></div>
        </div>

        <!--  -->
        <div class="grid grid-cols-2 gap-5 mt-4 py-5">
            @foreach ($owner->properties->reverse() as $property)
            <x-card class="mt-4" title="property">
                <div class="flex">
                    <div class="mr-4">
                        @if($property->passport_picture)
                        <x-avatar size="w-24 h-24"
                            src="{{asset('assets/supervisor')}}/{{$property->passport_picture}}" />
                        @else
                        <x-avatar size="w-24 h-24" src="https://picsum.photos/300?size=24x" />
                        @endif
                    </div>
                    <div>
                        <p>
                            <span class="capitalize font-semibold mr-2">property number - </span>
                            <a href="{{route('property.show',$property->id)}}"
                                class="underline">{{$property->property_number}}</a>
                        </p>
                        <p>
                            <span class=" capitalize font-semibold mr-2">title - </span>
                            <a href="{{route('property.show',$property->id)}}"
                                class="underline">{{$property->title}}</a>
                        </p>
                        <p>
                            <span class="capitalize font-semibold mr-2">address - </span>
                            {{$property->address}}
                        </p>
                        <p>
                            <span class="capitalize font-semibold mr-2">address - </span>
                            {{$property->house_number}}
                        </p>

                    </div>
                </div>
            </x-card>
            @endforeach
        </div>
    </x-table-card>
</x-app-layout>