<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationUpdateRequest;
use Flash;
use App\Repositories\LocationRepository;
use App\Validators\LocationValidator;


class LocationsController extends Controller
{

    /**
     * @var LocationRepository
     */
    protected $repository;

    /**
     * @var LocationValidator
     */
    protected $validator;

    public function __construct(LocationRepository $repository, LocationValidator $validator)
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
        $locations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $locations,
            ]);
        }
        $title = 'List  Location';
        return view('backend.locations.index', compact('locations','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Location';
        $allCate = $this->repository->all()->toArray();
        recursionCate($allCate, 0, 1, $selects);
        return view('backend.locations.create', compact('title','selects'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  LocationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $location = $this->repository->create($request->all());

            $response = [
                'message' => 'Location created.',
                'data'    => $location->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Location created.');
            return redirect()->route('admin.locations.index')->with('message', $response['message']);
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
        $location = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $location,
            ]);
        }

        return view('backend.locations.show', compact('location'));
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

        $location = $this->repository->find($id);
        $title = 'Edit A Location';
        $allCate = $this->repository->all()->toArray();
        recursionCate($allCate, 0, 1, $selects);
        return view('backend.locations.edit', compact('location','title','selects'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  LocationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $location = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'Location updated.',
                'data'    => $location->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Location updated.');
            return redirect()->route('admin.locations.index')->with('message', $response['message']);
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
                'message' => 'Location deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Location deleted.');
        return redirect()->back()->with('message', 'Location deleted.');
    }
}
