<?php

namespace App\Http\Controllers%subfolder%;

use App\Contracts\Interactions%subfolder%\%model%Create;
use App\Contracts\Interactions%subfolder%\%model%Update;
use App\Contracts\Repositories%subfolder%\%model%Repository;
use App\Http\Controllers\BaseKrudController;

/**
 * Class %model%Controller
 * @package App\Http\Controllers%subfolder%\%model%Controller
 */
class %model%Controller extends BaseKrudController
{
    /**
     * @param %model%Repository $repo
     */
    public function __construct(%model%Repository $repo)
    {
        // $this->middleware('auth');
        // $this->middleware('admin');
        // $this->middleware('cors');
        $this->createInteraction    = %model%Create::class;
        $this->updateInteraction    = %model%Update::class;
        $this->repo                 = $repo;
    }

    /**
     * Return the given record by the $id.
     * GET|HEAD /records
     *
     * @param int $id
     * @return Model
     */
    public function show($id)
    {
        return $this->repo->find($id);
    }
}

/*
 |--------------------------------------------------
 |  MODEL DEFINITIONS - (Example) - New%model%
 |--------------------------------------------------
 |  /**
 |   * @SWG\Definition(required={"name"}, definition="New%model%")
 |   *
 |  class Genre extends Eloquent
 |  {
 |      /**
 |       * @SWG\Property(example="Electronic")
 |       *
 |      public $name;
 */

/**
 * @SWG\Definition(
 *     definition="%model%",
 *     allOf = {
 *          { "$ref": "#/definitions/New%model%" },
 *          { "$ref": "#/definitions/Timestamps" },
 *          { "required": {"id"} }
 *     }
 * )
 * @SWG\Definition(
 *     definition="Detail%model%",
 *     allOf = {
 *          { "$ref": "#/definitions/%model%" },
 *     }
 * )
 */

// List models.
/**
* @SWG\Get(
*   path="/%model_name_url%",
*   summary="List all %model%",
*   tags={"%folder%"},
*   operationId="list%model%",
*   produces={"application/json"},
*   @SWG\Parameter(ref="#/parameters/sort"),
*   @SWG\Parameter(ref="#/parameters/columns"),
*   @SWG\Parameter(ref="#/parameters/take"),
*   @SWG\Parameter(ref="#/parameters/page"),
*   @SWG\Response(response="default", description="requested record", ref="$/responses/JsonResponse",
*       @SWG\Schema(@SWG\Property(property="data", ref="#/definitions/%model%"))
*   ),
* )
*
*/

// Create model
/**
* @SWG\Post(
*   path="/%model_name_url%",
*   summary="Create a new %model%",
*   tags={"%folder%"},
*   operationId="create%model%",
*   @SWG\Parameter(ref="#/parameters/New%model%_in_body"),
*   @SWG\Response(response=201, description="New created %model%", ref="$/responses/JsonResponse",
*       @SWG\Schema(@SWG\Property(property="data", ref="#/definitions/Detail%model%"))
*   ),
*   @SWG\Response(response=422, ref="#/responses/ValidationResponse")
* )
*
*/


// Get model by ID
/**
* @SWG\Get(
*   path="/%model_name_url%/{id}",
*   summary="Get a %model% by its ID",
*   tags={"%folder%"},
*   operationId="show%model%",
*   produces={"application/json"},
*   @SWG\Parameter(ref="#/parameters/id_in_path"),
*   @SWG\Response(response="404", description="%model% not found"),
*   @SWG\Response(response="default", description="requested %model%", ref="$/responses/JsonResponse",
*       @SWG\Schema(@SWG\Property(property="data", ref="#/definitions/Detail%model%"))
*   ),
* )
*
*/

// Update model
/**
* @SWG\Put(
*   path="/%model_name_url%/{id}",
*   sumary="Update %model%",
*   operationId="update%model%",
*   tags={"%folder%"},
*   produces={"application/json"},
*   @SWG\Parameter(ref="#/parameters/id_in_path"),
*   @SWG\Parameter(ref="#/parameters/%model%_in_body"),
*   @SWG\Response(response="default", description="requested %model%", ref="$/responses/JsonResponse",
*       @SWG\Schema(@SWG\Property(property="data", ref="#/definitions/%model%"))
*   ),
*   @SWG\Response(response="404", description="%model% not found"),
*   @SWG\Response(response=422, ref="#/responses/ValidationResponse")
* )
*/


// Delete model
/**
 * @SWG\Delete(
 *   tags={"%folder%"},
 *   path="/%model_name_url%/{id}",
 *   @SWG\Response(response="default", ref="#/definitions/JsonResponse")
 * )
 */


// Body parameters
/**
 *   @SWG\Parameter(
 *      parameter="New%model%_in_body",
 *   	name="params",
 *   	description="Parameters to pass (in body)",
 *   	@SWG\Schema(ref="#/definitions/New%model%"),
 *   	required=false,
 *   	in="body"
 *   ),
 *   @SWG\Parameter(
 *      parameter="%model%_in_body",
 *   	name="params",
 *   	description="Parameters to pass (in body)",
 *   	@SWG\Schema(ref="#/definitions/New%model%"),
 *   	required=false,
 *   	in="body"
 *   ),
 */
