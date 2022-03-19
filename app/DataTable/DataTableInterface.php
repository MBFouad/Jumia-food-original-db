<?php

namespace App\DataTable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface  DataTableInterface
{
    public function query(Request $request): Builder;

    public function listGrid(Request $request): JsonResponse;

}
