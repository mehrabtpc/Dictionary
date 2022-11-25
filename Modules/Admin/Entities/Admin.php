<?php

namespace Modules\Admin\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Admin extends Authenticatable  implements HasMedia
{
    use HasRoles,HasPermissions,InteractsWithMedia,Sortable;

    protected $fillable = [
        'name',
        'username',
        'mobile',
        'email',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
        'media',
        'remember_token',
    ];

    protected $sortable = [
        'id',
        'name',
    ];


    //start media
    protected $with = [
        'media'
    ];

    protected $appends = ['image'];


    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('images')->singleFile();
    }

    public function getImageAttribute(): ?string
    {
        $media = $this->getFirstMedia('images');
        if (!$media) {
            return asset('dist/img/default_image.jpg');
        }
        return $media->getUrl();
    }

    public function addImage($image)
    {
        if (!$image) {
            return false;
        }

        return $this->addMedia($image)->toMediaCollection('images');
    }


    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')) {
            $this->addImage($request->file('image'));
        }
    }

    public function deleteImage()
    {
        $this->media()->delete();
    }
    //end media

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
