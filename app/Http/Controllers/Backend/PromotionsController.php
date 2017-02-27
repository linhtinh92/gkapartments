<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PromotionCreateRequest;
use App\Http\Requests\PromotionUpdateRequest;
use Flash;
use App\Repositories\PromotionRepository;
use App\Validators\PromotionValidator;


class PromotionsController extends Controller
{

    /**
     * @var PromotionRepository
     */
    protected $repository;

    /**
     * @var PromotionValidator
     */
    protected $validator;

    public function __construct(PromotionRepository $repository, PromotionValidator $validator)
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
        $promotions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $promotions,
            ]);
        }
        $title = 'List  Promotion';
        return view('backend.promotions.index', compact('promotions','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Promotion';
        return view('backend.promotions.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  PromotionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data = $request->all();
            $data['slug'] = str_slug($data['title']);
            if ($request->hasFile('avatar')) {
                $filename = rand(111, 999) . '-' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path() . '/upload/images/', $filename);
                $data['avatar'] = 'public/upload/images/' . $filename;
            }
            $promotion = $this->repository->create($data);

            $response = [
                'message' => 'Promotion created.',
                'data'    => $promotion->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Promotion created.');
            return redirect()->route('admin.promotions.index')->with('message', $response['message']);
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
        $promotion = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $promotion,
            ]);
        }

        return view('backend.promotions.show', compact('promotion'));
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

        $promotion = $this->repository->find($id);
        $title = 'Edit A Promotion';
        return view('backend.promotions.edit', compact('promotion','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PromotionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $data = $request->all();
            if ($request->hasFile('avatar')) {
                $filename = rand(111, 999) . '-' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path() . '/upload/images/', $filename);
                $data['avatar'] = '/public/upload/images/' . $filename;
                \File::delete(url($data['temp_images']));
                unset($data['temp_images']);
            }
            $promotion = $this->repository->update($data,$id);

            $response = [
                'message' => 'Promotion updated.',
                'data'    => $promotion->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Promotion updated.');
            return redirect()->route('admin.promotions.index')->with('message', $response['message']);
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
                'message' => 'Promotion deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Promotion deleted.');
        return redirect()->back()->with('message', 'Promotion deleted.');
    }
}
