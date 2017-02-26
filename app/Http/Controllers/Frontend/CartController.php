<?php

namespace App\Http\Controllers\Frontend;

use \Cart;
use \Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseFrontController;
use App\Repositories\SliderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\BlogRepository;
use App\Repositories\BrandLogoRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\LocationRepository;
use App\Repositories\CheckoutRepository;
use App\Repositories\CartRepository;
use App\Entities\Config;
use Hashids\Hashids;

class CartController extends BaseFrontController
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
     * @var LocationRepository
     */
    protected $locationRepository;

    /**
     * @var CheckoutRepository
     */
    protected $checkoutRepository;

    /**
     * @var CartRepository
     */
    protected $cartRepository;
    /**
     * @var Request
     */
    protected $request;

    public function __construct(SliderRepository $sliderRepository,
                                ProductRepository $productRepository,
                                BlogRepository $blogRepository,
                                BrandLogoRepository $brandLogoRepository,
                                CategoryRepository $categoryRepository,
                                Request $request,
                                LocationRepository $locationRepository,
                                CheckoutRepository $checkoutRepository,
                                CartRepository $cartRepository)
    {
        parent::__construct();
        $this->sliderRepository = $sliderRepository;
        $this->productRepository = $productRepository;
        $this->brandLogoRepository = $brandLogoRepository;
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
        $this->locationRepository = $locationRepository;
        $this->checkoutRepository = $checkoutRepository;
        $this->cartRepository = $cartRepository;
        $this->request = $request;
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();
        $product = $this->productRepository->find($data['product_id']);
        $json = array();
        if ($product) {
            $price = $product->price_sale > 0 ? $product->price_sale : $product->price;
            $qty = $data['data_qty'];
            $cart = Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => $qty,
                'price' => $price,
                'options' => ['avatar' => $product->avatar, 'slug' => $product->slug]]);
            $json['total_item'] = Cart::count();
            $json['qty_item_cart'] = $cart->qty;
            $json['rowid_item_cart'] = $cart->rowId;
            $json['item_cart'] = $this->showItemCart();
            $json['subtotal_cart'] = Cart::subtotal();
            $json['alert_cart'] = "Thêm vào giỏ hàng thành công !";
        } else {
            $json['error'] = "Error";
        }
        return response()->json($json);
    }

    protected function showItemCart()
    {
        $item = "";
        foreach (Cart::content() as $row) {
            $item .= '<div class="cat ' . $row->rowId . '" id="item_cart">';
            $item .= '<a href="' . route("web.productDetail", $row->options->has('slug') ? $row->options->slug : '') . '" title="' . $row->name . '">';
            $item .= '<img src="' . url($row->options->has('avatar') ? $row->options->avatar : '') . '" alt="' . $row->name . '"></a><div class="cat_two"><p>';
            $item .= '<a href="' . route("web.productDetail", $row->options->has('slug') ? $row->options->slug : '') . '" title="' . $row->name . '">' . $row->name . '</a></p>';
            $item .= '<p ><span id = "qty_cart" >' . $row->qty . '</span > x ' . $row->price . '</p ></div ><div class="cat_icon" >';
            $item .= '<a href = "javascript:void(0)" id = "remove_item_cart" data-cart-id = "' . $row->rowId . '" data-token = "' . csrf_token() . '" data-url = "' . route("web.removeItemCart") . '" >';
            $item .= '<i class="fa fa-times" ></i ></a ></div ></div >';
        }
        return $item;
    }

    public function removeItemCart()
    {
        $json = array();
        $rowId = strip_tags($this->request->rowId);
        $content = Cart::content();
        $checkRowId = $content->has($rowId);
        if ($checkRowId) {
            Cart::remove($rowId);
            $json['total_item'] = Cart::count();
            $json['content_cart'] = Cart::content();
            $json['subtotal_cart'] = Cart::subtotal();
            $json['rowid_item_cart'] = $rowId;
            $json['total_cart'] = Cart::total();
        } else {
            $json['error'] = "Error";
        }
        return response()->json($json);
    }

    public function updateCart()
    {
        $json = array();
        $rowId = strip_tags($this->request->row_id);
        $cart_qty = strip_tags($this->request->data_qty);
        $content = Cart::content();
        $checkRowId = $content->has($rowId);
        if ($checkRowId) {
            $cart = Cart::get($rowId);
            Cart::update($rowId, $cart_qty);
            $json['total_item'] = Cart::count();
            $json['subtotal_cart'] = Cart::subtotal();
            $json['item_cart'] = $this->showItemCart();
            $json['total_cart'] = Cart::total();
            $json['qty_item_cart'] = $cart_qty;
            $json['total_price_item_cart'] = number_format($cart_qty * $cart->price);
            $json['rowid_item_cart'] = $rowId;
        } else {
            $json['error'] = "Error";
        }
        return response()->json($json);
    }

    public function gioHang()
    {
        return view('frontend.cart.index', array('meta_title' => 'Giỏ hàng'));
    }

    public function thanhToan()
    {
        $provinces = $this->locationRepository->findByField('parent', 0);
        return view('frontend.cart.checkout', array('meta_title' => 'Thanh toán', 'provinces' => $provinces));
    }

    public function postCheckout()
    {
        if (Cart::count() == 0) {
            return redirect()->route('web.cart');
        } else {
            $data = $this->request->all();
            $params_checkout = array(
                'fullname' => strip_tags($data['checkout_fullname']),
                'company_name' => strip_tags($data['checkout_company_name']),
                'email' => strip_tags($data['checkout_email']),
                'phone' => strip_tags($data['checkout_number_phone']),
                'province' => strip_tags($data['checkout_province']),
                'district' => strip_tags($data['checkout_district']),
                'address' => strip_tags($data['checkout_address']),
                'note' => strip_tags($data['checkout_note']),
                'total' => Cart::total(),
                'subtotal' => Cart::subtotal(),
                'code' => generateRandomString()
            );
            $checkout = $this->checkoutRepository->create($params_checkout);
            $hashids = new Hashids('', 4, '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ');

            $code = "FURA-" . $hashids->encode($checkout->id);
            $checkout = $this->checkoutRepository->update(array('code' => $code), $checkout->id);
            if ($checkout) {
                $contents = Cart::content();
                foreach ($contents as $content) {
                    $paramscart = array(
                        'product_id' => $content->id,
                        'checkout_id' => $checkout->id,
                        'product_name' => $content->name,
                        'product_qty' => $content->qty,
                        'product_avatar' => $content->options->has('avatar') ? $content->options->avatar : '',
                        'product_price' => $content->price
                    );
                    $this->cartRepository->create($paramscart);
                }
                $configs = Config::getAllconfigs();
                _sendEmail("emails.checkout", "Thông Tin Đặt Hàng ", $checkout, ['0' => ['email' => $checkout->email, 'name' => $checkout->fullname]], $configs);
                _sendEmail("emails.checkout", "Thông Tin Đặt Hàng ", $checkout, ['0' => ['email' => $configs['email_receives_feedback'], 'name' => $checkout->fullname]], $configs);
                return redirect()->route('web.successCheckout')->with('checkout', $checkout);
            } else {
                Flash::error('Lỗi xãy ra khi gửi !');
                return redirect()->back();
            }
        }
    }

    public function postDistrict()
    {
        $json = array();
        $province_id = strip_tags($this->request->province_id);
        $districts = $this->locationRepository->findByField('parent', $province_id)->toArray();
        if (count($districts) > 0) {
            return response()->json($districts);
        }
    }

    public function successCheckout()
    {
        if (session('checkout')) {
            $checkout = session('checkout');
            Cart::destroy();
            return view('frontend.cart.success', array(
                'checkout' => $checkout,
                'meta_title' => 'Đặt Hàng Thành Công'
            ));
        } else {
            return redirect()->route('web.index');
        }
    }
}
