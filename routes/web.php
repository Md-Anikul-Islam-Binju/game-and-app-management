<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CounterController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\NoticeBoardController;
use App\Http\Controllers\admin\OttController;
use App\Http\Controllers\admin\ProjectCategoryController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ProjectFileCategoryController;
use App\Http\Controllers\admin\ProjectFileController;
use App\Http\Controllers\admin\ShowcaseController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TrainingController;
use App\Http\Controllers\admin\UserMessageController;
use App\Http\Controllers\admin\VenueController;
use App\Http\Controllers\frontend\AboutPageController;
use App\Http\Controllers\frontend\ContactUsController;
use App\Http\Controllers\frontend\HomePageController;
use App\Http\Controllers\frontend\NewsPageController;
use App\Http\Controllers\frontend\NoticeController;
use App\Http\Controllers\frontend\ProjectPageController;
use App\Http\Controllers\frontend\TeamMemberController;
use App\Http\Controllers\frontend\TrainingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomePageController::class, 'index']);
Route::get('locale/{locale}', [HomePageController::class,'changeLocale'])->name('change.language');
Route::get('/projects/{id?}', [ProjectPageController::class, 'index'])->name('project.pages');
Route::get('/project-details/{id}', [ProjectPageController::class, 'projectDetails'])->name('project.details');
Route::get('/about', [AboutPageController::class, 'index'])->name('about.pages');
Route::get('/news', [NewsPageController::class, 'index'])->name('news.pages');
Route::get('/news-details/{id}', [NewsPageController::class, 'newsDetails'])->name('news.details');
Route::get('/notice', [NoticeController::class, 'index'])->name('notice.pages');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.pages');
Route::post('/send-message', [ContactUsController::class, 'storeMessage'])->name('send.message');
Route::get('/training', [TrainingPageController::class, 'index'])->name('training.pages');
Route::get('/team', [TeamMemberController::class, 'index'])->name('team.pages');


Route::middleware('auth')->group(callback: function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');
    //News Section
    Route::get('/news-section', [NewsController::class, 'index'])->name('news.section');
    Route::post('/news-store', [NewsController::class, 'store'])->name('news.store');
    Route::put('/news-update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::get('/news-delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    //Ott Section
    Route::get('/ott-section', [OttController::class, 'index'])->name('ott.section');
    Route::post('/ott-store', [OttController::class, 'store'])->name('ott.store');
    Route::put('/ott-update/{id}', [OttController::class, 'update'])->name('ott.update');
    Route::get('/ott-delete/{id}', [OttController::class, 'destroy'])->name('ott.destroy');

    //Training Section
    Route::get('/training-section', [TrainingController::class, 'index'])->name('training.section');
    Route::post('/training-store', [TrainingController::class, 'store'])->name('training.store');
    Route::put('/training-update/{id}', [TrainingController::class, 'update'])->name('training.update');
    Route::get('/training-delete/{id}', [TrainingController::class, 'destroy'])->name('training.destroy');

    //Team Section
    Route::get('/team-section', [TeamController::class, 'index'])->name('team.section');
    Route::post('/team-store', [TeamController::class, 'store'])->name('team.store');
    Route::put('/team-update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::get('/team-delete/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

    //About Section
    Route::get('/about-section', [AboutController::class, 'index'])->name('about.section');
    Route::post('/about-store', [AboutController::class, 'store'])->name('about.store');
    Route::put('/about-update/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::get('/about-delete/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    //Notice Board Section
    Route::get('/notice-section', [NoticeBoardController::class, 'index'])->name('notice.section');
    Route::post('/notice-store', [NoticeBoardController::class, 'store'])->name('notice.store');
    Route::put('/notice-update/{id}', [NoticeBoardController::class, 'update'])->name('notice.update');
    Route::get('/notice-delete/{id}', [NoticeBoardController::class, 'destroy'])->name('notice.destroy');

    //Slider Section
    Route::get('/slider-section', [SliderController::class, 'index'])->name('slider.section');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::put('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

    //Counter Section
    Route::get('/counter-section', [CounterController::class, 'index'])->name('counter.section');
    Route::post('/counter-store', [CounterController::class, 'store'])->name('counter.store');
    Route::put('/counter-update/{id}', [CounterController::class, 'update'])->name('counter.update');
    Route::get('/counter-delete/{id}', [CounterController::class, 'destroy'])->name('counter.destroy');

    //Showcase Section
    Route::get('/showcase-section', [ShowcaseController::class, 'index'])->name('showcase.section');
    Route::post('/showcase-store', [ShowcaseController::class, 'store'])->name('showcase.store');
    Route::put('/showcase-update/{id}', [ShowcaseController::class, 'update'])->name('showcase.update');
    Route::get('/showcase-delete/{id}', [ShowcaseController::class, 'destroy'])->name('showcase.destroy');

    //Resource Section -> Project Category
    Route::get('/project-category-section', [ProjectCategoryController::class, 'index'])->name('project.category.section');
    Route::post('/project-category-store', [ProjectCategoryController::class, 'store'])->name('project.category.store');
    Route::put('/project-category-update/{id}', [ProjectCategoryController::class, 'update'])->name('project.category.update');
    Route::get('/project-category-delete/{id}', [ProjectCategoryController::class, 'destroy'])->name('project.category.destroy');

    //Resource Section -> Project
    Route::get('/project-section', [ProjectController::class, 'index'])->name('project.section');
    Route::post('/project-store', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/project-update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/project-delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    //Venue Section
    Route::get('/venue-section', [VenueController::class, 'index'])->name('venue.section');
    Route::post('/venue-store', [VenueController::class, 'store'])->name('venue.store');
    Route::put('/venue-update/{id}', [VenueController::class, 'update'])->name('venue.update');
    Route::get('/venue-delete/{id}', [VenueController::class, 'destroy'])->name('venue.destroy');


    //File Management Section -> Project File Category
    Route::get('/project-file-category-section', [ProjectFileCategoryController::class, 'index'])->name('project.file.category.section');
    Route::post('/project-file-category-store', [ProjectFileCategoryController::class, 'store'])->name('project.file.category.store');
    Route::put('/project-file-category-update/{id}', [ProjectFileCategoryController::class, 'update'])->name('project.file.category.update');
    Route::get('/project-file-category-delete/{id}', [ProjectFileCategoryController::class, 'destroy'])->name('project.file.category.destroy');

    //File Management Section -> Project File
    Route::get('/project-file-section', [ProjectFileController::class, 'index'])->name('project.file.section');
    Route::post('/project-file-store', [ProjectFileController::class, 'store'])->name('project.file.store');
    Route::put('/project-file-update/{id}', [ProjectFileController::class, 'update'])->name('project.file.update');
    Route::get('/project-file-delete/{id}', [ProjectFileController::class, 'destroy'])->name('project.file.destroy');


    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Site Setting
    Route::get('/site-setting', [SiteSettingController::class, 'index'])->name('site.setting');
    Route::post('/site-settings-store-update/{id?}', [SiteSettingController::class, 'createOrUpdate'])->name('site-settings.createOrUpdate');

    //Message
    Route::get('/message', [UserMessageController::class, 'index'])->name('message.section');
    Route::get('/message-delete/{id}', [UserMessageController::class, 'destroy'])->name('message.destroy');

    //Menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.section');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
});

require __DIR__.'/auth.php';
