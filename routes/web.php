<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
$domain = \Config::get ( 'config.domain' );
$subdomain = \Config::get ( 'config.subdomain' );

Route::group(['domain' => $subdomain, 'namespace' => 'Backend',], function ($router) {
    $router->get('/', function () {
        return redirect()->to('/login');
    });
	
    $router->get ( '/login', [ 'namespace' => 'Backend', 'as' => 'admin.login', 'uses' => 'DashboardController@backendLogin' ] );
    $router->post ( '/login', [ 'namespace' => 'Backend', 'as' => 'admin.postLogin', 'uses' => 'DashboardController@postLogin' ] );
	$router->get ( '/logout', [ 'namespace' => 'Backend', 'as' => 'admin.logout', 'uses' => 'DashboardController@logout' ] );
    
	$router->group ( [ 'prefix' => '/dashboard','middleware' => ['admin']], function ( $r ){
        $r->get ( '/', [ 'namespace' => 'Backend', 'as' => 'admin.dashboards.dashboard', 'uses' => 'DashboardController@dashboard' ] );
    } );
    
	$router->group ( [ 'prefix' => '/users','middleware' => ['admin']], function ( $r ){
        $r->get ( 'user', [ 'namespace' => 'Backend', 'as' => 'admin.users.user', 'uses' => 'UsersController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.users.create', 'uses' => 'UsersController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.users.store', 'uses' => 'UsersController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.users.destroy', 'uses' => 'UsersController@destroy' ] );
        $r->get ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.users.edit', 'uses' => 'UsersController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.users.update', 'uses' => 'UsersController@update' ] );
    } );
	
	$router->group ( [ 'prefix' => '/sliders','middleware' => ['admin']], function ( $r ){
        $r->get ( 'slider', [ 'namespace' => 'Backend', 'as' => 'admin.sliders.index', 'uses' => 'SlidersController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.sliders.create', 'uses' => 'SlidersController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.sliders.store', 'uses' => 'SlidersController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.sliders.destroy', 'uses' => 'SlidersController@destroy' ] );
        $r->get ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.sliders.edit', 'uses' => 'SlidersController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.sliders.update', 'uses' => 'SlidersController@update' ] );
    } );
	
	$router->group ( [ 'prefix' => '/blogs','middleware' => ['admin']], function ( $r ){
        $r->get ( 'blog', [ 'namespace' => 'Backend', 'as' => 'admin.blogs.index', 'uses' => 'BlogsController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.blogs.create', 'uses' => 'BlogsController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.blogs.store', 'uses' => 'BlogsController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.blogs.destroy', 'uses' => 'BlogsController@destroy' ] );
        $r->get ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.blogs.edit', 'uses' => 'BlogsController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.blogs.update', 'uses' => 'BlogsController@update' ] );
    } );

    $router->group ( [ 'prefix' => '/brandlogos','middleware' => ['admin']], function ( $r ){
        $r->get ( 'brandlogo', [ 'namespace' => 'Backend', 'as' => 'admin.brandLogos.index', 'uses' => 'BrandLogosController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.brandLogos.create', 'uses' => 'BrandLogosController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.brandLogos.store', 'uses' => 'BrandLogosController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.brandLogos.destroy', 'uses' => 'BrandLogosController@destroy' ] );
        $r->get ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.brandLogos.edit', 'uses' => 'BrandLogosController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.brandLogos.update', 'uses' => 'BrandLogosController@update' ] );
    } );

    $router->group ( [ 'prefix' => '/categories','middleware' => ['admin']], function ( $r ){
        $r->get ( 'categorie', [ 'namespace' => 'Backend', 'as' => 'admin.categories.index', 'uses' => 'CategoriesController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.categories.create', 'uses' => 'CategoriesController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.categories.store', 'uses' => 'CategoriesController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.categories.destroy', 'uses' => 'CategoriesController@destroy' ] );
        $r->get ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.categories.edit', 'uses' => 'CategoriesController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.categories.update', 'uses' => 'CategoriesController@update' ] );
    } );

    $router->group ( [ 'prefix' => '/products','middleware' => ['admin']], function ( $r ){
        $r->get ( 'product', [ 'namespace' => 'Backend', 'as' => 'admin.products.index', 'uses' => 'ProductsController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.products.create', 'uses' => 'ProductsController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.products.store', 'uses' => 'ProductsController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.products.destroy', 'uses' => 'ProductsController@destroy' ] );
        $r->get ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.products.edit', 'uses' => 'ProductsController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.products.update', 'uses' => 'ProductsController@update' ] );
    } );

    $router->group ( [ 'prefix' => '/contacts','middleware' => ['admin']], function ( $r ){
        $r->get ( 'contact', [ 'namespace' => 'Backend', 'as' => 'admin.contacts.index', 'uses' => 'ContactsController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.contacts.create', 'uses' => 'ContactsController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.contacts.store', 'uses' => 'ContactsController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.contacts.destroy', 'uses' => 'ContactsController@destroy' ] );
        $r->get ( '{id}/view', [ 'namespace' => 'Backend', 'as' => 'admin.contacts.edit', 'uses' => 'ContactsController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.contacts.update', 'uses' => 'ContactsController@update' ] );
    } );

    $router->group ( [ 'prefix' => '/checkouts','middleware' => ['admin']], function ( $r ){
        $r->get ( 'checkout', [ 'namespace' => 'Backend', 'as' => 'admin.checkouts.index', 'uses' => 'CheckoutsController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.checkouts.create', 'uses' => 'CheckoutsController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.checkouts.store', 'uses' => 'CheckoutsController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.checkouts.destroy', 'uses' => 'CheckoutsController@destroy' ] );
        $r->get ( '{id}/view', [ 'namespace' => 'Backend', 'as' => 'admin.checkouts.edit', 'uses' => 'CheckoutsController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.checkouts.update', 'uses' => 'CheckoutsController@update' ] );
    } );

    $router->group ( [ 'prefix' => '/locations','middleware' => ['admin']], function ( $r ){
        $r->get ( 'location', [ 'namespace' => 'Backend', 'as' => 'admin.locations.index', 'uses' => 'LocationsController@index' ] );
        $r->get ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.locations.create', 'uses' => 'LocationsController@create' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.locations.store', 'uses' => 'LocationsController@store' ] );
        $r->get ( 'delete/{id}', [ 'namespace' => 'Backend', 'as' => 'admin.locations.destroy', 'uses' => 'LocationsController@destroy' ] );
        $r->get ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.locations.edit', 'uses' => 'LocationsController@edit' ] );
        $r->PUT ( '{id}/edit', [ 'namespace' => 'Backend', 'as' => 'admin.locations.update', 'uses' => 'LocationsController@update' ] );
    } );
    
    $router->group ( [ 'prefix' => '/configs','middleware' => ['admin']], function ( $r ){
        $r->get ( 'config', [ 'namespace' => 'Backend', 'as' => 'admin.configs.index', 'uses' => 'ConfigsController@index' ] );
        $r->post ( 'create', [ 'namespace' => 'Backend', 'as' => 'admin.configs.store', 'uses' => 'ConfigsController@store' ] );
    } );
	
});

Route::group(['domain' => $domain, 'namespace' => 'Frontend',], function ($router) {
    $router->get('/',['as' => 'web.index', 'uses' => 'HomeController@index' ]);
    $router->get('/danh-muc/{slug}',['as' => 'web.category', 'uses' => 'HomeController@category' ]);
    $router->get('/lien-he',['as' => 'web.contact', 'uses' => 'HomeController@contact' ]);
    $router->post('/lien-he',['as' => 'web.postcontact', 'uses' => 'HomeController@postContact' ]);
    $router->get('/tim-kiem',['as' => 'web.timKiem', 'uses' => 'HomeController@timKiem' ]);
    $router->get('/gio-hang',['as' => 'web.cart', 'uses' => 'CartController@gioHang' ]);
    $router->get('/thanh-toan',['as' => 'web.checkout', 'uses' => 'CartController@thanhToan' ]);
    $router->post('/thanh-toan',['as' => 'web.postCheckout', 'uses' => 'CartController@postCheckout' ]);
    $router->get('/thanh-toan/thanh-cong',['as' => 'web.successCheckout', 'uses' => 'CartController@successCheckout' ]);
    $router->post('/district',['as' => 'web.postDistrict', 'uses' => 'CartController@postDistrict' ]);
    $router->post('/add-to-cart',['as' => 'web.addToCart', 'uses' => 'CartController@addToCart' ]);
    $router->post('/remove-item-cart',['as' => 'web.removeItemCart', 'uses' => 'CartController@removeItemCart' ]);
    $router->post('/update-item-cart',['as' => 'web.updateCart', 'uses' => 'CartController@updateCart' ]);
    $router->get('/{slug}',['as' => 'web.productDetail', 'uses' => 'HomeController@productDetail' ]);
});

