<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request) {
        return response()->json(
            $this->classe::create($request->all()), 201
        );
    }

    public function show(int $id) {
        $resource = $this->classe::find($id);
        if (is_null( $resource )) {
            return response()->json(["error" => "O recurso solicitado não existe."], 204);
        }
        return response()->json( $resource );
    }

    public function update( int $id, Request $request ) {
        $resource = $this->classe::find( $id );
        if( is_null($resource) ) {
            return response()->json(["error" => "O recurso solicitado não existe."], 204);
        }
        
        $resource->fill($request->all());
        $resource->save();
        return $resource;
    }

    public function destroy( int $id ) {
        $deletedResources = $this->classe::destroy($id);
        if ($deletedResources === 0) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }
        return response()->json('', 204);
    }
}
