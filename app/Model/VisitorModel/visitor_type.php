<?php

namespace App\Model\VisitorModel;

use Illuminate\Database\Eloquent\Model;

class visitor_type extends Model
{
    protected $fillable = ['type_name'];

    protected $table = 'visitor_type';

    protected $primaryKey = 'type_id';

    public $timestamps = false;
}
