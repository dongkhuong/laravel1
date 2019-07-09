<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Company;
use Illuminate\Http\Request;
class CustomersController extends Controller
{
    public function index(){
        $activeCustomers = Customer::where('active','1')->get();
        $inactiveCustomers = Customer::where('active','0')->get();
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get(); scope in laravel
        $customers= Customer::all(); 
        $companies = Company::all();
        return view('customers.index',['customers'=>$customers,'activeCustomers'=>$activeCustomers,'inactiveCustomers'=>$inactiveCustomers,'companies'=>$companies]);
    }
    public function create(){
        $companies = Company::all();
        return view('customers.create',compact('companies'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->active = $request->input('active');
        $customer->company_id = $request->input('company_id');
        $customer->save();
        return redirect('customers');
    }
}
