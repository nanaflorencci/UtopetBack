<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalFormRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function Animal(AnimalFormRequest $request)
    {
        $Animal = Animal::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'sexo' => $request->sexo,
            'raca' => $request->raca,
            'descricao' => $request->descricao,
            'vacina' => $request->vacina,
            'castracao' => $request->castracao,
        ]);
            return response()->json([
            'success' => true,
            'message' => "Animal cadastrado com êxito",
            'data' => $Animal
        ], 200);
    }

    public function pesquisarPorNome(Request $request)
    {
        $Animal =  Animal::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($Animal) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Animal
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'não há resultados para pesquisa.'
        ]);
    }



    public function retornarTodos()
    {
        $Animal = Animal::all();
        return response()->json([
            'status' => true,
            'data' => $Animal
        ]);
    }



    public function pesquisarPorId($id)
    {
        $Animal = Animal::find($id);
        if ($Animal == null) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $Animal
        ]);
    }

}