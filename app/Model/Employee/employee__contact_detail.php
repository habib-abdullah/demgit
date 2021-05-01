<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

class employee__contact_detail extends Model
{
    protected $table = 'employee__contact_details';

    protected $primaryKey = 'emp_contact_detail_id';

    public $timestamps = false;
}
