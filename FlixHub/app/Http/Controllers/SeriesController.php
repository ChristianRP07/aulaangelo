<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(): Response
    {
        return response(Serie::all(), 200);
    }


    /**
     * Cria novo registro de série no SGBD.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response
    {
        $request->validate(['nome' => 'required|min:5']);
        $serieCadastrada = Serie::create($request->all());
        return response($serieCadastrada, 201);
    }

    /**
     * Exbe os dados de uma série específica.
     *
     * @param int $id
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function show($id): Response
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
       if ($id === false) {
           return response("Not found", 404);
       }

       $serie = Serie::findOrFail($id);
       return response($serie, 200);

    }

    /**
     * Atualiza uma serie específica.
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): Response
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            return response('Not found', 404);
        }
        $request->validate([
            'nome' => 'min:5|string',
            'status' => 'in:assistido,não-assistido'
        ]);

        $serie = Serie::find($id);
        if (isset($request['nome'])) {
            $serie->nome = $request['nome'];
        }
        if (isset($request['status'])) {
            $serie->status = $request['status'];
        }
        $serie->save();

        return response('No Content', 204);
    }

    /**
     * Atualiza status da série no SGBD.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function status($id): Response
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            return response('Not Found', 404);
        }

        $serie = Serie::find($id);
        if ($serie->status === 'não-assistido') {
            $serie->status = 'assistido';
        } else {
            $serie->status = 'não-assistido';
        }
        $serie->save();

        return response('No Content', 204);
    }

    /**
     * Exclui uma série do SGBD.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Response
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            return response ('Not Found', 404);
        }

        Serie::destroy($id);

        return response('OK', 200);
    }
}
