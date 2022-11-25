<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasRoles,Sortable;

    protected $fillable = ['name','guard_name'];

    protected $sortable = ['id','name'];

    public static function booted()
    {
        static::deleting(function () {
            return false;
        });
    }

    public function isDeletable(): bool
    {
        return false;
    }
}
