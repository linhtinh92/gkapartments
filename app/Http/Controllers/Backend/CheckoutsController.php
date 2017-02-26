<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CheckoutCreateRequest;
use App\Http\Requests\CheckoutUpdateRequest;
use Flash;
use App\Repositories\CheckoutRepository;
use App\Validators\CheckoutValidator;


class CheckoutsController extends Controller
{

    /**
     * @var CheckoutRepository
     */
    protected $repository;

    /**
     * @var CheckoutValidator
     */
    protected $validator;

    public function __construct(CheckoutRepository $repository, CheckoutValidator $validator)
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
        $checkouts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $checkouts,
            ]);
        }
        $title = 'List  Checkout';
        return view('backend.checkouts.index', compact('checkouts','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Checkout';
        return view('backend.checkouts.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CheckoutCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $checkout = $this->repository->create($request->all());

            $response = [
                'message' => 'Checkout created.',
                'data'    => $checkout->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Checkout created.');
            return redirect()->route('admin.checkouts.index')->with('message', $response['message']);
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
        $checkout = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $checkout,
            ]);
        }

        return view('backend.checkouts.show', compact('checkout'));
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
        $data = array();
        $checkout = $this->repository->find($id);
        if($checkout){
            $returnHtml = view('backend.checkouts.edit')->with('checkout', $checkout)->render();
            $data = array(
                'html' => $returnHtml,
                'element' => "my_checkout"
            );
        }
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CheckoutUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $checkout = $this->repository->update($request->all(),$id);

            $response = [
                'message' => 'Checkout updated.',
                'data'    => $checkout->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Checkout updated.');
            return redirect()->route('admin.checkouts.index')->with('message', $response['message']);
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
                'message' => 'Checkout deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Checkout deleted.');
        return redirect()->back()->with('message', 'Checkout deleted.');
    }
}
