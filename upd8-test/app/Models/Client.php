<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'name',
        'date_of_birth',
        'gender',
        'address',
        'state',
        'city'
    ];

    public function getFormattedDateOfBirthAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['date_of_birth'])->format('d/m/Y');
    }
}
