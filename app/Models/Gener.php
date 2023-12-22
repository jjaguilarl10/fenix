<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gener extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'geners';
    protected $fillable = ['id','name_gener','status_id'];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 
    public function status_id(){
        return $this->belongsTo(state::class, 'status_id', 'id');
    }
    
}
