<?php

use App\Http\Controllers\Backend\AudioController;
use App\Http\Controllers\Backend\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeachingController as FeTeachingController;
use App\Http\Controllers\BuddhistSiteController as FeBuddhistSiteController;
use App\Http\Controllers\BlogController as FeBlogController;
use App\Http\Controllers\BookController as FeBookController;
use App\Http\Controllers\VideoController as FeVideoController;
use App\Http\Controllers\AudioController as FeAudioController;
use App\Http\Controllers\TaskController as FeTaskController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\TaskController;
use App\Http\Controllers\Backend\BuddhistSiteController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ProjectCategoryController;
use App\Http\Controllers\Backend\TeamMemberController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\TeachingController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\UserController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;


Route::get('/storage-debug', function () {
    $fullPath = storage_path('app/public/img/home_slide_9D2DqOX94WQLwG0tglI385eax6NqUX.jpg');

    return response()->json([
        'full_path' => $fullPath,
        'exists' => file_exists($fullPath),
        'storage_path_base' => storage_path(),
        'base_path' => base_path(),
    ]);
});

Route::get('/storage/{path}', function (string $path) {
    $fullPath = storage_path('app/public/' . $path);

    abort_unless(file_exists($fullPath) && !is_dir($fullPath), 404);

    return response()->file($fullPath, [
        'Cache-Control' => 'public, max-age=31536000, immutable',
    ]);
})->where('path', '.*')->name('storage.serve');

Route::get('/', [HomeController::class, 'getHomePage'])->name('home');
Route::get('search', [HomeController::class, 'getSearch'])->name('search');
Route::get('about-us', [HomeController::class, 'getAboutUsPage'])->name('about-us');
Route::resource('buddhist-sites', FeBuddhistSiteController::class);
Route::resource('teachings', FeTeachingController::class);
Route::resource('blogs', FeBlogController::class);

Route::get('library', function () {
    return view('frontend.library.index');
})->name('library.index');

Route::get('library/books', [FeBookController::class, 'index'])->name('library.books');

Route::get('library/articles', function () {
    return view('frontend.library.articles');
})->name('library.articles');

Route::get('library/kids-gallery', function () {
    return view('frontend.library.kids-gallery');
})->name('library.kids-gallery');

Route::get('library/image-gallery', [\App\Http\Controllers\GalleryImageController::class, 'index'])->name('library.image-gallery');

Route::group(['prefix' => 'library', 'as' => 'library.'], function(){
    Route::get('videos', [FeVideoController::class, 'index'])->name('videos');
    Route::get('audios', [FeAudioController::class, 'index'])->name('audios');

});

//Route::get('blogs', function () {
//    return view('frontend.blogs.index');
//})->name('blogs');
//
//Route::get('blogs/details', function () {
//    return view('frontend.blogs.show');
//})->name('blogs.show');

Route::get('kids-corner/details', function () {
    return view('frontend.kids-corner.index');
})->name('kids-corner');

Route::get('kids-corner', function () {
    return view('frontend.kids-corner.show');
})->name('kids-corner.show');

Route::get('donate', [DonationController::class, 'index'])->name('donate');

Route::get('contact-us', function () {
    return view('frontend.contact-us');
})->name('contact-us');

Route::get('play/{uri}', function ($uri) {
    return view('frontend.play.play-video', compact('uri'));
})->name('play-video');

Route::any('tasks/{task}/{id?}', FeTaskController::class)->name('tasks');

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function(){
    Route::get('login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('check');
    Route::get('logout', [AuthController::class, 'getLogout'])->name('logout');
});

Route::group(['prefix' => 'manage', 'as' => 'backend.', 'middleware' => 'auth.admin'], function () {
    Route::get('/', function () {
        return redirect()->route('backend.tasks', ['task' => 'manage-home']);
    })->name('home');

    Route::resource('buddhist-sites', BuddhistSiteController::class);
    Route::resource('teachings', TeachingController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('audios', AudioController::class);


    // Route::post('books/destroy2/{id}', [BookController::class, 'destroy'])->name('books.destroy2');
    Route::resource('books', BookController::class);
    Route::resource('gallery-images', \App\Http\Controllers\Backend\GalleryImageController::class);
    Route::resource('users', UserController::class);
    Route::resource('teachings-slides', \App\Http\Controllers\Backend\TeachingsSlideController::class);

    Route::get('error-logs', [LogViewerController::class, 'index']);

    Route::any('tasks/{task}/{id?}', TaskController::class)->name('tasks');
    Route::post('projects/sort', [ProjectController::class, 'sort'])->name('projects.sort');
    Route::resource('projects', ProjectController::class);
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('contact-messages', ContactMessageController::class, ['only' => ['index', 'show']]);
});
