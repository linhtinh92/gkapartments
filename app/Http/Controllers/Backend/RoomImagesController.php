<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RoomImageCreateRequest;
use App\Http\Requests\RoomImageUpdateRequest;
use Flash;
use App\Repositories\RoomImageRepository;
use App\Validators\RoomImageValidator;


class RoomImagesController extends Controller
{

    /**
     * @var RoomImageRepository
     */
    protected $repository;

    /**
     * @var RoomImageValidator
     */
    protected $validator;

    public function __construct(RoomImageRepository $repository, RoomImageValidator $validator)
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
        $roomImages = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $roomImages,
            ]);
        }
        $title = 'List  RoomImage';
        return view('backend.roomImages.index', compact('roomImages','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  RoomImage';
        return view('backend.roomImages.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  RoomImageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $roomImage = $this->repository->create($request->all());

            $response = [
                'message' => 'RoomImage created.',
                'data'    => $roomImage->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('RoomImage created.');
            return redirect()->route('admin.roomImages.index')->with('message', $response['message']);
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
        $roomImage = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $roomImage,
            ]);
        }

        return view('backend.roomImages.show', compact('roomImage'));
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

        $roomImage = $this->repository->find($id);
        $title = 'Edit A RoomImage';
        return view('backend.roomImages.edit', compact('roomImage','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RoomImageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $roomImage = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'RoomImage updated.',
                'data'    => $roomImage->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('RoomImage updated.');
            return redirect()->route('admin.roomImages.index')->with('message', $response['message']);
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
                'message' => 'RoomImage deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('RoomImage deleted.');
        return redirect()->back()->with('message', 'RoomImage deleted.');
    }
}
