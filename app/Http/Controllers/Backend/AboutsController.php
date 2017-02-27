<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AboutCreateRequest;
use App\Http\Requests\AboutUpdateRequest;
use Flash;
use App\Repositories\AboutRepository;
use App\Validators\AboutValidator;


class AboutsController extends Controller
{

    /**
     * @var AboutRepository
     */
    protected $repository;

    /**
     * @var AboutValidator
     */
    protected $validator;

    public function __construct(AboutRepository $repository, AboutValidator $validator)
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
        $abouts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $abouts,
            ]);
        }
        $title = 'List  About';
        return view('backend.abouts.index', compact('abouts','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  About';
        return view('backend.abouts.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  AboutCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $about = $this->repository->create($request->all());

            $response = [
                'message' => 'About created.',
                'data'    => $about->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('About created.');
            return redirect()->route('admin.abouts.index')->with('message', $response['message']);
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
        $about = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $about,
            ]);
        }

        return view('backend.abouts.show', compact('about'));
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

        $about = $this->repository->find($id);
        $title = 'Edit A About';
        return view('backend.abouts.edit', compact('about','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AboutUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $about = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'About updated.',
                'data'    => $about->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('About updated.');
            return redirect()->route('admin.abouts.index')->with('message', $response['message']);
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
                'message' => 'About deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('About deleted.');
        return redirect()->back()->with('message', 'About deleted.');
    }
}
