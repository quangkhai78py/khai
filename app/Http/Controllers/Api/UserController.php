<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    protected $userService;

    public function __construct( UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @function getUserById.
     * @description Get user by Id from database.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserById($id)
    {
        $options = $this->userService->getUserDetail($id);

        return $this->successResponse($options);
    }

//    public function getPostsByUserId($id) {
//        $options = $this->userService->getPostsOfUser($id);
//
//        return $this->successResponse($options);
//    }
//
    /**
     * @function createNewUser.
     * @description Create new user.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNewUser(Request $request)
    {
        $data = $request->all();
        $options = $this->userService->createUser($data);

        return $this->createdResponse($options);
    }

    /**
     * @function getUser.
     * @description Get all of user in database.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        $options =  $this->userService->getAllUser();

        return $this->successResponse($options);
    }

    /**
     * @function update User.
     * @description Update user follow id of user.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request, $id)
    {
        $data = $request->all();
        $options = $this->userService->updateUserById($id, $data);

        return $this->successResponse($options);
    }

    /**
     * @function deleteUSer.
     * @description Delete user follow id of user.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser($id)
    {
        $options = $this->userService->deleteUserById($id);

        return $this->successResponse($options);
    }
}
