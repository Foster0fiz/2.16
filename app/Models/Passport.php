<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = ['user_id', 'passport_number', 'issue_date', 'expiry_date'];

    // Обратная связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
