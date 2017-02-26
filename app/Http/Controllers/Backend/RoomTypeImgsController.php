<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RoomTypeImgCreateRequest;
use App\Http\Requests\RoomTypeImgUpdateRequest;
use Flash;
use App\Repositories\RoomTypeImgRepository;
use App\Validators\RoomTypeImgValidator;


class RoomTypeImgsController extends Controller
{

    /**
     * @var RoomTypeImgRepository
     */
    protected $repository;

    /**
     * @var RoomTypeImgValidator
     */
    protected $validator;

    public function __construct(RoomTypeImgRepository $repository, RoomTypeImgValidator $validator)
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
        $roomTypeImgs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $roomTypeImgs,
            ]);
        }
        $title = 'List  RoomTypeImg';
        return view('backend.roomTypeImgs.index', compact('roomTypeImgs','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  RoomTypeImg';
        return view('backend.roomTypeImgs.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  RoomTypeImgCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $roomTypeImg = $this->repository->create($request->all());

            $response = [
                'message' => 'RoomTypeImg created.',
                'data'    => $roomTypeImg->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('RoomTypeImg created.');
            return redirect()->route('admin.roomTypeImgs.index')->with('message', $response['message']);
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
        $roomTypeImg = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $roomTypeImg,
            ]);
        }

        return view('backend.roomTypeImgs.show', compact('roomTypeImg'));
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

        $roomTypeImg = $this->repository->find($id);
        $title = 'Edit A RoomTypeImg';
        return view('backend.roomTypeImgs.edit', compact('roomTypeImg','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RoomTypeImgUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $roomTypeImg = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'RoomTypeImg updated.',
                'data'    => $roomTypeImg->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('RoomTypeImg updated.');
            return redirect()->route('admin.roomTypeImgs.index')->with('message', $response['message']);
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
                'message' => 'RoomTypeImg deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('RoomTypeImg deleted.');
        return redirect()->back()->with('message', 'RoomTypeImg deleted.');
    }
}
