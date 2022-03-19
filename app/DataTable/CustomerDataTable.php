<?php

namespace App\DataTable;

use App\Countries\CountryInterface;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerDataTable implements DataTableInterface
{
    public function query(Request $request): Builder
    {
        return Customer::select(['phone']);
    }

    public function listGrid(Request $request): JsonResponse
    {
        return DataTables::of($this->query($request))
            ->filter(function ($query) use ($request) {
                function filterResult($query, $request)
                {
                    $country = null;
                    if ($request->country) {
                        try {
                            $country = 'App\Countries\\' . $request->country . 'Phone';
                            $country = (new $country(''));
                            $query->where('phone', 'like', "({$country->getCountryCode()})%");
                        } catch (\Error $e) {

                        }

                    }
                    if ($request->country && $country instanceof CountryInterface && $request->status != '') {
                        $regex = $request->boolean('status') ? "REGEXP" : "NOT REGEXP";
                        $query->where("phone", $regex, "{$country->getPhoneRegex()}");
                    }
                }

                filterResult($query, $request);
            }

            )
            ->editColumn('phone', fn($customer) => $customer->phoneOnly)
            ->addColumn('country', fn($customer) => $customer->country)
            ->addColumn('status', fn($customer) => $customer->phone_status)
            ->addColumn('country_code', fn($customer) => $customer->country_code)
            ->make(true);
    }
}
