<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable=[
        'name', 'owner', 'phone_no', 'address',
    ];

    public function book(){
        return $this->hasMany(Book::class);
    }
}