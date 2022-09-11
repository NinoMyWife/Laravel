<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinesFeePackage extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'quantity', 'fee_package_id'];

    public function feePackage(){
        return $this->belongsTo(FeePackage::class);
    }
}
