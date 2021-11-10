<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Exceptions\CustomExceptions;
use App\Helpers\CustomHelper;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories = Category::paginate(10);

            if(count($categories) == 0)
            {
                return response()->json(['message' => 'Categorias não encontradas'], 404);
            }

            return response()->json($categories, 200);
        }catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível encontrar as categorias!', 500);
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
            $validator = Validator::make($request->all(), Category::$rules_post, CustomHelper::get_mensagens_validacao());

            if($validator->fails())
            {
                throw new CustomExceptions($validator->errors()->first(), 400);
            }

            $categories = new Category();
            $categories->fill($request->all());

            $categories->save();

            return response()->json($categories, 201);
        }
        catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível cadastrar a categoria', 500);
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
            if(!$categories = Category::find($id))
            {
                return response()->json(['message' => 'Categoria não encontrada'], 404);
            }

            return response()->json($categories, 200);
        }
        catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível listar as categorias', 500);
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

            $validator = Validator::make($request->all(), Category::$rules_post, CustomHelper::get_mensagens_validacao());

            if($validator->fails())
            {
                throw new CustomExceptions($validator->errors()->first(), 400);
            }

            if(!$categories = Category::find($id))
            {
                return response()->json(['message' => 'Categoria não encontrada'], 404);
            }

            $categories->fill($request->all());

            $categories->save();

            return response()->json($categories, 200);
        }
        catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível atualizar a categoria', 500);
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
            if(!$categories = Category::find($id))
            {
                return response()->json(['message' => 'Categoria não encontrada'], 404);
            }

            $categories = Category::destroy($id);

            return response()->json($categories, 200);
        } catch (CustomExceptions $e)
        {
            throw $e;
        }
        catch (Exception $e)
        {
            Log::error($e);
            throw new CustomExceptions('Não foi possível deletar a categoria', 500);
        }
    }
}
