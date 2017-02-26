<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SliderCreateRequest;
use App\Http\Requests\SliderUpdateRequest;
use Flash;
use App\Repositories\SliderRepository;
use App\Validators\SliderValidator;


class SlidersController extends Controller
{

    /**
     * @var SliderRepository
     */
    protected $repository;

    /**
     * @var SliderValidator
     */
    protected $validator;

    public function __construct(SliderRepository $repository, SliderValidator $validator)
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
        $sliders = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $sliders,
            ]);
        }
        $title = 'List Slider';
        return view('backend.sliders.index', compact('sliders','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Slider';
        return view('backend.sliders.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  SliderCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
			$data = $request->all();
			unset($data['images']);
            if ($request->hasFile('images')) {
                $filename = rand(111, 999) . '-' . $request->file('images')->getClientOriginalName();
                $request->file('images')->move(public_path() . '/upload/images/', $filename);
                $data['images'] = '/public/upload/images/' . $filename;
            }
            $slider = $this->repository->create($data);

            $response = [
                'message' => 'Slider created.',
                'data'    => $slider->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Slider created.');
            return redirect()->route('admin.sliders.index')->with('message', $response['message']);
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
        $slider = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $slider,
            ]);
        }

        return view('backend.sliders.show', compact('slider'));
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

        $slider = $this->repository->find($id);
        $title = 'Edit A Slider';
        return view('backend.sliders.edit', compact('slider','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SliderUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$data = $request->all();
			if ($request->hasFile('images')) {
                $filename = rand(111, 999) . '-' . $request->file('images')->getClientOriginalName();
                $request->file('images')->move(public_path() . '/upload/images/', $filename);
                $data['images'] = '/public/upload/images/' . $filename;
				\File::delete(url($data['temp_images']));
				unset($data['temp_images']);
            }
            $slider = $this->repository->update($data,$id);

            $response = [
                'message' => 'Slider updated.',
                'data'    => $slider->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Slider updated.');
            return redirect()->route('admin.sliders.index')->with('message', $response['message']);
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
                'message' => 'Slider deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Slider deleted.');
        return redirect()->back()->with('message', 'Slider deleted.');
    }
}
