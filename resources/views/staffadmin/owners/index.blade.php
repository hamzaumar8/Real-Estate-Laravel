<x-app-layout>
    <x-table-card header="Owners">
        <x-slot name="headerActions">
            <x-link href=" {{ route('owners.create') }}"><i class="fa fa-plus mr-2"></i> owner</x-link>
        </x-slot>

        <livewire:staff-admin.owner-table />
    </x-table-card>
</x-app-layout>