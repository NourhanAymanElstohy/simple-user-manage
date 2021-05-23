<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function accessrights()
    {
        return $this->belongsToMany(Accessright::class)->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
