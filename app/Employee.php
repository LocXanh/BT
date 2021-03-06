<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name','email','phone','avatar','address','is_delete'];
    protected $dates = ['deleted_at'];




}
