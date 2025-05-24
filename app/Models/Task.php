<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        return $this->is_completed ? 'Sudah selesai' : 'Belum selesai';
    }
}
