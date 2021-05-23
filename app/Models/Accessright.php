<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessright extends Model
{
    use HasFactory;

    protected $fillable = ['access_title'];

    public function types()
    {
        return $this->belongsToMany(Type::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
