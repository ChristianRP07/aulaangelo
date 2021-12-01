<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Response;
use App\Http\Requests\Temporadas\StoreTemporadaRequest;
use App\Http\Requests\Temporadas\UpdateTemporadaRequest;

class TemporadasController extends Controller
{
    public function index(): Response
    {
        return response(Temporada::all(), Response::HTTP_OK);
    }

    public function store(StoreTemporadaRequest $request): Response
    {
        $temporadaCadastrada = Temporada::create($request->all());
        return response($temporadaCadastrada, Response::HTTP_CREATED);
    }

    public function show(int $id): Response
    {
       $temporada = Temporada::findOrFail($id);
       return response($temporada, Response::HTTP_OK);
    }

    public function update(UpdateTemporadaRequest $request, int $id): Response
    {
        $temporada = Temporada::find($id);
        $temporada->quant_temp = $request['quant_temp'];
        $temporada->update();

        return response('No Content', Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        Temporada::destroy($id);

        return response('OK', Response::HTTP_OK);
    }
}