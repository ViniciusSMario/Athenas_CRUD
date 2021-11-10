<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomExceptions;
use App\Helpers\CustomHelper;
use App\Person;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $persons = Person::paginate(10);

            if(count($persons) == 0)
            {
                return response()->json(['message' => 'Pessoas não encontradas'], 404);
            }

            return response()->json($persons, 200);
        }catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível encontrar as pessoas!', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), Person::$rules_post, CustomHelper::get_mensagens_validacao());

            if($validator->fails())
            {
                throw new CustomExceptions($validator->errors()->first(), 400);
            }

            $persons = new Person();
            $persons->fill($request->all());

            $persons->save();

            return response()->json($persons, 201);
        }
        catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível cadastrar a pessoas', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            if(!$persons = Person::find($id))
            {
                return response()->json(['message' => 'Pessoa não encontrada'], 404);
            }

            return response()->json($persons, 200);
        }
        catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível listar as pessoas', 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            if(!$persons = Person::find($id)){
                return response()->json(['message' => 'Pessoa não encontrada'], 404);
            }

            $persons->fill($request->all());

            $persons->save();

            return response()->json($persons, 200);
        }
        catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível atualizar a pessoa', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            if(!$persons = Person::find($id))
            {
                return response()->json(['message' => 'Pessoa não encontrada'], 404);
            }

            $persons = Person::destroy($id);

            return response()->json($persons, 200);
        } catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível deletar a pessoa', 500);
        }
    }
}
