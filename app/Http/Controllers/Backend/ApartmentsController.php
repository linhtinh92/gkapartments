<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ApartmentCreateRequest;
use App\Http\Requests\ApartmentUpdateRequest;
use Flash;
use App\Repositories\ApartmentRepository;
use App\Validators\ApartmentValidator;


class ApartmentsController extends Controller
{

    /**
     * @var ApartmentRepository
     */
    protected $repository;

    /**
     * @var ApartmentValidator
     */
    protected $validator;

    public function __construct(ApartmentRepository $repository, ApartmentValidator $validator)
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
        $apartments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $apartments,
            ]);
        }
        $title = 'List  Apartment';
        return view('backend.apartments.index', compact('apartments','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Apartment';
        return view('backend.apartments.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  ApartmentCreateRequest $request
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
            $apartment = $this->repository->create($data);

            $response = [
                'message' => 'Apartment created.',
                'data'    => $apartment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Apartment created.');
            return redirect()->route('admin.apartments.index')->with('message', $response['message']);
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
        $apartment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $apartment,
            ]);
        }

        return view('backend.apartments.show', compact('apartment'));
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

        $apartment = $this->repository->find($id);
        $title = 'Edit A Apartment';
        return view('backend.apartments.edit', compact('apartment','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ApartmentUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $data = $request->all();
            $data['slug'] = str_slug($data['title']);
            if ($request->hasFile('avatar')) {
                $filename = rand(111, 999) . '-' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path() . '/upload/images/', $filename);
                $data['avatar'] = '/public/upload/images/' . $filename;
                \File::delete(url($data['temp_images']));
                unset($data['temp_images']);
            }
            $apartment = $this->repository->update($data,$id);

            $response = [
                'message' => 'Apartment updated.',
                'data'    => $apartment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Apartment updated.');
            return redirect()->route('admin.apartments.index')->with('message', $response['message']);
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
                'message' => 'Apartment deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Apartment deleted.');
        return redirect()->back()->with('message', 'Apartment deleted.');
    }
}
