<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ConfigCreateRequest;
use App\Http\Requests\ConfigUpdateRequest;
use Flash;
use App\Repositories\ConfigRepository;
use App\Validators\ConfigValidator;


class ConfigsController extends Controller
{

    /**
     * @var ConfigRepository
     */
    protected $repository;

    /**
     * @var ConfigValidator
     */
    protected $validator;

    public function __construct(ConfigRepository $repository, ConfigValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $result = [];
        $configs = $this->repository->all();
        if ($configs) {
            foreach ($configs as $key => $row) {
                $result[$row->option_key] = $row->option_value;
            }
        }
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configs,
            ]);
        }
        $title = 'Configs';
        return view('backend.configs.index', compact('result','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Config';
        return view('backend.configs.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  ConfigCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $data = $request->except(['_token']);
            $config = $this->repository->updateSettings($data);

            $response = [
                'message' => 'Config has been updated !'
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Config has been updated !');
            return redirect()->route('admin.configs.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
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
        $config = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $config,
            ]);
        }

        return view('backend.configs.show', compact('config'));
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

        $config = $this->repository->find($id);
        $title = 'Edit A Config';
        return view('backend.configs.edit', compact('config','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ConfigUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $config = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'Config updated.',
                'data'    => $config->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Config updated.');
            return redirect()->route('admin.configs.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
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
                'message' => 'Config deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Config deleted.');
        return redirect()->back()->with('message', 'Config deleted.');
    }
}
