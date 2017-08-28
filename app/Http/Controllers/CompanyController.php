<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    //
    
    public function index()
    {
    	$companies = Company::latest()->paginate(15);

    	return view('company.index', compact('companies'));
    }

    public function create()
    {
    	$view = 'company.add-edit';

    	if( request()->ajax() )
    	{
			$view = 'company.add-edit-ajax';    		
    	}

    	return view($view);
    }

    public function store()
    {
        $this->validate(request(), [
                'name' => 'required',
            ]);

        $company = new Company;

        $company->name = request()->name;
        $company->address = request()->address;
        $company->contact_number_1 = request()->contact_number_1;
        $company->contact_person_1 = request()->contact_person_1;
        $company->contact_number_2 = request()->contact_number_2;
        $company->contact_person_2 = request()->contact_person_2;

        $company->save();

        
        return array( 'success' => true, 'message' => 'Company added successfully', 'company' => $company );

    }

    public function edit($id)
    {
        $company = Company::find($id);

        $view = 'company.add-edit';

        if( request()->ajax() )
        {
            $view = 'company.add-edit-ajax';            
        }

        return view($view, compact('company'));
    }

    public function update($id)
    {
        $this->validate(request(), [
                'name' => 'required',
            ]);

        $company = Company::find($id);

        $company->name = request()->name;
        $company->address = request()->address;
        $company->contact_number_1 = request()->contact_number_1;
        $company->contact_person_1 = request()->contact_person_1;
        $company->contact_number_2 = request()->contact_number_2;
        $company->contact_person_2 = request()->contact_person_2;

        $company->save();

        
        return array( 'success' => true, 'message' => 'Company updated successfully', 'company' => $company );
    }

    public function destroy($id)
    {
        Company::find($id)->delete();

        request()->session()->flash('flash_message', 'Company deleted successfully.');

        return redirect(url('companies'));
    }
}
