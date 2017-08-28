<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;

class LicenseController extends Controller
{
    //
    
    public function index()
    {
    	$licenses = License::orderBy('created_at', 'desc')
    				->with('license_approvals')
    				->paginate(15);

    	return view('license.index', compact('licenses'));
    }
}
