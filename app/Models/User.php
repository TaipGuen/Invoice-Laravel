<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';
    public $timestamps = false;
    protected $primaryKey = 'userID';
    protected $fillable = ['userID','firstname','lastname','sex','email','phone','username','password','birthdate'];


}
