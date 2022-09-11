<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeList extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'date', 
        'state_id'
    ];

    public function linesFeePackages(){
        return $this->hasMany(LinesFeePackage::class);
    }

}
