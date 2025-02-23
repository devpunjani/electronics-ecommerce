<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forgotPasswordModel extends Model
{
    use HasFactory;
    protected $table="forgotpassword";
    protected $primaryKey="id";
}
