<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @OA\Get(
     * path="/users",
     * summary="Show all users",
     * description="Return a collection of users",
     * operationId="usersList",
     * tags={"users"},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/User")
     *        )
     *     )
     * )
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * @OA\Get(
     * path="/users/{id}",
     * summary="Show user with specified id",
     * description="Return a user with id",
     * operationId="userById",
     * tags={"users"},
     * @OA\Parameter(
     *     description="id of user",
     *     in="path",
     *     name="id",
     *     required=true,
     *     example="1",
     *     @OA\Schema(
     *     type="integer",
     *     format="int64"
     * )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(type="object", ref="#/components/schemas/User")
     *        )
     *     )
     * )
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

}
