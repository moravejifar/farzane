<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='Facility';
    protected $primaryKey ='facility_id';
    protected $fillable = [
        'facility_id',
        'facilitytype_id',
        'facility_name',
        'facility_loc',
        'facility_image',
        'facility_alt',
        'facility_rank',
    ];

    public function facility_type()
    {
        return $this->belongsTo(Facility_type::class,'facilitytype_id');

    }

    public function reservation()
{
  return $this->belongsTo(Reservation::class);

}
}
