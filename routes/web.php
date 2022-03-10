<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Guest)
|--------------------------------------------------------------------------
*/
    Route::get('/socialites/{provider}/redirect', [
        'as' => 'guest.socialites.redirect',
        'uses' => 'Guest\SocialitesController@redirect'
    ]);

    Route::get('/socialites/{provider}/callback', [
        'as' => 'guest.socialites.callback',
        'uses' => 'Guest\SocialitesController@callback'
    ]);

    Route::get('/', [
        'as' => 'guest.homes.index',
        'uses' => 'Guest\HomesController@index'
    ]);

    Route::get('/load-more', [
        'as' => 'guest.homes.loadMore',
        'uses' => 'Guest\HomesController@loadMore'
    ]);

    Route::get('/languages/{locale}', [
        'as' => 'guest.languages.swap',
        'uses' => 'Guest\LanguagesController@swap'
    ]);

    Route::post('/subscribes', [
        'as' => 'guest.subscribes.store',
        'uses' => 'Guest\SubscribesController@store'
    ]);

    // Authentications
    Route::get('/sign-in', [
        'as' => 'guest.authentications.index',
        'uses' => 'Guest\AuthenticationsController@index'
    ]);

    Route::get('/register', [
        'as' => 'guest.authentications.create',
        'uses'=> 'Guest\AuthenticationsController@create'
    ]);

    Route::post('/register', [
        'as' => 'guest.authentications.store',
        'uses' => 'Guest\AuthenticationsController@store'
    ]);

    Route::get('/verify/{token}/{user_id}', [
        'as' => 'guest.authentications.verify',
        'uses' => 'Guest\AuthenticationsController@verify'
    ]);

    Route::post('/sign-in', [
        'as' => 'guest.authentications.signIn',
        'uses' => 'Guest\AuthenticationsController@signIn'
    ]);

    Route::get('/sign-out', [
        'as' => 'guest.authentications.signOut',
        'uses' => 'Guest\AuthenticationsController@signOut'
    ]);

    Route::get('/forgot-password', [
        'as' => 'guest.authentications.forgotPassword',
        'uses' => 'Guest\AuthenticationsController@forgotPassword'
    ]);

    Route::post('/send-link', [
        'as' => 'guest.authentications.sendLink',
        'uses' => 'Guest\AuthenticationsController@sendLink'
    ]);

    Route::get('/password-reset/{email}/{token}', [
        'as' => 'guest.authentications.passwordReset',
        'uses' => 'Guest\AuthenticationsController@passwordReset'
    ]);

    Route::post('/set-password', [
        'as' => 'guest.authentications.setPassword',
        'uses' => 'Guest\AuthenticationsController@setPassword'
    ]);

    Route::middleware(['acc'])->group(function () {
        // Accounts
        Route::get('/accounts', [
            'as' => 'guest.accounts.index',
            'uses' => 'Guest\AccountsController@index'
        ]);

        Route::get('/accounts/profile', [
            'as' => 'guest.accounts.editProfile',
            'uses' => 'Guest\AccountsController@editProfile'
        ]);

        Route::put('/accounts/profile', [
            'as' => 'guest.accounts.updateProfile',
            'uses' => 'Guest\AccountsController@updateProfile'
        ]);

        Route::get('/accounts/address-book/create', [
            'as' => 'guest.accounts.createAddressBook',
            'uses' => 'Guest\AccountsController@createAddressBook'
        ]);

        Route::post('/accounts/address-book', [
            'as' => 'guest.accounts.storeAddressBook',
            'uses' => 'Guest\AccountsController@storeAddressBook'
        ]);

        Route::get('/accounts/address-book/{id}/edit', [
            'as' => 'guest.accounts.editAddressBook',
            'uses' => 'Guest\AccountsController@editAddressBook'
        ]);

        Route::put('/acoounts/address-book/{id}', [
            'as' => 'guest.accounts.updateAddressBook',
            'uses' => 'Guest\AccountsController@updateAddressBook'
        ]);

        Route::delete('/accounts/address-book/{id}', [
            'as' => 'guest.accounts.destroyAddressBook',
            'uses' => 'Guest\AccountsController@destroyAddressBook'
        ]);
    });

    // Categories
    Route::get('/categories/{slug}', [
        'as' => 'guest.categories.show',
        'uses' => 'Guest\CategoriesController@show'
    ]);

    Route::get('/categories/load-more/{slug}', [
        'as' => 'guest.categories.loadMore',
        'uses' => 'Guest\CategoriesController@loadMore'
    ]);

    // Products
    Route::get('/search/{search_name}', [
        'as' => 'guest.products.index',
        'uses' => 'Guest\ProductsController@index'
    ]);

    Route::get('/search/load-more/{search_name}', [
        'as' => 'guest.products.loadMore',
        'uses' => 'Guest\ProductsController@loadMore'
    ]);

    Route::get('/products/{slug}', [
        'as' => 'guest.products.show',
        'uses' => 'Guest\ProductsController@show'
    ]);

    // Carts
    Route::get('/cart', [
        'as' => 'guest.carts.index',
        'uses' => 'Guest\CartsController@index'
    ]);

    Route::post('/add-to-cart', [
        'as' => 'guest.carts.addToCart',
        'uses' => 'Guest\CartsController@addToCart'
    ]);

    Route::post('/update-to-cart', [
        'as' => 'guest.carts.updateToCart',
        'uses' => 'Guest\CartsController@updateToCart'
    ]);

    Route::post('/remove-to-cart', [
        'as' => 'guest.carts.removeToCart',
        'uses' => 'Guest\CartsController@removeToCart'
    ]);

    Route::post('/apply-coupon', [
        'as' => 'guest.carts.applyCoupon',
        'uses' => 'Guest\CartsController@applyCoupon'
    ]);

    Route::post('/summary', [
        'as' => 'guest.carts.summary',
        'uses' => 'Guest\CartsController@summary'
    ]);

    Route::get('/shipping/{id}', [
        'as' => 'guest.carts.shipping',
        'uses' => 'Guest\CartsController@shipping'
    ]);

    Route::get('/billing/{id}', [
        'as' => 'guest.carts.billing',
        'uses' => 'Guest\CartsController@billing'
    ]);

    Route::post('/address', [
        'as' => 'guest.carts.address',
        'uses' => 'Guest\CartsController@address'
    ]);

    // Orders
    Route::get('/orders', [
        'as' => 'guest.orders.index',
        'uses' => 'Guest\OrdersController@index'
    ]);

    Route::post('/orders/check', [
        'as' => 'guest.orders.check',
        'uses' => 'Guest\OrdersController@check'
    ]);

    Route::post('/orders', [
        'as' => 'guest.orders.store',
        'uses' => 'Guest\OrdersController@store'
    ]);

    Route::get('/orders/{code}/{email}', [
        'as' => 'guest.orders.show',
        'uses' => 'Guest\OrdersController@show'
    ]);

    Route::get('/orders/print/{code}/{email}/{type}', [
        'as' => 'guest.orders.print',
        'uses' => 'Guest\OrdersController@print'
    ]);

    // Blogs
    Route::get('/blogs', [
        'as' => 'guest.blogs.index',
        'uses' => 'Guest\BlogsController@index'
    ]);

    Route::get('/blogs/load-more', [
        'as' => 'guest.blogs.loadMore',
        'uses' => 'Guest\BlogsController@loadMore'
    ]);

    Route::get('/blogs/{slug}', [
        'as' => 'guest.blogs.show',
        'uses' => 'Guest\BlogsController@show'
    ]);

    // Tags
    Route::get('/tags/{slug}', [
        'as' => 'guest.tags.show',
        'uses' => 'Guest\TagsController@show'
    ]);

    Route::get('/tags/load-more/{slug}', [
        'as' => 'guest.tags.loadMore',
        'uses' => 'Guest\TagsController@loadMore'
    ]);

    // Information
    Route::get('/information/{slug}', [
        'as' => 'guest.information.show',
        'uses' => 'Guest\InformationController@show'
    ]);
/*
|--------------------------------------------------------------------------
| Web Routes (Administrator)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as' => 'admin.authentications.index',
        'uses' => 'Admin\AuthenticationsController@index'
    ]);

    Route::post('/sign-in', [
        'as' => 'admin.authentications.signIn',
        'uses' => 'Admin\AuthenticationsController@signIn'
    ]);

    Route::get('/sign-out', [
        'as' => 'admin.authentications.signOut',
        'uses' => 'Admin\AuthenticationsController@signOut'
    ]);

    Route::get('/forgot-password', [
        'as' => 'admin.authentications.forgotPassword',
        'uses' => 'Admin\AuthenticationsController@forgotPassword'
    ]);

    Route::post('/send-link', [
        'as' => 'admin.authentications.sendLink',
        'uses' => 'Admin\AuthenticationsController@sendLink'
    ]);

    Route::get('/password-reset/{email}/{token}', [
        'as' => 'admin.AuthenticationsController@passwordReset',
        'uses' => 'Admin\AuthenticationsController@passwordReset'
    ]);

    Route::post('/set-password', [
        'as' => 'admin.authentications.setPassword',
        'uses' => 'Admin\AuthenticationsController@setPassword'
    ]);

    Route::get('/verify/{token}/{user_id}', [
        'as' => 'admin.authentications.verify',
        'uses' => 'Admin\AuthenticationsController@verify'
    ]);

    Route::middleware(['acl'])->group(function () {
        /* Route Dashboard */
        Route::get('/dashboards', [
            'as' => 'admin.dashboards.index',
            'uses' => 'Admin\DashboardsController@index',
            'permission' => ['create dashboards', 'read dashboards', 'update dashboards', 'delete dashboards']
        ]);

        Route::get('/dashboards/load-data', [
            'as' => 'admin.dashboards.loadData',
            'uses' => 'Admin\DashboardsController@loadData',
            'permission' => 'read dashboards'
        ]);

        /* Route Staff */
        Route::get('/staff', [
            'as' => 'admin.staff.index',
            'uses' => 'Admin\StaffController@index',
            'permission' => ['create staff', 'read staff', 'update staff', 'delete staff']
        ]);

        Route::get('/staff/create', [
            'as' => 'admin.staff.create',
            'uses' => 'Admin\StaffController@create',
            'permission' => 'create staff'
        ]);

        Route::post('/staff', [
            'as' => 'admin.staff.store',
            'uses' => 'Admin\StaffController@store',
            'permission' => 'create staff'
        ]);

        Route::get('/staff/{id}', [
            'as' => 'admin.staff.show',
            'uses' => 'Admin\StaffController@show',
            'permission' => 'read staff'
        ]);

        Route::get('/staff/{id}/edit', [
            'as' => 'admin.staff.edit',
            'uses' => 'Admin\StaffController@edit',
            'permission' => 'update staff'
        ]);

        Route::put('/staff/{id}', [
            'as' => 'admin.staff.update',
            'uses' => 'Admin\StaffController@update',
            'permission' => 'update staff'
        ]);

        Route::delete('/staff/{id}', [
            'as' => 'admin.staff.destroy',
            'uses' => 'Admin\StaffController@destroy',
            'permission' => 'delete staff'
        ]);

        /* Route Filters */
        Route::get('/filters', [
            'as' => 'admin.filters.index',
            'uses' => 'Admin\FiltersController@index',
            'permission' => ['create filters', 'read filters', 'update filters', 'delete filters']
        ]);

        Route::get('/filters/create', [
            'as' => 'admin.filters.create',
            'uses' => 'Admin\FiltersController@create',
            'permission' => 'create filters'
        ]);

        Route::post('/filters', [
            'as' => 'admin.filters.store',
            'uses' => 'Admin\FiltersController@store',
            'permission' => 'create filters'
        ]);

        Route::get('/filters/{id}', [
            'as' => 'admin.filters.show',
            'uses' => 'Admin\FiltersController@show',
            'permission' => 'read filters'
        ]);

        Route::get('/filters/{id}/edit', [
            'as' => 'admin.filters.edit',
            'uses' => 'Admin\FiltersController@edit',
            'permission' => 'update filters'
        ]);

        Route::put('/filters/{id}', [
            'as' => 'admin.filters.update',
            'uses' => 'Admin\FiltersController@update',
            'permission' => 'update filters'
        ]);

        Route::delete('/filters/{id}', [
            'as' => 'admin.filters.destroy',
            'uses' => 'Admin\FiltersController@destroy',
            'permission' => 'delete filters'
        ]);

        /* Route Categories */
        Route::get('/categories', [
            'as' => 'admin.categories.index',
            'uses' => 'Admin\CategoriesController@index',
            'permission' => ['create categories', 'read categories', 'update categories', 'delete categories']
        ]);

        Route::get('/categories/create', [
            'as' => 'admin.categories.create',
            'uses' => 'Admin\CategoriesController@create',
            'permission' => 'create categories'
        ]);

        Route::post('/categories', [
            'as' => 'admin.categories.store',
            'uses' => 'Admin\CategoriesController@store',
            'permission' => 'create categories'
        ]);

        Route::get('/categories/{id}', [
            'as' => 'admin.categories.show',
            'uses' => 'Admin\CategoriesController@show',
            'permission' => 'read categories'
        ]);

        Route::get('/categories/{id}/edit', [
            'as' => 'admin.categories.edit',
            'uses' => 'Admin\CategoriesController@edit',
            'permission' => 'update categories'
        ]);

        Route::put('/categories/{id}', [
            'as' => 'admin.categories.update',
            'uses' => 'Admin\CategoriesController@update',
            'permission' => 'update categories'
        ]);

        Route::delete('/categories/{id}', [
            'as' => 'admin.categories.destroy',
            'uses' => 'Admin\CategoriesController@destroy',
            'permission' => 'delete categories'
        ]);

        /* Route Products */
        Route::get('/products', [
            'as' => 'admin.products.index',
            'uses' => 'Admin\ProductsController@index',
            'permission' => ['create products', 'read products', 'update products', 'delete products']
        ]);

        Route::post('/products/dropzone', [
            'as' => 'admin.products.dropzone',
            'uses' => 'Admin\ProductsController@dropzone',
            'permission' => ['create products'],
        ]);

        Route::get('/products/create', [
            'as' => 'admin.products.create',
            'uses' => 'Admin\ProductsController@create',
            'permission' => 'create products'
        ]);

        Route::post('/products', [
            'as' => 'admin.products.store',
            'uses' => 'Admin\ProductsController@store',
            'permission' => 'create products'
        ]);

        Route::get('/products/{id}', [
            'as' => 'admin.products.show',
            'uses' => 'Admin\ProductsController@show',
            'permission' => 'read products'
        ]);

        Route::get('/products/{id}/edit', [
            'as' => 'admin.products.edit',
            'uses' => 'Admin\ProductsController@edit',
            'permission' => 'update products'
        ]);

        route::put('/products/{id}', [
            'as' => 'admin.products.update',
            'uses' => 'Admin\ProductsController@update',
            'permission' => 'update products'
        ]);

        Route::delete('/products/{id}', [
            'as' => 'admin.products.destroy',
            'uses' => 'Admin\ProductsController@destroy',
            'permission' => 'delete products'
        ]);

        /* Route Customers */
        Route::get('/customers', [
            'as' => 'admin.customers.index',
            'uses' => 'Admin\CustomersController@index',
            'permission' => ['create customers', 'read customers', 'update customers', 'delete customers']
        ]);

        Route::get('/customers/create', [
            'as' => 'admin.customers.create',
            'uses' => 'Admin\CustomersController@create',
            'permission' => 'create customers'
        ]);

        Route::post('/customers', [
            'as' => 'admin.customers.store',
            'uses' => 'Admin\CustomersController@store',
            'permission' => 'create customers'
        ]);

        Route::get('/customers/{id}', [
            'as' => 'admin.customers.show',
            'uses' => 'Admin\CustomersController@show',
            'permission' => 'read customers'
        ]);

        Route::get('/customers/{id}/edit', [
            'as' => 'admin.customers.edit',
            'uses' => 'Admin\CustomersController@edit',
            'permission' => 'update customers'
        ]);

        Route::put('/customers/{id}', [
            'as' => 'admin.customers.update',
            'uses' => 'Admin\CustomersController@update',
            'permission' => 'update customers'
        ]);

        Route::delete('/customers/{id}', [
            'as' => 'admin.customers.destroy',
            'uses' => 'Admin\CustomersController@destroy',
            'permission' => 'delete customers'
        ]);

        /* Route Orders */
        Route::get('/orders', [
            'as' => 'admin.orders.index',
            'uses' => 'Admin\OrdersController@index',
            'permission' => ['create orders', 'read orders', 'update orders', 'delete orders']
        ]);

        Route::get('/orders/{id}', [
            'as' => 'admin.orders.show',
            'uses' => 'Admin\OrdersController@show',
            'permission' => 'read orders'
        ]);

        Route::get('/orders/{id}/edit', [
            'as' => 'admin.orders.edit',
            'uses' => 'Admin\OrdersController@edit',
            'permission' => 'update orders'
        ]);

        Route::put('/orders/{id}', [
            'as' => 'admin.orders.update',
            'uses' => 'Admin\OrdersController@update',
            'permission' => 'update orders'
        ]);

        Route::delete('/orders/{id}', [
            'as' => 'admin.orders.destroy',
            'uses' => 'Admin\OrdersController@destroy',
            'permission' => 'delete orders'
        ]);

        /* Route Slideshows */
        Route::get('/slideshows', [
            'as' => 'admin.slideshows.index',
            'uses' => 'Admin\SlideshowsController@index',
            'permission' => ['create slideshows', 'read slideshows', 'update slideshows', 'delete slideshows']
        ]);

        Route::get('/slideshows/create', [
            'as' => 'admin.slideshows.create',
            'uses' => 'Admin\SlideshowsController@create',
            'permission' => 'create slideshows'
        ]);

        Route::post('/slideshows', [
            'as' => 'admin.slideshows.store',
            'uses' => 'Admin\SlideshowsController@store',
            'permission' => 'create slideshows'
        ]);

        Route::get('/slideshows/{id}', [
            'as' => 'admin.slideshows.show',
            'uses' => 'Admin\SlideshowsController@show',
            'permission' => 'read slideshows'
        ]);

        Route::get('/slideshows/{id}/edit', [
            'as' => 'admin.slideshows.edit',
            'uses' => 'Admin\SlideshowsController@edit',
            'permission' => 'update slideshows'
        ]);

        Route::put('/slideshows/{id}', [
            'as' => 'admin.slideshows.update',
            'uses' => 'Admin\SlideshowsController@update',
            'permission' => 'update slideshows'
        ]);

        Route::delete('/slideshows/{id}', [
            'as' => 'admin.slideshows.destroy',
            'uses' => 'Admin\SlideshowsController@destroy',
            'permission' => 'delete slideshows'
        ]);

        /* Route Tags */
        Route::get('/tags', [
            'as' => 'admin.tags.index',
            'uses' => 'Admin\TagsController@index',
            'permission' => ['create tags', 'read tags', 'update tags', 'delete tags']
        ]);

        Route::get('/tags/create', [
            'as' => 'admin.tags.create',
            'uses' => 'Admin\TagsController@create',
            'permission' => 'create tags'
        ]);

        Route::post('/tags', [
            'as' => 'admin.tags.store',
            'uses' => 'Admin\TagsController@store',
            'permission' => 'create tags'
        ]);

        Route::get('/tags/{id}', [
            'as' => 'admin.tags.show',
            'uses' => 'Admin\TagsController@show',
            'permission' => 'read tags'
        ]);

        Route::get('/tags/{id}/edit', [
            'as' => 'admin.tags.edit',
            'uses' => 'Admin\TagsController@edit',
            'permission' => 'update tags'
        ]);

        Route::put('/tags/{id}', [
            'as' => 'admin.tags.update',
            'uses' => 'Admin\TagsController@update',
            'permission' => 'update tags'
        ]);

        Route::delete('/tags/{id}', [
            'as' => 'admin.tags.destroy',
            'uses' => 'Admin\TagsController@destroy',
            'permission' => 'delete tags'
        ]);

        /* Route Blogs */
        Route::get('/blogs', [
            'as' => 'admin.blogs.index',
            'uses' => 'Admin\BlogsController@index',
            'permission' => ['create blogs', 'read blogs', 'update blogs', 'delete blogs']
        ]);

        Route::get('/blogs/create', [
            'as' => 'admin.blogs.create',
            'uses' => 'Admin\BlogsController@create',
            'permission' => 'create blogs'
        ]);

        Route::post('/blogs', [
            'as' => 'admin.blogs.store',
            'uses' => 'Admin\BlogsController@store',
            'permission' => 'create blogs'
        ]);

        Route::get('/blogs/{id}', [
            'as' => 'admin.blogs.show',
            'uses' => 'Admin\BlogsController@show',
            'permission' => 'read blogs'
        ]);

        Route::get('/blogs/{id}/edit', [
            'as' => 'admin.blogs.edit',
            'uses' => 'Admin\BlogsController@edit',
            'permission' => 'update blogs'
        ]);

        Route::put('/blogs/{id}', [
            'as' => 'admin.blogs.update',
            'uses' => 'Admin\BlogsController@update',
            'permission' => 'update blogs'
        ]);

        Route::delete('/blogs/{id}', [
            'as' => 'admin.blogs.destroy',
            'uses' => 'Admin\BlogsController@destroy',
            'permission' => 'delete blogs'
        ]);

        /* Route Contact Us */
        Route::get('/contact-us', [
            'as' => 'admin.contactUs.index',
            'uses' => 'Admin\ContactUsController@index',
            'permission' => ['create contact us', 'read contact us', 'update contact us', 'delete contact us']
        ]);

        Route::get('/contact-us/{id}', [
            'as' => 'admin.contactUs.show',
            'uses' => 'Admin\ContactUsController@show',
            'permission' => 'read contact us'
        ]);

        Route::get('/contact-us/{id}/edit', [
            'as' => 'admin.contactUs.edit',
            'uses' => 'Admin\ContactUsController@edit',
            'permission' => 'update contact us'
        ]);

        Route::put('/contact-us/{id}', [
            'as' => 'admin.contactUs.update',
            'uses' => 'Admin\ContactUsController@update',
            'permission' => 'update contact us'
        ]);

        /* Route Information */
        Route::get('/information', [
            'as' => 'admin.information.index',
            'uses' => 'Admin\InformationController@index',
            'permission' => ['create information', 'read information', 'update information', 'delete information']
        ]);

        Route::get('/information/create', [
            'as' => 'admin.information.create',
            'uses' => 'Admin\InformationController@create',
            'permission' => 'create information'
        ]);

        Route::post('/information', [
            'as' => 'admin.information.store',
            'uses' => 'Admin\InformationController@store',
            'permission' => 'create information'
        ]);

        Route::get('/information/{id}', [
            'as' => 'admin.information.show',
            'uses' => 'Admin\InformationController@show',
            'permission' => 'read information'
        ]);

        Route::get('/information/{id}/edit', [
            'as' => 'admin.information.edit',
            'uses' => 'Admin\InformationController@edit',
            'permission' => 'update information'
        ]);

        Route::put('/information/{id}', [
            'as' => 'admin.information.update',
            'uses' => 'Admin\InformationController@update',
            'permission' => 'update information'
        ]);

        Route::delete('/information/{id}', [
            'as' => 'admin.information.destroy',
            'uses' => 'Admin\InformationController@destroy',
            'permission' => 'delete information'
        ]);

        /* Route Coupons */
        Route::get('/coupons', [
            'as' => 'admin.coupons.index',
            'uses' => 'Admin\CouponsController@index',
            'permission' => ['create coupons', 'read coupons', 'update coupons', 'delete coupons']
        ]);

        Route::get('/coupons/create', [
            'as' => 'admin.coupons.create',
            'uses' => 'Admin\CouponsController@create',
            'permission' => 'create coupons'
        ]);

        Route::post('/coupons', [
            'as' => 'admin.coupons.store',
            'uses' => 'Admin\CouponsController@store',
            'permission' => 'create coupons'
        ]);

        Route::get('/coupons/{id}', [
            'as' => 'admin.coupons.show',
            'uses' => 'Admin\CouponsController@show',
            'permission' => 'read coupons'
        ]);

        Route::get('/coupons/{id}/edit', [
            'as' => 'admin.coupons.edit',
            'uses' => 'Admin\CouponsController@edit',
            'permission' => 'update coupons'
        ]);

        Route::put('/coupons/{id}', [
            'as' => 'admin.coupons.update',
            'uses' => 'Admin\CouponsController@update',
            'permission' => 'update coupons'
        ]);

        Route::delete('/coupons/{id}', [
            'as' => 'admin.coupons.destroy',
            'uses' => 'Admin\CouponsController@destroy',
            'permission' => 'delete coupons'
        ]);

        /* Route Emails */
        Route::get('/emails', [
            'as' => 'admin.emails.index',
            'uses' => 'Admin\EmailsController@index',
            'permission' => ['create emails', 'read emails', 'update emails', 'delete emails']
        ]);

        Route::get('/emails/create', [
            'as' => 'admin.emails.create',
            'uses' => 'Admin\EmailsController@create',
            'permission' => 'create emails'
        ]);

        Route::post('/emails', [
            'as' => 'admin.emails.store',
            'uses' => 'Admin\EmailsController@store',
            'permission' => 'create emails'
        ]);

        Route::get('/emails/{id}', [
            'as' => 'admin.emails.show',
            'uses' => 'Admin\EmailsController@show',
            'permission' => 'read emails'
        ]);

        Route::delete('/emails/{id}', [
            'as' => 'admin.emails.destroy',
            'uses' => 'Admin\EmailsController@destroy',
            'permission' => 'delete emails'
        ]);
    });
});
