<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    // Set the table
    public $table = "users";
    // Set the fillable columns
    public $toFill = ['name', 'email', 'password'];

}