<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Hotel extends BaseModel implements HasMedia
{
    use Sluggable, HasMediaTrait;

    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'slug',
		'location',
		'continent',
		'about',
		'room_type',
		'board_type',
		'checkin_time',
		'checkout_time',
		'others_feature',
		'cost_per_night',
		'is_open',
		'view',
		'created_by',
		'updated_by',
    ];

    protected $hidden = [];

    protected $appends = ['feature_image'];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'location' => 'string',
        'continent' => 'string',
        'about' => 'string',
        'room_type' => 'string',
        'board_type' => 'string',
        'checkin_time' => 'string',
        'checkout_time' => 'string',
        'others_feature' => 'string',
        'cost_per_night' => 'double',
        'is_open' => 'boolean',
        'view' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getFeatureImageAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.hotel.feature_image'));
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
        // check for feature image
        if (request()->hasFile('feature_image')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.hotel.feature_image'))) {
                $this->clearMediaCollection(config('core.media_collection.hotel.feature_image'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('feature_image')
                ->toMediaCollection(config('core.media_collection.hotel.feature_image'));
        }
    }
}
