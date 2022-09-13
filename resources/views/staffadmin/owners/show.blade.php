<x-app-layout>
    <x-table-card header="owner ({{$owner->title}} {{$owner->name}})" back="{{ route('owners.index') }}">


        <div class="grid grid-cols-3 gap-5 mt-4">
            <div>
                Thesis / Dissertation Title
            </div>
            <div class="col-span-2">
                {{$owner->title}} {{$owner->name}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div>
                Appointment Date
            </div>
            <div class="col-span-2">
                {{$owner->address}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div>
                Completed Status
            </div>
            <div class="col-span-2">
                {{$owner->nid}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div>
                Completed Status
            </div>
            <div class="col-span-2">
                {{$owner->tin}}
            </div>
            <div class="col-span-3 border-b"></div>
        </div>
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
                            <a href="{{route('property.show',$property->id)}}">{{$property->property_number}}</a>
                        </p>
                        <p>
                            <span class="capitalize font-semibold mr-2">title - </span>
                            <a href="{{route('property.show',$property->id)}}">{{$property->title}}</a>
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