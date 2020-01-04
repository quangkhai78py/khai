<?php
namespace App\Service;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepo;
//    protected $postRepo;

    public  function __construct(UserRepository $userRepo
//                                 PostRepository $postRepo
    )
    {
        $this->userRepo = $userRepo;
//        $this->postRepo = $postRepo;
    }

    /**
     * @function getUserDetail.
     * @description Get user detail.
     * @param $id
     * @return array
     */
    public function getUserDetail($id) {
        $user = $this->userRepo->getById($id);

        if(!$user) {
            return config('error.user_not_found');
        }
        return [
            'error' => 0,
            'message' => 'success',
            'data' => $user
        ];
    }

    /**
     * @function CreateUser.
     * @description Create new user.
     * @param $data
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function createUser($data)
    {
        $createUser = $this->userRepo->create($data);

        if (!$createUser){
            return config('error.user_not_found');
        }
        return [
            'error' => 0,
            'message' => 'success',
            'data' => $createUser
        ];
    }

    /**
     * @function getAllUser.
     * @description Get all of user has in database.
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function getAllUser()
    {
        $getAllUser = $this->userRepo->getAll();

        if(!$getAllUser) {
            return config('error.user_not_found');
        }
        return [
            'error' => 0,
            'message' => 'success',
            'data' => $getAllUser
        ];
    }

    /**
     * @function updateUserById.
     * @description Update user follow id.
     * @param $id
     * @param $data
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function updateUserById($id, $data)
    {
        $updateUserById = $this->userRepo->update($id, $data);

        if(!$updateUserById) {
            return config('error.user_not_found');
        }
        return [
            'error' => 0,
            'message' => 'success',
            'data' => $updateUserById
        ];
    }

    /**
     * @function deleteUserById.
     * @description Delete user follow id of user in database.
     * @param $id
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function deleteUserById($id)
    {
        $delete = $this->userRepo->delete($id);

        if (!$delete){
            return config('error.user_not_found');
        }
        return[
            'error' => 0,
            'message' => 'success',
            'data' => $delete
        ];
    }
//    public function getPostsOfUser($id) {
//        $posts = $this->postRepo->getPostsByUserId($id);
//        return [
//            'error' => 0,
//            'message' => 'success',
//            'data' => $posts
//        ];
//    }
}
