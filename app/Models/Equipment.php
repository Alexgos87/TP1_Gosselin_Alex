<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'description',
        'dailyPrice',
        'categoryId',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    // Many-to-many avec Sport
    public function sports()
    {
        return $this->belongsToMany(
            Sport::class,
            'equipmentsports',
            'equipmentId',
            'sportId'
        );
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'equipmentId');
    }
}
