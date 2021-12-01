<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Requests\Episodios\StoreEpisodiosRequest;
use App\Http\Requests\Episodios\UpdateEpisodiosRequest;
use App\Models\Episodios;

class EpisodiosController extends Controller
{
    public function index(): Response
    {
        return response(Episodios::all(), Response::HTTP_OK);
    }

    public function store(StoreEpisodiosRequest $request): Response
    {
        $episodioCadastrado = Episodios::create($request->all());
        return response($episodioCadastrado, Response::HTTP_CREATED);
    }

    public function show(int $id): Response
    {
       $episodio = Episodios::findOrFail($id);
       return response($episodio, Response::HTTP_OK);
    }

    public function update(UpdateEpisodiosRequest $request, int $id): Response
    {
        $episodio = Episodios::find($id);
        $episodio->quant_ep = $request['quant_ep'];        
        $episodio->update();

        return response('No Content', Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        Episodios::destroy($id);

        return response('OK', Response::HTTP_OK);
    }
}
