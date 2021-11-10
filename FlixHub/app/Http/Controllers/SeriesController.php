<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Response;
use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;

class SeriesController extends Controller
{

    public function index(): Response
    {
        return response(Serie::all(), Response::HTTP_OK);
    }


    public function store(StoreSerieRequest $request): Response
    {
        $serieCadastrada = Serie::create($request->all());
        return response($serieCadastrada, Response::HTTP_CREATED);
    }

    
    public function show(int $id): Response
    {
       
       $serie = Serie::findOrFail($id);
       return response($serie, Response::HTTP_OK);
    }

    
    public function update(UpdateSerieRequest $request, int $id): Response
    {
        $serie = Serie::find($id);
        if (isset($request['nome'])) {
            $serie->nome = $request['nome'];
        }

        if (isset($request['status'])) {
            $serie->status = $request['status'];
        }

        $serie->save();

        return response('No Content', Response::HTTP_NO_CONTENT);
    }

   
    public function status(int $id): Response
    {
        $serie = Serie::find($id);
        if ($serie->status === 'não-assistido') {
            $serie->status = 'assistido';
        }else{
            $serie->status = 'não-assistido';
        }

        $serie->save();

        return response('No Content', Response::HTTP_NO_CONTENT);
    }

    
    public function destroy(int $id): Response
    {
        Serie::destroy($id);

        return response('OK', Response::HTTP_OK);
    }
}
