<x-app-layout>
    <x-table-card header="Properties">
        <x-slot name="headerActions">
            <x-link href=" {{ route('property.create') }}"><i class="fa fa-plus mr-2"></i> property</x-link>
        </x-slot>

    </x-table-card>
</x-app-layout>