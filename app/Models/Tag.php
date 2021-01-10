<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    #Asignacion masiva
    protected $fillable = ['name', 'slug', 'color'];

    #Hacer que el slug de Tag aparezca en la url
    public function getRouteKeyName()
    {
        return "slug";
    }

    #Relacion muchos a muchos
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
