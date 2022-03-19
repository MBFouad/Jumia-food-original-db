<?php

namespace App\Http\Controllers;

use App\DataTable\DataTableInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $_dataTable;

    public function __construct(DataTableInterface $_dataTable)
    {
        $this->_dataTable = $_dataTable;
    }

    public function index()
    {
        return view('customer');
    }

    public function data(Request $request)
    {
        return $this->_dataTable->listGrid($request);

    }
}
