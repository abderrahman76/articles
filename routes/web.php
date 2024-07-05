<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;



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
Route::get('/create', function () {
    return view('areticles.create');
});
Route::get('/', function () {
    return redirect(route('index'));
});
Route::get('/home',function(){
    return view('home');
});
Route::get('/myarticles', [ArticlesController::class, 'sorte'])->name('sorte');

Route::get('/articles', [ArticlesController::class, 'index'])->name('index');
Route::get('/article/{id}',[ArticlesController::class, 'show']);

Route::get('/articleAdd', function () {
    $categories = \App\Models\categorie::all();
    return view('areticles.create')->with(['categories'=>$categories]);
})->name('article.create');
Route::post('/articlecreate',[ArticlesController::class, 'create'])->name('article.add');

Route::get('/articleEdite/{id}', function ($id) {
    $categories = \App\Models\categorie::all();
    $article = \App\Models\Article::findorfail($id);
    return view('areticles.edite')->with(['categories'=>$categories,
                                            'article'=>$article ]);
})->name('article.edit');
Route::post('/articleUpdate',[ArticlesController::class, 'edit'])->name('article.update');
Route::delete('/articleDelete',[ArticlesController::class, 'destroy'])->name('article.delete');


           


Route::get('/mycategories', [CategoriesController::class, 'sorte'])->name('mycategories');
Route::get('/categories', [CategoriesController::class, 'index'])->name('indexC');
Route::get('/categorie/{id}',[CategoriesController::class, 'show'])->name('showcategorie');



Route::get('/categotieAdd', function () {
    return view('categories.create');
});
Route::post('/categoriecreate',[CategoriesController::class, 'create'])->name('categorie.add');

Route::get('/categorieEdite/{id}', function ($id) {
    $categorie = \App\Models\categorie::findorfail($id);
    return view('categories.edite')->with(['categorie'=>$categorie]);
});
Route::post('/categorieUpdate',[CategoriesController::class, 'edit'])->name('categorie.update');
Route::delete('/categorieDelete',[CategoriesController::class, 'destroy'])->name('categorie.delete');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/articles');
    })->name('dashboard');
});
