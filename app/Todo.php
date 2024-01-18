<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'todo_name',
        'first_name',
        'image',
        'last_name',
        'middle_name',
        'middle_initial',
        'mobile_number',
        'gender',
        'civil_status',
        'birthday',
        'age',
        'permanent_address',
        'resident_address',
        'date_hired',
        'tin',
        'sss',
        'pagibig_number',

    ];
    protected $guarded = [
        'id'
    ];
    protected $dates = ['deleted_at'];
}
