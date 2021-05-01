<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Model\Bank\employee__bank;
use App\Model\Employee\employee__contact_detail;

class employee__personal_detail extends Model
{
    protected $table = 'employee__personal_detail';

    protected $primaryKey = 'employee_id';
    public function employee__bank()
    {
    	return $this->hasOne( employee__bank::class );	
    }
    public function employee__contact_detail()
    {
    	return $this->hasOne( employee__contact_detail::class );
    }
    
    
}
