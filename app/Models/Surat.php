<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $fillable = [
        'no_surat',
        'tipe_surat',
        'judul',
        'dari',
        'perihal',
        'kepada',
        'status',
        'nama_file',
        'user_id',
        'accepted_at'
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function historys()
    {
        return $this->hasMany(History::class);
    }
}
