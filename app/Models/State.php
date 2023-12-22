<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model{
    
    use HasFactory;
    protected $table = 'states';
    protected $fillable = [ 'id','name_state'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
}
