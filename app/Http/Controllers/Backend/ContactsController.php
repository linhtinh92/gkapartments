<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactUpdateRequest;
use Flash;
use App\Repositories\ContactRepository;
use App\Validators\ContactValidator;


class ContactsController extends Controller
{

    /**
     * @var ContactRepository
     */
    protected $repository;

    /**
     * @var ContactValidator
     */
    protected $validator;

    public function __construct(ContactRepository $repository, ContactValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $contacts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contacts,
            ]);
        }
        $title = 'List  Contact';
        return view('backend.contacts.index', compact('contacts', 'title'));
    }

    /**
     * Show the form for create the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create A  Contact';
        return view('backend.contacts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $contact = $this->repository->create($request->all());

            $response = [
                'message' => 'Contact created.',
                'data' => $contact->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Contact created.');
            return redirect()->route('admin.contacts.index')->with('message', $response['message']);
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
        $contact = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contact,
            ]);
        }

        return view('backend.contacts.show', compact('contact'));
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
        $contact = $this->repository->find($id);
        $returnHtml = view('backend.contacts.edit')->with('contact', $contact)->render();
        $data = array(
            'html' => $returnHtml,
            'element' => "my_contact_us"
        );
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ContactUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $contact = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Contact updated.',
                'data' => $contact->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Contact updated.');
            return redirect()->route('admin.contacts.index')->with('message', $response['message']);
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
                'message' => 'Contact deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Contact deleted.');
        return redirect()->back()->with('message', 'Contact deleted.');
    }
}
