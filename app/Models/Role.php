<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{

    public $guarded = [
        'name',

    ];


}
