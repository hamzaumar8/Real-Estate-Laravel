<x-app-layout>
    <x-table-card header="Property ({{$property->title}})" back="{{ route('property.index') }}">

        <div class="grid grid-cols-3 gap-5 mt-4">
            <div class="col-span-3">
                <!-- <x-button label="Assgin Owner" positive onclick='Livewire.emit -->

                <button
                    class="outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-positive-500 text-white bg-positive-500 hover:bg-positive-600 hover:ring-positive-600 dark:ring-offset-slate-800 dark:bg-positive-700 dark:ring-positive-700 dark:hover:bg-positive-600 dark:hover:ring-positive-600"
                    onclick='Livewire.emit("openModal", "staffadmin.property.assign-owner", {{ json_encode(["propertyId" => $property->id,"confirmationTitle" => "Assign Owner","routeId" => "show"]) }})'>Assgin
                    Owner</button>

            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Property Number
            </div>
            <div class="col-span-2">
                {{$property->property_number}}
            </div>
            <div class=" col-span-3 border-b">
            </div>
            <div class="capitalize font-bold">
                Property Title
            </div>
            <div class="col-span-2">
                {{$property->title}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Property address
            </div>
            <div class="col-span-2">
                {{$property->address}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div class="capitalize font-bold">
                Property House Number
            </div>
            <div class="col-span-2">
                {{$property->house_number}}
            </div>
            <div class="col-span-3 border-b"></div>
        </div>
        <div class="grid grid-cols-2 gap-5 mt-4 py-5">
            @foreach ($property->owners->reverse() as $owner)
            <x-card class="mt-4" title="Owner">
                <div class="flex">
                    <div class="mr-4">
                        @if($owner->passport_picture)
                        <x-avatar size="w-24 h-24" src="{{asset('assets/img/owners')}}/{{$owner->passport_picture}}" />
                        @else
                        <x-avatar size="w-24 h-24" src="https://picsum.photos/300?size=24x" />
                        @endif
                    </div>
                    <div>
                        <p>
                            <a href="{{route('owners.show',$owner->id)}}">{{$owner->title}} {{$owner->name}}</a>
                        </p>
                        <p>
                            {{$owner->email}}
                        </p>
                        <p>
                            {{$owner->phone1}}
                            {{$owner->id}}
                        </p>

                    </div>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-end items-center">
                        <livewire:staffadmin.property.unassign-owner :ownerId="$owner->id"
                            :propertyId="$property->id" />
                    </div>
                </x-slot>
            </x-card>
            @endforeach
        </div>
    </x-table-card>
</x-app-layout>