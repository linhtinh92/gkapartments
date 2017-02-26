<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;
use Illuminate\Support\Facades\Hash;
use App\Validators\UserValidator;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use DB;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    /**
     * Check if there is a new password given
     * If not, unset the password field
     * @param array $data
     */
    private function checkForNewPassword(array &$data)
    {
        if (!$data['password']) {
            unset($data['password']);

            return;
        }

        $data['password'] = Hash::make($data['password']);
    }

    /**
     * Hash the password key
     * @param array $data
     */
    public function hashPassword(array &$data)
    {
        if (isset($data['password']) && $data['password'] != "") {
            $data['password'] = Hash::make($data['password']);
        }

    }

    /**
     * Create a user and assign roles to it
     *
     * @param array $data
     * @param array $roles
     * @param bool $activated
     * @return bool|mixed
     * @throws DontHavePermissionExceptions
     * @throws \Exception
     */
    public function createWithRoles($data, $roles, $activated = false)
    {
        $this->hashPassword($data);
        DB::beginTransaction();
        $user = $this->create((array)$data);
        if (isset($user) && !empty($user)) {
            $user = Sentinel::findById($user->id);
            if (!empty($roles)) {
                $user->roles()->attach($roles);
            }
            if ($activated) {
                $activation = Activation::create($user);
                Activation::complete($user, $activation->code);
            }

            DB::commit();
            return $user;
        } else {
            return false;
        }
    }

    public function updateWithRoles($data, $roles)
    {
        $this->hashPassword($data);
        DB::beginTransaction();
        $user = $this->update((array)$data, $data['user_id']);
        if (isset($user) && !empty($user)) {
            $user = Sentinel::findById($user->id);
            if (!empty($roles)) {
                $user->roles()->sync($roles);
            }
            DB::commit();
            return $user;
        } else {
            return false;
        }
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
