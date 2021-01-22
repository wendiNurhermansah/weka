<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

// Model
use App\Models\AdminDetails;
use App\Models\ModelHasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table    = 'admins';
    protected $fillable = ['id', 'username', 'password', 'created_at', 'updated_at'];

    public function admin_detail()
    {
        return $this->hasMany(AdminDetails::class, 'admin_id', 'id');
    }

    public function role()
    {
        return $this->hasMany(ModelHasRoles::class, 'model_id', 'id');
    }
}
