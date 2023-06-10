<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = [
        'date',
    ];

    public static function nextNumber()
    {
        $number = self::count();

        if (!$number) {
            return 1;
        }

        return ++$number;
    }

    // user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // tour service
     public function tourService() {
        return $this->belongsTo(TourService::class);
    }

    // tour pick-up point
    public function tourPickupPoint() {
        return $this->belongsTo(TourPickupPoint::class);
    }
}
