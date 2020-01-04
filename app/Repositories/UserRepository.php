<?php
namespace App\Repositories;
use DB;
use App\Model\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

//    public function getUserByEmail($email) {
//        return $this->model->where('email', $email)->first();
//    }
}
