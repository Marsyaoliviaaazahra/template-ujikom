<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "apc", "array", "database", "file",
    |         "memcached", "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
            'lock_connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'cache',
            'lock_connection' => 'default',
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------



    |





    | When utilizing the APC, database, memcached, Redis, or DynamoDB cache
    | stores there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.









    |Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware("isLogin")->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');



Route::middleware("isStaff")->group(function () {
    Route::get("/sale/create", [SaleController::class, "create"])->name("sale.create");
    Route::post("/sale/store", [SaleController::class, "store"])->name("sale.store");
});

Route::middleware("isAdmin")->group(function () {
    // User
 Route::get("/user", [UserController::class, "index"])->name("user");
 Route::get("/user/create", [UserController::class, "create"])->name("user.create");
 Route::post("/user/store", [UserController::class, "store"])->name("user.store");
 Route::get("/user/edit/{id}", [UserController::class, "edit"])->name("user.edit");
 Route::patch("/user/update/{id}", [UserController::class, "update"])->name("user.update");
 Route::delete("/user/destroy/{id}", [UserController::class, "destroy"])->name("user.destroy");
});


 //product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::patch("/product/updateStock/{id}", [ProductController::class, "updateStock"])->name("product.updateStock");

// Sale
Route::get("/sale", [SaleController::class, "index"])->name("sale");
Route::get("/sale/export", [SaleController::class, "export"])->name("export");
Route::get("/sale/pdf", [SaleController::class, "pdf"])->name("pdf");
Route::get("/sale/download/{id}", [SaleController::class, "download"])->name("sale.download");
Route::get("/sale/invoice", [SaleController::class, "invoiceView"])->name("sale.invoiceView");
Route::post("/sale/invoiceStore", [SaleController::class, "invoice"])->name("sale.invoice");
Route::get("/sale/edit/{id}", [SaleController::class, "edit"])->name("sale.edit");
Route::patch("/sale/update/{id}", [SaleController::class, "update"])->name("sale.update");
Route::delete("/sale/destroy/{id}", [SaleController::class, "destroy"])->name("sale.destroy");
});




|sidebar
 <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            @if (Auth::user()->role == 'admin')
                <li class="{{ Request::is('dashboard/user*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('user') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
            @endif
            <li class="{{ Request::is('dashboard/product*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('product') }}"><i class="fas fa-box"></i> <span>Product</span></a></li>
            <li class="{{ Request::is('dashboard/sale*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('sale') }}"><i class="fas fa-shopping-cart"></i> <span>Sale</span></a></li>
            </li>
        </ul>







    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];
