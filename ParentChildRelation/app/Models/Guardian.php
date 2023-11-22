<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $table='guardians';
    protected $fillable=[
        'first_name',
        'last_name',
        'phone_no'
    ];

    public function child(){
        return $this->belongsTo(Child::class);
    }
}
