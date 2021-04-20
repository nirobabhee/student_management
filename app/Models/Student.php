<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'gender',
        'dob',
        'address',
        'sms_no',
        'session',
        'class',
        'group',
        'class_section',
        'roll',
        'active'

    ];
}
