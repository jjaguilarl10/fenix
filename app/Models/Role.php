<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['id','name_role','status_id'];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 
    public function status_id(){
        return $this->belongsTo(state::class, 'status_id', 'id');
    }
    

}
