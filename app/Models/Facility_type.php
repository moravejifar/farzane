<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility_type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'Facility_type';
    protected $primaryKey ='facilitytype_id';
    protected $fillable = [
        'facilitytype_id',
        'facility_type_name',
        'facility_loc',
        'alt_image',
        'facility_rank',
        'facility_priceusd',
        'facility_image',
        'description',
    ];

    public function facility()
    {
      return $this->hasMany(Facility::class,'facilitytype_id');

    }
}
