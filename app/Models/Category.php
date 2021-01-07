<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    #asignacion masiva
    protected $fillable = ['name', 'slug'];

    #Hacer que el slug de la categoria aparezca en el panel de control
    public function getRouteKeyName()
    {
        return "slug";
    }

    #Relacion uno a muchos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
