<?php

use App\Livewire\Admin\Datatables\ProductTable;
use App\Models\Product;
use App\Models\Productable;
use App\Models\Sale;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/','/admin');

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/prueba', function() {
    return Sale::query()
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->join('identities', 'customers.identity_id', '=', 'identities.id')
            ->selectRaw('
                customers.id as id,
                customers.name as name,
                customers.email as email,
                identities.name as identity_type,
                customers.document_number as document_number,
                COUNT(sales.id) as total_sales
            ')
            ->groupBy(
                'customers.id', 
                'customers.name', 
                'customers.email', 
                'identities.name',
                'customers.document_number'
            )
            ->get();
})->name('prueba');