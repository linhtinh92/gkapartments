<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BrandLogoCreateRequest;
use App\Http\Requests\BrandLogoUpdateRequest;
use Flash;
use App\Repositories\BrandLogoRepository;
use App\Validators\BrandLogoValidator;
use File;


class BrandLogosController extends Controller
{

    /**
     * @var BrandLogoRepository
     */
    protected $repository;

    /**
     * @var BrandLogoValidator
     */
    protected $validator;

    public function __construct(BrandLogoRepository $repository, BrandLogoValidator $validator)
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
        $brandLogos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $brandLogos,
            ]);
        }
        $title = 'List Brand Logo';
        return view('backend.brandLogos.index', compact('brandLogos','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Brand Logo';
        return view('backend.brandLogos.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandLogoCreateRequest $request
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
                $data['images'] = 'public/upload/images/' . $filename;
            }
            $brandLogo = $this->repository->create($data);

            $response = [
                'message' => 'Brand Logo created.',
                'data'    => $brandLogo->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('BrandLogo created.');
            return redirect()->route('admin.brandLogos.index')->with('message', $response['message']);
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
        $brandLogo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $brandLogo,
            ]);
        }

        return view('backend.brandLogos.show', compact('brandLogo'));
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

        $brandLogo = $this->repository->find($id);
        $title = 'Edit A Brand Logo';
        return view('backend.brandLogos.edit', compact('brandLogo','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BrandLogoUpdateRequest $request
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
                $data['images'] = 'public/upload/images/' . $filename;
                File::delete($data['temp_images']);
                unset($data['temp_images']);
            }
            $brandLogo = $this->repository->update($data,$id);

            $response = [
                'message' => 'Brand Logo updated.',
                'data'    => $brandLogo->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Brand Logo updated.');
            return redirect()->route('admin.brandLogos.index')->with('message', $response['message']);
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
                'message' => 'Brand Logo deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Brand Logo deleted.');
        return redirect()->back()->with('message', 'BrandLogo deleted.');
    }
}
