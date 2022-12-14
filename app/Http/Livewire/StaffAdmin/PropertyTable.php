<?php

namespace App\Http\Livewire\StaffAdmin;

use App\Models\Property;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PropertyTable extends PowerGridComponent
{
    use ActionButton;
    //Table sort field
    public string $sortField = 'properties.id';

    /*
    |--------------------------------------------------------------------------
    |  Event listeners
    |--------------------------------------------------------------------------
    | Add custom events to PropertiesTable
    |
    */
    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(),
            [
                'edit-property' => 'editProperty',
                'bulkDelete',
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    |  Bulk delete button
    |--------------------------------------------------------------------------
    */
    public function bulkDelete(): void
    {
        $this->emit('openModal', 'staffadmin.property.delete-action', [
            'propertyIds'                 => $this->checkboxValues,
            'confirmationTitle'       => 'Delete property',
            'confirmationDescription' => 'Are you sure you want to delete this property?',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Edit Property button
    |--------------------------------------------------------------------------
    */
    public function editProperty(array $data): void
    {
        dd('You are editing', $data);
    }

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Property>
     */
    public function datasource(): Builder
    {
        return Property::query()->orderBy('created_at', 'DESC');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('property_number')
            ->addColumn('title')
            ->addColumn('title_formatted', fn (Property $model) => '<a class="underline" href="' . route('property.show', ['property' => $model->id]) . '"/>' . $model->title . '</a>')
            ->addColumn('address')
            ->addColumn('house_number')
            ->addColumn('created_at_formatted', fn (Property $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Property $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('PROPERTY NUMBER', 'property_number')
                ->sortable()
                ->searchable(),

            Column::make('TITLE', 'title_formatted', 'title')
                ->sortable()
                ->searchable(),

            Column::make('HOUSE NUMBER', 'house_number')
                ->sortable()
                ->searchable(),

            Column::make('ADDRESS', 'address')
                ->sortable()
                ->searchable(),

            Column::make('ADDED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable(),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Header Action Buttons
    |--------------------------------------------------------------------------
    */

    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->caption(__('Bulk delete'))
                ->class('outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2     ring-red-500 text-red-500 border border-red-500 hover:bg-red-50 dark:ring-offset-slate-800 dark:hover:bg-slate-700')
                ->emit('bulkDelete', [])
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Property Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('assign', 'Assign')
                ->class('px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase  cursor-pointer')
                ->openModal('staffadmin.property.assign-owner', [
                    'propertyId' => 'id',
                    'confirmationTitle' => 'Assign Owner',
                ]),

            Button::make('edit', 'Edit')
                ->class('bg-indigo-500 cursor-pointer text-white px-4 py-2 rounded-md text-xs font-semibold uppercase border border-transparent ')
                ->emit('edit-property', [
                    'propertyId' => 'id',
                    'custom' => __METHOD__
                ]),

            Button::make('destroy', 'Delete')
                ->class('px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase  cursor-pointer')
                ->openModal('staffadmin.pro    perty.delete-action', [
                    'propertyId'                  => 'id',
                    'confirmationTitle'       => 'Delete property',
                    'confirmationDescription' => 'Are you sure you want to delete this property?',
                ]),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Property Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($property) => $property->id === 1)
                ->hide(),
        ];
    }
    */
}