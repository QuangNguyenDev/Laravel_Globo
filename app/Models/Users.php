<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'mobile',
        'email',
        'passwordHash',
        'registeredAt',
        'lastLogin',
        'intro',
        'profile',
    ];
}
