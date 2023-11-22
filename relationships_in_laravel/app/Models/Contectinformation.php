<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contectinformation extends Model
{
    use HasFactory;

    protected $guards=[];
    public function contect(){
        return $this->belongsTo(Contect::class);
    }
}
