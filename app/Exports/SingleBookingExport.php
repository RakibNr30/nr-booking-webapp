<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Modules\Cms\Entities\Booking;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SingleBookingExport implements FromQuery, WithHeadings, WithStyles
{
    use Exportable;

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return Booking::query()
            ->join('hotels', 'hotels.id', 'bookings.hotel_id')
            ->where('bookings.id', $this->id)
            ->select([
                'hotels.name',
                'bookings.full_name',
                'bookings.last_name',
                'bookings.email',
                'bookings.mobile',
                'bookings.street_address',
                'bookings.postal_code',
                'bookings.city',
                'bookings.country',
                'bookings.cardholder_name',
                'bookings.card_number',
                'bookings.expiry_date',
                'bookings.ccv',
            ]);
    }

    public function headings(): array
    {
        return [
            'Hotel',
            'Full Name',
            'Last Name',
            'E-Mail',
            'Mobile',
            'Street Address',
            'Postal Code',
            'City',
            'Country',
            'Cardholder Name',
            'Card Number',
            'Expiry Date',
            'CCV',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
