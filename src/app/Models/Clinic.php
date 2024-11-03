<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinic';
    protected $guarded = [
        'Id'
    ];
    public $timestamps = false;
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
