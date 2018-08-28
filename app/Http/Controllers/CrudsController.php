<?php

namespace App\Http\Controllers;

use App\Crud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

/**
 * Class CrudsController
 * @package App\Http\Controllers
 */
class CrudsController extends Controller
{
    /**
     * @param Generator $faker
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function create(Generator $faker)
    {
        $crud        = new Crud();
        $crud->name  = $faker->lexify('????????');
        $crud->color = $faker->boolean ? 'red' : 'green';
        $crud->save();

        return response($crud->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function index()
    {
        return response(Crud::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(Request $request, $id)
    {
        $crud        = Crud::findOrFail($id);
        $crud->color = $request->color;
        $crud->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy($id)
    {
        Crud::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
