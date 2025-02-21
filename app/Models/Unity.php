<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    use HasFactory; 

    protected $table = 'unitys';

    protected $fillable = [
        'fantasy-name',
        'corporate-name',
        'cnpj',
    ];

    public function flag()
    {
        return $this->belongsTo(Flag::class, 'flags_id');
    }

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }

    public function requests()
    {
        return $this->hasMany(Requests::class);
    }
}

