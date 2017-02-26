<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Flash;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductMetaRepository;


class ProductsController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductValidator
     */
    protected $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator, CategoryRepository $categoryRepository, ProductMetaRepository $productmetaRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->categoryRepository = $categoryRepository;
        $this->productmetaRepository = $productmetaRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $products = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $products,
            ]);
        }
        $title = 'List Product';
        return view('backend.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for create the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create A  Product';
        $allCate = $this->categoryRepository->all()->toArray();
        recursionCate($allCate, 0, 1, $selects);
        return view('backend.products.create', compact('title', 'selects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data = $request->all();
            $product_metas = convertData($data);
            $data['slug'] = str_slug($data['title']);
            if ($request->hasFile('avatar')) {
                $filename = rand(111, 999) . '-' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path() . '/upload/images/', $filename);
                $data['avatar'] = 'public/upload/images/' . $filename;
            }
            $product = $this->repository->create($data);

            if ($product) {
                foreach ($product_metas as $product_meta) {
                    $product_meta['value'] = $product_meta['meta_value'];
                    $product_meta['slug'] = str_slug($product_meta['meta_key']);
                    $product_meta['key'] = $product_meta['meta_key'];
                    $product_meta['type'] = $product_meta['meta_type'];
                    $product_meta['product_id'] = $product->id;
                    $this->productmetaRepository->create($product_meta);
                }
            }
            $response = [
                'message' => 'Product created.',
                'data' => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Product created.');
            return redirect()->route('admin.products.index')->with('message', $response['message']);
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
        $product = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view('backend.products.show', compact('product'));
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

        $product = $this->repository->find($id);
        $title = 'Edit A Product';
        $allCate = $this->categoryRepository->all()->toArray();
        recursionCate($allCate, 0, 1, $selects);
        $product_meta = json_encode($product->productMeta->toArray());
        return view('backend.products.edit', compact('product', 'title', 'selects', 'product_meta'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  string $id
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
            $product_metas = convertData($data);

            $product = $this->repository->update($data, $id);
            if ($product) {
                $this->productmetaRepository->deleteByProduct($product->id);
                foreach ($product_metas as $product_meta) {
                    $product_meta['value'] = $product_meta['meta_value'];
                    $product_meta['slug'] = str_slug($product_meta['meta_key']);
                    $product_meta['key'] = $product_meta['meta_key'];
                    $product_meta['type'] = $product_meta['meta_type'];
                    $product_meta['product_id'] = $product->id;
                    $this->productmetaRepository->create($product_meta);
                }
            }

            $response = [
                'message' => 'Product updated.',
                'data' => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Product updated.');
            return redirect()->route('admin.products.index')->with('message', $response['message']);
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
                'message' => 'Product deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Product deleted.');
        return redirect()->back()->with('message', 'Product deleted.');
    }
}
