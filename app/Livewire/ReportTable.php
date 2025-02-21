<?php

namespace App\Livewire;

use Livewire\Component;
use App\DataTables\ReportsDataTable;

class ReportTable extends Component
{
    public function render(ReportsDataTable $dataTable)
    {
        return $dataTable->render('datatables.index');
    }
}
