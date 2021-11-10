<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TemporadasController extends Controller
{
    public function index(): Response
    {
        return response(Temporada::all(), Response::HTTP_OK);
    }

    public function store(Request $request): Response
    {
        /** @todo criação da regra para salvar 1 temporada */
        return response('', Response::HTTP_CREATED);
    }

    public function show(int $id): Response
    {
        /** @todo buscar a temporada e retornar seus dados */
        return response('', Response::HTTP_OK);
    }

    public function update(Request $request, int $id): Response
    {
        /** @todo atualização de temporada */
        return response('No Content', Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        /** @todo exclusão de temporada */
        return response('OK', Response::HTTP_OK);
    }
}