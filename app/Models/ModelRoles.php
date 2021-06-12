<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRoles extends Model
{
    use HasFactory;

    protected $table = 'model_has_roles';
    public $timestamps = false;
    protected $primaryKey = 'model_id';

    protected $fillable=[
        'role_id',
        'model_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'model_id', 'id');
    }
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
