<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Filters\v1\CustomersFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\v1\CustomerResource;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\v1\CustomerCollection;

class CustomerController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $filter = new CustomersFilter();

        #ejemplo de lo que se  pasa: /api/v1/customers?name[eq]="Alison%20Koch"&state[eq]=Colorado
        $filterItems = $filter->transform($request); # [['column','operator','value']]

        $includeInvoices = $request->query('includeInvoices');

        # si $filterItems esta vacio se retorna la paginación
        $customers = Customer::where($filterItems);

        # Si se pide incluir los invoices, lo incluimos con with()
        if ($includeInvoices)            
            $customers = $customers->with('invoices');

        return new CustomerCollection( $customers->paginate()->appends($request->query()) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $includeInvoices = request()->query('includeInvoices');

        # si se piden incluir invoices, lo cargamos
        if($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices'));    
        }

        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
