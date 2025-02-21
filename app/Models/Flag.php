<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory; 

    protected $fillable = [
        'name',
    ];

    public function economicGroup() 
    {
       return $this->belongsTo(EconomicGroup::class, 'economic_groups_id');
    }

    public function unitys()
    {
        return $this->hasMany(Unity::class);
    }
}
