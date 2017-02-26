<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use Flash;
use App\Repositories\BlogRepository;
use App\Validators\BlogValidator;


class BlogsController extends Controller
{

    /**
     * @var BlogRepository
     */
    protected $repository;

    /**
     * @var BlogValidator
     */
    protected $validator;

    public function __construct(BlogRepository $repository, BlogValidator $validator)
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
        $blogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $blogs,
            ]);
        }
        $title = 'List  Blog';
        return view('backend.blogs.index', compact('blogs','title'));
    }
        /**
         * Show the form for create the specified resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $title = 'Create A  Blog';
        return view('backend.blogs.create', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogCreateRequest $request
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
            $blog = $this->repository->create($data);

            $response = [
                'message' => 'Blog created.',
                'data'    => $blog->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Blog created.');
            return redirect()->route('admin.blogs.index')->with('message', $response['message']);
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
        $blog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $blog,
            ]);
        }

        return view('backend.blogs.show', compact('blog'));
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

        $blog = $this->repository->find($id);
        $title = 'Edit A Blog';
        return view('backend.blogs.edit', compact('blog','title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BlogUpdateRequest $request
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
            $blog = $this->repository->update($data,$id);

            $response = [
                'message' => 'Blog updated.',
                'data'    => $blog->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            \Flash::success('Blog updated.');
            return redirect()->route('admin.blogs.index')->with('message', $response['message']);
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
                'message' => 'Blog deleted.',
                'deleted' => $deleted,
            ]);
        }
        \Flash::success('Blog deleted.');
        return redirect()->back()->with('message', 'Blog deleted.');
    }
}
