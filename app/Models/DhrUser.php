<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DhrUser extends Model
{
  // use Notifiable;
    protected $primaryKey = 'userId';
    public $fillable = ['email_phone', 'password', 'type', 'f_name'];

}
