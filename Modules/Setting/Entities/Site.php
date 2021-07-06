<?php

namespace Modules\Setting\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Site extends BaseModel implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'sites';

    protected $fillable = [
        'title',
		'description',
    ];

    protected $hidden = [];

    protected $appends = [
        'logo',
        'logo_light',
        'favicon',
        'breadcrumb_image',
    ];

    protected $casts = [
        'title' => 'string',
		'description' => 'string',
    ];

    public function getLogoAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.setting_site.logo'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function getLogoLightAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.setting_site.logo_light'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function getFaviconAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.setting_site.favicon'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function getBreadcrumbImageAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.setting_site.breadcrumb_image'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function uploadFiles()
    {
        // check for logo
        if (request()->hasFile('logo')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.setting_site.logo'))) {
                $this->clearMediaCollection(config('core.media_collection.setting_site.logo'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('logo')
                ->toMediaCollection(config('core.media_collection.setting_site.logo'));
        }

        // check for logo dark
        if (request()->hasFile('logo_light')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.setting_site.logo_light'))) {
                $this->clearMediaCollection(config('core.media_collection.setting_site.logo_light'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('logo_light')
                ->toMediaCollection(config('core.media_collection.setting_site.logo_light'));
        }

        // check for favicon
        if (request()->hasFile('favicon')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.setting_site.favicon'))) {
                $this->clearMediaCollection(config('core.media_collection.setting_site.favicon'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('favicon')
                ->toMediaCollection(config('core.media_collection.setting_site.favicon'));
        }

        // check for banner image
        if (request()->hasFile('breadcrumb_image')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.setting_site.breadcrumb_image'))) {
                $this->clearMediaCollection(config('core.media_collection.setting_site.breadcrumb_image'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('breadcrumb_image')
                ->toMediaCollection(config('core.media_collection.setting_site.breadcrumb_image'));
        }
    }
}
