<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Http\Controllers\Controller;
use Sentinel;
use Flash;

class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    public function __construct(UserRepository $userRepository, UserValidator $validator, Request $request)
    {
        $this->repository = $userRepository;
        $this->validator = $validator;
        $this->request = $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $users = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $users,
            ]);
        }
        $title = "List User";
        return view('backend.users.index', compact('users', 'title'));
    }

    public function create()
    {
        $title = "Add A User";
        return view('backend.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $this->validator->with($this->request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->repository->hashPassword($data);
			unset($data['avatar']);
            if ($request->hasFile('avatar')) {
                $filename = rand(111, 999) . '-' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path() . '/upload/images/', $filename);
                $data['avatar'] = '/public/upload/images/' . $filename;
            }
            $this->repository->create($data);

            \Flash::success('User Created.');

            return redirect()->route('admin.users.user');

        } catch (ValidatorException $e) {
            if ($this->request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit User";
        $user = $this->repository->find($id);
        return view('backend.users.edit', compact('user', 'title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            unset($data['avatar']);
            if ($data['password'] == "") {
                unset($data['password']);
            } else {
                $this->repository->hashPassword($data);
            }
            if ($request->hasFile('avatar')) {
                $filename = rand(111, 999) . '-' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path() . '/upload/images/', $filename);
                $data['avatar'] = '/public/upload/images/' . $filename;
				\File::delete(url($data['temp_avatar']));
				unset($data['temp_avatar']);
            }else{
				$data['avatar'] = $data['temp_avatar'];
				unset($data['temp_avatar']);
			}
            $this->repository->update($data, $id);
            \Flash::success('User updated.');
            return redirect()->route('admin.users.user');
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('User deleted.');
        return redirect()->back()->with('message', 'User deleted.');
    }
}
