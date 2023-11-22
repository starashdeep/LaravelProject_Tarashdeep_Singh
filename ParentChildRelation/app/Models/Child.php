<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $table='children';
    protected $fillable=[
        'first_name',
        'last_name',
        'email_id',
        'guardian_id'
    ];
    public function guardian(){
        return $this->hasOne(Guardian::class, 'id', 'guardian_id');
    }
}
