<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    //

   

  protected $table = 'info';

  protected $fillable = ['info_firstname', 'info_lastname', 'info_profile'];



}
