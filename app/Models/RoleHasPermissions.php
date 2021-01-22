<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermissions extends Model
{
    protected $table    = 'role_has_permissions';
    protected $fillable = ['permission_id', 'role_id'];
}
