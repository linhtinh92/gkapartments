<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ApartmentImgCreateRequest;
use App\Http\Requests\ApartmentImgUpdateRequest;
use Flash;
use App\Repositories\ApartmentImgRepository;
use App\Validators\ApartmentImgValidator;


class ApartmentImgsController extends Controller
{

    /**
     * @var ApartmentImgRepository
     */
    protected $repository;

    /**
     * @var ApartmentImgValidator
     */
    protected $validator;

    public function __construct(ApartmentImgRepository $repository, ApartmentImgValidator $validator)
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
        $apartmentImgs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $apartmentImgs,
            ]);
        }
        $title = 'List  ApartmentImg';
        return view('backend.apartmentImgs.index', compact('apartmentImgs','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  ApartmentImg';
        return view('backend.apartmentImgs.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  ApartmentImgCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $apartmentImg = $this->repository->create($request->all());

            $response = [
                'message' => 'ApartmentImg created.',
                'data'    => $apartmentImg->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('ApartmentImg created.');
            return redirect()->route('admin.apartmentImgs.index')->with('message', $response['message']);
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
        $apartmentImg = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $apartmentImg,
            ]);
        }

        return view('backend.apartmentImgs.show', compact('apartmentImg'));
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

        $apartmentImg = $this->repository->find($id);
        $title = 'Edit A ApartmentImg';
        return view('backend.apartmentImgs.edit', compact('apartmentImg','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ApartmentImgUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $apartmentImg = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'ApartmentImg updated.',
                'data'    => $apartmentImg->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('ApartmentImg updated.');
            return redirect()->route('admin.apartmentImgs.index')->with('message', $response['message']);
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
                'message' => 'ApartmentImg deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('ApartmentImg deleted.');
        return redirect()->back()->with('message', 'ApartmentImg deleted.');
    }
}
