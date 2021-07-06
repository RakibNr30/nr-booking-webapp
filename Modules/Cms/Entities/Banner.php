<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Banner extends BaseModel implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'banners';

    protected $fillable = [
        'title',
        'tag_line',
        'brief_description'
    ];

    protected $hidden = [];

    protected $appends = ['image'];

    protected $casts = [
        'title' => 'string',
        'tag_line' => 'string',
        'brief_description' => 'string'
    ];

    public function getImageAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.banner.image'));
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
        // check for image
        if (request()->hasFile('image')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.banner.image'))) {
                $this->clearMediaCollection(config('core.media_collection.banner.image'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('image')
                ->toMediaCollection(config('core.media_collection.banner.image'));
        }
    }
}
