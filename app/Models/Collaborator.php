<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = [
        'name',
        'email',
        'cpf',
    ];

    public function unitys()
    {
        return $this->belongsTo(Unity::class);
    }

    public function requests()
    {
        return $this->hasMany(Requests::class);
    }
}
