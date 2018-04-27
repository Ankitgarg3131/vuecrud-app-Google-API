<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{
    protected function create()
    {
        return view();
    }

    protected function store(Request $request)
    {
        $company = Company::create($request->all());
        return $company;
    }

    public function index()
    {
        return Company::all();
    }
}
