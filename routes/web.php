<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about', function () {return view('front.about');});// about page
// Route::get('/login', function () {return "hello";})->name('/login');// about page
Route::get('/ragister', function () {return view('auth.logins');});// about page
// Route::get('/guestmessage', function () {return view('back.guestmessage');});// about page
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// frontsite
// Route::get('/index',[App\Http\Controllers\HomeController::class,'indexpage_show'])->name('indexpage_show');
Route::get('/single',[App\Http\Controllers\HomeController::class,'singlepage_show'])->name('singlepage_show');
Route::get('/index',[App\Http\Controllers\front\NewsController::class,'index'])->name('index');
Route::get('/contact',[App\Http\Controllers\front\NewsController::class,'contact'])->name('/contact');
Route::post('/send_contact',[App\Http\Controllers\front\NewsController::class,'send_contact'])->name('/send_contact');
Route::get('/slide_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'slide_singlepage'])->name('/slide_singlepage');
Route::get('/visa_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'visa_singlepage'])->name('/visa_singlepage');
Route::get('/study_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'study_singlepage'])->name('/study_singlepage');
Route::get('/fashion_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'fashion_singlepage'])->name('/fashion_singlepage');
Route::get('/travel_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'travel_singlepage'])->name('/travel_singlepage');
Route::get('/breakingnews_single/{id}',[App\Http\Controllers\front\NewsController::class,'breakingnews_single'])->name('/breakingnews_single');
Route::get('/politics_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'politics_singlepage'])->name('/politics_singlepage');
Route::get('/technology_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'technology_singlepage'])->name('/technology_singlepage');
// ============================================== single page for side popular post =============================//
Route::get('/visa_popularsingle/{id}',[App\Http\Controllers\front\NewsController::class,'visa_popularsingle'])->name('/visa_popularsingle');
Route::get('/study_popularsingle/{id}',[App\Http\Controllers\front\NewsController::class,'study_popularsingle'])->name('/study_popularsingle');
Route::get('/fashion_popularsingle/{id}',[App\Http\Controllers\front\NewsController::class,'fashion_popularsingle'])->name('/fashion_popularsingle');
Route::get('/technology_popularsingle/{id}',[App\Http\Controllers\front\NewsController::class,'technology_popularsingle'])->name('/technology_popularsingle');
Route::get('/politics_popularsingle/{id}',[App\Http\Controllers\front\NewsController::class,'politics_popularsingle'])->name('/politics_popularsingle');
Route::get('/festival_popularsingle/{id}',[App\Http\Controllers\front\NewsController::class,'festival_popularsingle'])->name('/festival_popularsingle');
// ============================================== single page for side latest post =============================//
Route::get('/visa_latestsingle/{id}',[App\Http\Controllers\front\NewsController::class,'visa_latestsingle'])->name('/visa_latestsingle');
Route::get('/study_latestsingle/{id}',[App\Http\Controllers\front\NewsController::class,'study_latestsingle'])->name('/study_latestsingle');
Route::get('/fashion_latestsingle/{id}',[App\Http\Controllers\front\NewsController::class,'fashion_latestsingle'])->name('/fashion_latestsingle');
// ===================>>>>=======================>>>>>  Won Page index page for side latest post <<<<<<<<=============================//
Route::get('/visa',[App\Http\Controllers\front\NewsController::class,'visa'])->name('/visa');// show the politics page
Route::get('/wonpolitics',[App\Http\Controllers\admin\PoliticsController::class,'wonpolitics'])->name('/wonpolitics');
Route::get('/wontechnology',[App\Http\Controllers\admin\TechnologyController::class,'wontechnology'])->name('/wontechnology');
Route::get('/wonfestival',[App\Http\Controllers\admin\FestivalController::class,'wonfestival'])->name('/wonfestival');
// ===================>>>>=======================>>>>>  Won Single Page index page for side latest post <<<<<<<<=============================//
Route::get('/wonpolitics_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'wonpolitics_singlepage'])->name('/wonpolitics_singlepage');
Route::get('/wontechnology_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'wontechnology_singlepage'])->name('/wontechnology_singlepage');
Route::get('/wonfestival_singlepage/{id}',[App\Http\Controllers\front\NewsController::class,'wonfestival_singlepage'])->name('/wonfestival_singlepage');



// +++++++++++++++++++++++++Some Key+++++++++++++++++++++++++++++

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin'], function () {
	Route::group(['middleware'=>'admin.guest'], function () {
		Route::view('login', 'admin.login')->name('admin.login');
		Route::post('login', [App\Http\Controllers\admin\AdminController::class,'login'])->name('admin.auth');
		Route::view('register', 'admin.register')->name('admin.register');
			Route::post('register', [App\Http\Controllers\admin\AdminController::class,'register'])->name('admin.register');
	});
	Route::group(['middleware'=>'admin.auth'], function () {
		Route::view('dashboard', 'admin.home')->name('admin.home');
		Route::post('logout', [App\Http\Controllers\admin\AdminController::class,'logout'])->name('admin.logout');



// Guest message
Route::get('/get_guestdata',[App\Http\Controllers\front\NewsController::class,'get_guestdata'])->name('/get_guestdata');
Route::get('/delete_contact/{id}',[App\Http\Controllers\front\NewsController::class,'delete_contact'])->name('/delete_contact');


// backside
Route::get('/admin',[App\Http\Controllers\HomeController::class,'admin'])->name('admin/admin');
// visa section
Route::get('/visa_news',[App\Http\Controllers\admin\visa\WorkController::class,'visa_news'])->name('/visa_news');
Route::post('/create_visa',[App\Http\Controllers\admin\visa\WorkController::class,'create_visa'])->name('create_visa');
Route::get('/listed_visa',[App\Http\Controllers\admin\visa\WorkController::class,'listed_visa'])->name('admin/listed_visa');
Route::get('/edit_visa/{id}',[App\Http\Controllers\admin\visa\WorkController::class,'edit_visa'])->name('/edit_visa');
Route::post('/update_visa/{id}',[App\Http\Controllers\admin\visa\WorkController::class,'update_visa'])->name('/update_visa');
Route::get('/delete_visa/{id}',[App\Http\Controllers\admin\visa\WorkController::class,'delete_visa'])->name('/delete_visa');

// study
Route::get('/view_study',[App\Http\Controllers\admin\visa\StudyController::class,'view_study'])->name('/view_visa');
Route::post('/create_study',[App\Http\Controllers\admin\visa\StudyController::class,'create_study'])->name('create_study');
Route::get('/listed_study',[App\Http\Controllers\admin\visa\StudyController::class,'listed_study'])->name('admin/listed_study');
Route::post('/update_study/{id}',[App\Http\Controllers\admin\visa\StudyController::class,'update_study'])->name('admin/update_study');
Route::get('/edit_study/{id}',[App\Http\Controllers\admin\visa\StudyController::class,'edit_study'])->name('/edit_study');
Route::get('/delete_study/{id}',[App\Http\Controllers\admin\visa\StudyController::class,'delete_study'])->name('/delete_study');

// Fashion
Route::get('/view_fashion',[App\Http\Controllers\admin\FashionController::class,'view_fashion'])->name('/view_fashion');
Route::post('/create_fashion',[App\Http\Controllers\admin\FashionController::class,'create_fashion'])->name('create_fashion');
Route::get('/listed_fashion',[App\Http\Controllers\admin\FashionController::class,'listed_fashion'])->name('admin/listed_fashion');
Route::post('/update_fashion/{id}',[App\Http\Controllers\admin\FashionController::class,'update_fashion'])->name('/update_fashion');
Route::get('/edit_fashion/{id}',[App\Http\Controllers\admin\FashionController::class,'edit_fashion'])->name('/edit_fashion');
Route::get('/delete_fashion/{id}',[App\Http\Controllers\admin\FashionController::class,'delete_fashion'])->name('/delete_fashion');


// slidepage section
Route::get('/slidepage_news',[App\Http\Controllers\admin\SlidePagesController::class,'slidepage_news'])->name('/slidepage_news');
Route::post('/create_slidepage',[App\Http\Controllers\admin\SlidePagesController::class,'create_slidepage'])->name('create_slidepage');
Route::get('/listed_slidepage',[App\Http\Controllers\admin\SlidePagesController::class,'listed_slidepage'])->name('admin/listed_slidepage');
Route::get('/edit_slidepage/{id}',[App\Http\Controllers\admin\SlidePagesController::class,'edit_slidepage'])->name('/edit_slidepage');
Route::post('/update_slidepage/{id}',[App\Http\Controllers\admin\SlidePagesController::class,'update_slidepage'])->name('/update_slidepage');
Route::get('/delete_slidepage/{id}',[App\Http\Controllers\admin\SlidePagesController::class,'delete_slidepage'])->name('/delete_slidepage');

// politics section
Route::get('/politics_news',[App\Http\Controllers\admin\PoliticsController::class,'politics_news'])->name('/politics_news');
Route::post('/create_politics',[App\Http\Controllers\admin\PoliticsController::class,'create_politics'])->name('create_politics');
Route::get('/listed_politics',[App\Http\Controllers\admin\PoliticsController::class,'listed_politics'])->name('admin/listed_politics');
Route::get('/edit_politics/{id}',[App\Http\Controllers\admin\PoliticsController::class,'edit_politics'])->name('/edit_politics');
Route::post('/update_politics/{id}',[App\Http\Controllers\admin\PoliticsController::class,'update_politics'])->name('/update_politics');
Route::get('/delete_politics/{id}',[App\Http\Controllers\admin\PoliticsController::class,'delete_politics'])->name('/delete_politics');

// Festival
Route::get('/view_festival',[App\Http\Controllers\admin\FestivalController::class,'view_festival'])->name('/view_festival');
Route::post('/create_festival',[App\Http\Controllers\admin\FestivalController::class,'create_festival'])->name('create_festival');
Route::get('/listed_festival',[App\Http\Controllers\admin\FestivalController::class,'listed_festival'])->name('admin/listed_festival');
Route::post('/update_festival/{id}',[App\Http\Controllers\admin\FestivalController::class,'update_festival'])->name('/update_festival');
Route::get('/edit_festival/{id}',[App\Http\Controllers\admin\FestivalController::class,'edit_festival'])->name('/edit_festival');
Route::get('/delete_festival/{id}',[App\Http\Controllers\admin\FestivalController::class,'delete_festival'])->name('/delete_festival');


// travel section
Route::get('/view_travel',[App\Http\Controllers\admin\visa\TravelController::class,'view_travel'])->name('/view_travel');
Route::post('/create_travel',[App\Http\Controllers\admin\visa\TravelController::class,'create_travel'])->name('create_travel');
Route::get('/listed_travel',[App\Http\Controllers\admin\visa\TravelController::class,'listed_travel'])->name('admin/listed_travel');
Route::get('/edit_travel/{id}',[App\Http\Controllers\admin\visa\TravelController::class,'edit_travel'])->name('/edit_travel');
Route::post('/update_travel/{id}',[App\Http\Controllers\admin\visa\TravelController::class,'update_travel'])->name('/update_travel');
Route::get('/delete_travel/{id}',[App\Http\Controllers\admin\visa\TravelController::class,'delete_travel'])->name('/delete_travel');


// breakingnews section
Route::get('/breakingnews_news',[App\Http\Controllers\admin\BreakingController::class,'breakingnews_news'])->name('/breakingnews_news');
Route::post('/create_breakingnews',[App\Http\Controllers\admin\BreakingController::class,'create_breakingnews'])->name('create_breakingnews');
Route::get('/listed_breakingnews',[App\Http\Controllers\admin\BreakingController::class,'listed_breakingnews'])->name('admin/listed_breakingnews');
Route::get('/edit_breakingnews/{id}',[App\Http\Controllers\admin\BreakingController::class,'edit_breakingnews'])->name('/edit_breakingnews');
Route::post('/update_breakingnews/{id}',[App\Http\Controllers\admin\BreakingController::class,'update_breakingnews'])->name('/update_breakingnews');
Route::get('/delete_breakingnews/{id}',[App\Http\Controllers\admin\BreakingController::class,'delete_breakingnews'])->name('/delete_breakingnews');

// technology
Route::get('/view_technology',[App\Http\Controllers\admin\TechnologyController::class,'view_technology'])->name('/view_technology');
Route::post('/create_technology',[App\Http\Controllers\admin\TechnologyController::class,'create_technology'])->name('create_technology');
Route::get('/listed_technology',[App\Http\Controllers\admin\TechnologyController::class,'listed_technology'])->name('admin/listed_technology');
Route::post('/update_technology/{id}',[App\Http\Controllers\admin\TechnologyController::class,'update_technology'])->name('/update_technology');
Route::get('/edit_technology/{id}',[App\Http\Controllers\admin\TechnologyController::class,'edit_technology'])->name('/edit_technology');
Route::get('/delete_technology/{id}',[App\Http\Controllers\admin\TechnologyController::class,'delete_technology'])->name('/delete_technology');

// removed post (restoring)
Route::get('/removed_post',[App\Http\Controllers\HomeController::class,'removed_post'])->name('/removed_post');
Route::get('/restore_visa/{id}',[App\Http\Controllers\HomeController::class,'restore_visa'])->name('/restore_visa');
Route::get('/restore_study/{id}',[App\Http\Controllers\HomeController::class,'restore_study'])->name('/restore_study');
Route::get('/erase_study/{id}',[App\Http\Controllers\HomeController::class,'erase_study'])->name('/erase_study');
Route::get('/restore_travel/{id}',[App\Http\Controllers\HomeController::class,'restore_travel'])->name('/restore_travel');
Route::get('/erase_travel/{id}',[App\Http\Controllers\HomeController::class,'erase_travel'])->name('/erase_travel');
Route::get('/erase_visa/{id}',[App\Http\Controllers\HomeController::class,'erase_visa'])->name('/erase_visa');
Route::get('/restore_fashion/{id}',[App\Http\Controllers\HomeController::class,'restore_fashion'])->name('/restore_fashion');
Route::get('/erase_fashion/{id}',[App\Http\Controllers\HomeController::class,'erase_fashion'])->name('/erase_fashion');
Route::get('/restore_festival/{id}',[App\Http\Controllers\HomeController::class,'restore_festival'])->name('/restore_festival');
Route::get('/erase_festival/{id}',[App\Http\Controllers\HomeController::class,'erase_festival'])->name('/erase_festival');
Route::get('/restore_slidepage/{id}',[App\Http\Controllers\HomeController::class,'restore_slidepage'])->name('/restore_slidepage');
Route::get('/erase_slidepage/{id}',[App\Http\Controllers\HomeController::class,'erase_slidepage'])->name('/erase_slidepage');
Route::get('/erase_politics/{id}',[App\Http\Controllers\HomeController::class,'erase_politics'])->name('/erase_politics');
Route::get('/restore_politics/{id}',[App\Http\Controllers\HomeController::class,'restore_politics'])->name('/restore_politics');
Route::get('/erase_breakingnews/{id}',[App\Http\Controllers\HomeController::class,'erase_breakingnews'])->name('/erase_breakingnews');
Route::get('/restore_breakingnews/{id}',[App\Http\Controllers\HomeController::class,'restore_breakingnews'])->name('/restore_breakingnews');
Route::get('/erase_technology/{id}',[App\Http\Controllers\HomeController::class,'erase_technology'])->name('/erase_technology');
Route::get('/restore_technology/{id}',[App\Http\Controllers\HomeController::class,'restore_technology'])->name('/restore_technology');

// ................ajax...................................//
// visa ajax
Route::get('/get_visa',[App\Http\Controllers\admin\visa\WorkController::class,'get_visa'])->name('get_visa');// visa ajax
Route::get('/get_visa_edit',[App\Http\Controllers\admin\visa\WorkController::class,'get_visa_edit'])->name('get_visa_edit');
Route::get('/get_study',[App\Http\Controllers\admin\visa\StudyController::class,'get_study'])->name('get_study');// Study
Route::get('/get_fashion',[App\Http\Controllers\admin\fashionController::class,'get_fashion'])->name('get_fashion');// Fashion
Route::get('/get_fashion_edit',[App\Http\Controllers\admin\fashionController::class,'get_fashion_edit'])->name('get_fashion_edit');
Route::get('/get_festival',[App\Http\Controllers\admin\FestivalController::class,'get_festival'])->name('get_festival');// Festival
Route::get('/get_travel',[App\Http\Controllers\admin\visa\TravelController::class,'get_travel'])->name('get_travel');// Festival
Route::get('/get_slidepage',[App\Http\Controllers\admin\SlidePagesController::class,'get_slidepage'])->name('get_slidepage');//slide aja
Route::get('/get_politics',[App\Http\Controllers\admin\PoliticsController::class,'get_politics'])->name('get_politics');//politics ajax
Route::get('/get_breakingnews',[App\Http\Controllers\admin\BreakingController::class,'get_breakingnews'])->name('get_breakingnews');//breakingnews ajax
Route::get('/get_technology',[App\Http\Controllers\admin\TechnologyController::class,'get_technology'])->name('get_technology');//technology ajax
Route::get('/get_guest_single/{id}',[App\Http\Controllers\front\NewsController::class,'get_guest_single'])->name('/get_guest_single');//technology ajax


	});
});
