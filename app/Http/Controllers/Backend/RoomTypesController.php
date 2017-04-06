<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RoomTypeCreateRequest;
use App\Http\Requests\RoomTypeUpdateRequest;
use Flash;
use App\Repositories\RoomTypeRepository;
use App\Repositories\RoomTypeImgRepository;
use App\Validators\RoomTypeValidator;


class RoomTypesController extends Controller
{

    /**
     * @var RoomTypeRepository
     */
    protected $repository;

    /**
     * @var RoomTypeValidator
     */
    protected $validator;

    public function __construct(RoomTypeRepository $repository, RoomTypeValidator $validator, RoomTypeImgRepository $roomTypeImgRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->roomTypeImgRepository = $roomTypeImgRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $roomTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $roomTypes,
            ]);
        }
        $title = 'List  RoomType';
        return view('backend.roomTypes.index', compact('roomTypes', 'title'));
    }

    /**
     * Show the form for create the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create A  RoomType';

        return view('backend.roomTypes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoomTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $params = [
                'apartment_id' => $request->apartment_id,
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'area' => $request->area,
                'price' => $request->price,
                'video' => $request->video,
                'sumary' => $request->sumary,
                'pay' => $request->pay,
                'excludes' => $request->excludes,
                'includes' => $request->includes,
                'meta_keywords' => $request->meta_keywords,
                'meta_keywords' => $request->meta_keywords,
                'status' => $request->status
            ];
            $roomType = $this->repository->create($params);
            if($roomType){
                $data = convertArray($request->all());
            }
            $response = [
                'message' => 'RoomType created.',
                'data' => $roomType->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('RoomType created.');
            return redirect()->route('admin.roomTypes.index')->with('message', $response['message']);
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $roomType,
            ]);
        }

        return view('backend.roomTypes.show', compact('roomType'));
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

        $roomType = $this->repository->find($id);
        $title = 'Edit A RoomType';
        return view('backend.roomTypes.edit', compact('roomType', 'title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RoomTypeUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $roomType = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'RoomType updated.',
                'data' => $roomType->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('RoomType updated.');
            return redirect()->route('admin.roomTypes.index')->with('message', $response['message']);
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
                'message' => 'RoomType deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('RoomType deleted.');
        return redirect()->back()->with('message', 'RoomType deleted.');
    }
}
