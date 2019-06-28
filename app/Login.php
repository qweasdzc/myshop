<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $primarykey='id';
    protected $table='crm_login';
    public $timestamps=false;
}
