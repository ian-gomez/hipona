<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = Categoria::pluck('descripcion','id');
        return view("registro", compact('categorias'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
