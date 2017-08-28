<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    //
    
    public function license_approvals()
    {
    	return $this->hasMany('App\LicenseApproval');
    }
}
