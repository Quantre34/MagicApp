<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;
    protected $table = 'category';
    protected $guarded = [
        'Id'
    ];
    public $timestamps = false;
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
