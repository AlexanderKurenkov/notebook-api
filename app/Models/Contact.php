<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // название таблицы
    protected $table = 'contacts';

    // поля, которые можно массово назначать
    protected $fillable = [
        'full_name',
        'company',
        'phone',
        'email',
        'birth_date',
        'photo',
    ];
}
