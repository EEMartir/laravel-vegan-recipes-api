<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'description',
        'ingredients',
        'cookTime',
        'instructions',
        'image_file',
        'category_id' //llave foranea
    ];
}
