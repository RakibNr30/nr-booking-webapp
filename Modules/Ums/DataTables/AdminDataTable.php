<?php

namespace Modules\Ums\DataTables;

use App\Helpers\AuthManager;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

// models...
use Modules\Ums\Entities\User;

class AdminDataTable extends DataTable
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
                return view('ums::admin.action', compact('data'))->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        // user model instance
        $user = $model->newQuery();
        // apply joins
        $user->join('user_personal_infos as admin_personal_info', 'users.id', 'admin_personal_info.user_id');
        // select column
        $user->select([
            'users.*',
            DB::raw('CONCAT(admin_personal_info.first_name, if(admin_personal_info.last_name is not null, CONCAT(" ", admin_personal_info.last_name), "")) as admin_name'),
        ]);

        $user->whereHas("roles", function ($query) {
            $query->where("name", "!=", "User");
        });
        // filter
        if (!AuthManager::isSuperAdmin()) {
            $user->whereHas("roles", function ($query) {
                $query->where("name", "Admin");
            });
        }

        $user->latest();

        // return data
        return $user;
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
            Column::make('admin_name')->name('admin_personal_info.first_name')->title('Name'),
            Column::make('email'),
            Column::make('created_at')->title('Joined On'),
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
        return 'Admin_' . date('YmdHis');
    }
}
