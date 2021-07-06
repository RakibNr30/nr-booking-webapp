<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class Booking extends BaseModel
{
    protected $table = 'bookings';

    protected $fillable = [
        'hotel_id',
        'full_name',
        'last_name',
        'email',
        'mobile',
        'street_address',
        'postal_code',
        'city',
        'country',
        'cardholder_name',
        'card_number',
        'expiry_date',
        'ccv',
    ];

    protected $hidden = [];

    protected $casts = [
        'hotel_id' => 'integer',
        'full_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'mobile' => 'string',
        'street_address' => 'string',
        'postal_code' => 'string',
        'city' => 'string',
        'country' => 'string',
        'cardholder_name' => 'string',
        'card_number' => 'string',
        'expiry_date' => 'string',
        'ccv' => 'string',
    ];
}
