<x-app-layout>
    <x-table-card header="Property ({{$property->title}})" back="{{ route('property.index') }}">


        <div class="grid grid-cols-3 gap-5 mt-4">
            <div>
                Thesis / Dissertation Title
            </div>
            <div class="col-span-2">
                {{$property->title}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div>
                Appointment Date
            </div>
            <div class="col-span-2">
                {{$property->address}}
            </div>
            <div class="col-span-3 border-b"></div>
            <div>
                Completed Status
            </div>
            <div class="col-span-3 border-b"></div>
        </div>
        <div class="grid grid-cols-2 gap-5 mt-4 py-5">
            @foreach ($property->owners->reverse() as $owner)
            <x-card class="mt-4" title="Owner">
                <div class="flex">
                    <div class="mr-4">
                        @if($owner->passport_picture)
                        <x-avatar size="w-24 h-24" src="{{asset('assets/supervisor')}}/{{$owner->passport_picture}}" />
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
                        </p>

                    </div>
                </div>
            </x-card>
            @endforeach
        </div>
    </x-table-card>
</x-app-layout>