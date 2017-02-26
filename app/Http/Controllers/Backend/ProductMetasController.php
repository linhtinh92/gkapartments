<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductMetaCreateRequest;
use App\Http\Requests\ProductMetaUpdateRequest;
use Flash;
use App\Repositories\ProductMetaRepository;
use App\Validators\ProductMetaValidator;


class ProductMetasController extends Controller
{

    /**
     * @var ProductMetaRepository
     */
    protected $repository;

    /**
     * @var ProductMetaValidator
     */
    protected $validator;

    public function __construct(ProductMetaRepository $repository, ProductMetaValidator $validator)
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
        $productMetas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productMetas,
            ]);
        }
        $title = 'List  ProductMeta';
        return view('backend.productMetas.index', compact('productMetas','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  ProductMeta';
        return view('backend.productMetas.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductMetaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $productMetum = $this->repository->create($request->all());

            $response = [
                'message' => 'ProductMeta created.',
                'data'    => $productMetum->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('ProductMeta created.');
            return redirect()->route('admin.productMetas.index')->with('message', $response['message']);
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
        $productMetum = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productMetum,
            ]);
        }

        return view('backend.productMetas.show', compact('productMetum'));
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

        $productMetum = $this->repository->find($id);
        $title = 'Edit A ProductMeta';
        return view('backend.productMetas.edit', compact('productMetum','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProductMetaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $productMetum = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'ProductMeta updated.',
                'data'    => $productMetum->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('ProductMeta updated.');
            return redirect()->route('admin.productMetas.index')->with('message', $response['message']);
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
                'message' => 'ProductMeta deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('ProductMeta deleted.');
        return redirect()->back()->with('message', 'ProductMeta deleted.');
    }
}
