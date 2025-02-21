<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'unitys_id',
        'collaborators_id',
        'products_id',
    ];

    public function unitys()
    {
        return $this->belongsTo(Unitys::class);
    }

    public function collaborators()
    {
        return $this->belongsTo(Collaborator::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
