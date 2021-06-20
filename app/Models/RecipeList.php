<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'recipes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
