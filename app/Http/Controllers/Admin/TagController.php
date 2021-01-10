<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            'pink' => 'Color Rosa',
            'red' => 'Color Rojo',
            'purple' => 'Color Morado',
            'yellow' => 'Color Amarillo',
            'blue' => 'Color Azul',
            'indigo' => 'Color Indigo',
            'green' => 'Color Verde',
        ];
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required | unique:tags',
            'color' => 'required',
        ]);
        #Crear el nuevo registr
        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se creo con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colors = [
            'pink' => 'Color Rosa',
            'red' => 'Color Rojo',
            'purple' => 'Color Morado',
            'yellow' => 'Color Amarillo',
            'blue' => 'Color Azul',
            'indigo' => 'Color Indigo',
            'green' => 'Color Verde',
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required | unique:tags,slug,$tag->id",
            'color' => 'required',
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag->id)->with('info', 'La etiqueta se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se elimino con exito');
    }
}
