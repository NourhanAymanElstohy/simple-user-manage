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
        $this->belongsToMany(Type::class);
    }

    public function users()
    {
        $this->belongsToMany(User::class);
    }
}
