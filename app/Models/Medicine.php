<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
