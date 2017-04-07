<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseFrontController;
use App\Repositories\SliderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\BlogRepository;
use App\Repositories\BrandLogoRepository;
use App\Repositories\CategoryRepository;
use Flash;
use App\Entities\Config;
use App\Repositories\ContactRepository;
use \Cart;
use Hashids\Hashids;

class HomeController extends BaseFrontController
{
    /**
     * @var SliderRepository
     */
    protected $sliderRepository;
    /**
     * @var BrandLogoRepository
     */
    protected $brandLogoRepository;

    /**
     * @var BlogRepository
     */
    protected $blogRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var CategoryRepository
     */

    protected $categoryRepository;
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ContactRepository
     */
    protected $contactRepository;

    public function __construct(SliderRepository $sliderRepository,
                                ProductRepository $productRepository,
                                BlogRepository $blogRepository,
                                BrandLogoRepository $brandLogoRepository,
                                CategoryRepository $categoryRepository,
                                Request $request,
                                ContactRepository $contactRepository)
    {
        parent::__construct();
        $this->sliderRepository = $sliderRepository;
        $this->productRepository = $productRepository;
        $this->brandLogoRepository = $brandLogoRepository;
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
        $this->contactRepository = $contactRepository;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sliders = $this->sliderRepository->findWhere(array('status' => 1));

        $product_featured = $this->productRepository->findWhere(array('status' => 1, 'featured_product' => 1))->toArray();

        $product_new = $this->productRepository->findWhere(array('status' => 1, 'new_product' => 1))->toArray();

        $product_bestseller = $this->productRepository->findWhere(array('status' => 1, 'bestseller_product' => 1));

        $blogs = $this->blogRepository->findWhere(array('status' => 1));

        $brands = $this->brandLogoRepository->findWhere(array('status' => 1));

        return view('frontend.home.index', array('sliders' => $sliders,
            'product_featured' => array_chunk($product_featured, 2),
            'product_new' => array_chunk($product_new, 2),
            'product_bestseller' => $product_bestseller,
            'blogs' => $blogs,
            'brands' => $brands));
    }


    public function aboutUs()
    {
        return view('frontend.contact.index', array('meta_title' => "Liên Hệ",));
    }

    public function contact()
    {
        return view('frontend.contact.index', array('meta_title' => "Liên Hệ",));
    }

    public function postContact(Request $request)
    {
        $data = $request->all();
        $params = array(
            'fullname' => strip_tags($data['fullname']),
            'email' => strip_tags($data['email']),
            'phone' => strip_tags($data['phone']),
            'message' => strip_tags($data['message']),
            'address' => strip_tags($data['address']),
        );
        $contact = $this->contactRepository->create($params);
        if ($contact) {
            $configs = Config::getAllconfigs();
            _sendEmail("emails.contact", "Liên Hệ ", $contact, ['0' => ['email' => $contact->email, 'name' => $contact->fullname]], $configs);
            _sendEmail("emails.contact", "Liên Hệ ", $contact, ['0' => ['email' => $configs['email_receives_feedback'], 'name' => $contact->fullname]], $configs);
            Flash::success('Thông tin liên hệ đã gửi thành công !');
            return redirect()->back();
        } else {
            Flash::error('Lỗi xãy ra khi gửi !');
            return redirect()->back();
        }
    }
}
