<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Registrasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->no_registrasi = mt_rand(1000, 9999);
            $model->expired_at = Carbon::now()->addMinutes(15); // Set waktu kedaluwarsa
        });
    }
}
