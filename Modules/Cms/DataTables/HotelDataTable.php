<?php

namespace Modules\Cms\DataTables;

use Modules\Cms\Entities\Hotel;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HotelDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return view('cms::hotel.action', compact('data'))->render();
            })
            ->addColumn('status', function ($data) {
                return view('cms::hotel.status', compact('data'))->render();
            })->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Hotel $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Hotel $model)
    {
        return $model->newQuery()->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('data_table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            /*->dom('Bflrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reload')
            )*/
            ->parameters([
                'pageLength' => 10
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('Sl'),
            Column::make('name'),
            Column::make('location'),
            Column::make('cost_per_night')->title('Cost Per Night (USD)'),
            Column::computed('status')->title('Open/Close'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Hotel_' . date('YmdHis');
    }
}
