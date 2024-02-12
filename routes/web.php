<?php

use App\Http\Controllers\Admin\Book\OrderController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\MandubController;
use App\Http\Controllers\Admin\SecretaryController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\FatoorahController;
use App\Http\Controllers\LandingPage\ContactUs;
use App\Http\Controllers\LandingPage\LandingSubjectsController;
use App\Http\Controllers\LandingPage\NotesController;
use App\Http\Controllers\LandingPage\StageController;
use App\Http\Controllers\LandingPage\SubjectsController;
use App\Http\Controllers\MyFatoorahController;
use App\Http\Controllers\Sitesetteings;
use App\Http\Controllers\Student\CartController;
use App\Http\Controllers\Student\SubscriptionController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\TeacherPaymentsController;
use App\Http\Controllers\Teacher\TutorialController;
use App\Models\User;
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

require __DIR__ . '/auth.php';


Route::get('/', function () {
  $teacherData=User::where('user_type','teacher')->get();
  return view('welcome',compact('teacherData'));
})->name('home');


Route::get('/grade', [GradeController::class, 'index']);


Route::fallback(function () {
  return view("errors.404");
});

Route::GET('payment/myfatoorah', [FatoorahController::class, 'checkout'])->name('myFatoorahIndex');
Route::GET('payment/callback', [FatoorahController::class, 'callback'])->name('callback');

route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {
  //student->admin
  Route::get('/student', [StudentController::class, 'index'])->name('getStudent');
  // Route::post('/student', [StudentController::class, 'store'])->name('postStudent');
  Route::post('/student/edit/{student}', [StudentController::class, 'update'])->name('updateStudent');
  Route::post('/student/updateStudent/{student}', [StudentController::class, 'updateGroup'])->name('updateGroupStudent');
  Route::post('/student/delete/Student/Not/Sub/{student}', [StudentController::class, 'deleteStudentNotSub'])->name('deleteStudentNotSub');
  //teacher->admin
  Route::get('/teacher', [TeacherController::class, 'index'])->name('getTeacher');
  Route::post('/teacher', [TeacherController::class, 'store'])->name('postTeacher');
  Route::post('/teacher/edit/{teacher}', [TeacherController::class, 'update'])->name('updateTeacher');
  //dashboard
  Route::get('/', [HomeController::class, 'index'])->name('dashboard');
  //exam->admin
  Route::get('/exam', [ExamController::class, 'index'])->name('getExam');
  Route::get('/selectTerm', [ExamController::class, 'selectTerm'])->name('selectTerm');
  Route::get('/selectType', [ExamController::class, 'selectType'])->name('selectType');
  Route::post('/exam', [ExamController::class, 'store'])->name('postExam');
  Route::post('/exam/edit', [ExamController::class, 'update'])->name('updateExam');
  Route::post('/exam/delete', [ExamController::class, 'delete'])->name('deleteExam');
  Route::get('/examdownload/{fileName}', [ExamController::class, 'download'])->name('examDownload');
  //
  Route::get('/getContact', [ContactController::class, 'index'])->name('getContact');
  Route::post('/deleteContact/{id}', [ContactController::class, 'delete'])->name('deleteContact');

  Route::get('/profileSetting', [ProfileSettingController::class, 'index'])->name('getProfile');
  Route::post('/profileSetting/{id}', [ProfileSettingController::class, 'update'])->name('updateProfile');
  //course
  Route::get('course/home', [CourseController::class, 'index'])->name('course');
  Route::get('course/add', [CourseController::class, 'create'])->name('addCourse');
  Route::post('course/create', [CourseController::class, 'store'])->name('createCourse');
  Route::get('course/termone/show', [CourseController::class, 'termone'])->name('showTermone');
  Route::get('course/termtow/show', [CourseController::class, 'termtow'])->name('showTermtow');
  Route::get('course/edit/show/{id}', [CourseController::class, 'showEdit'])->name('showEditCourse');
  Route::post('course/delete/{courseId}', [CourseController::class, 'delete'])->name('deleteCourse');
  Route::post('course/update/{id}', [CourseController::class, 'update'])->name('updateCourse');
  Route::get('course/tutorial/show/{courseId}', [CourseController::class, 'tutorial'])->name('showTutorial');
  Route::post('course/tutorial/post/{courseId}', [CourseController::class, 'createTutorial'])->name('postTutorial');
  Route::post('course/tutorial/delete/{id}', [CourseController::class, 'deleteTutorial'])->name('deleteTutorial');
  Route::post('course/tutorial/edit/{id}', [CourseController::class, 'editTutorial'])->name('editTutorial');
  Route::get('course/tutorial/video/show/{tutorialId}', [CourseController::class, 'video'])->name('showTutorialVideo');
    // update Video Order using json Api

  Route::post('updateVideoOrder', [CourseController::class, 'updateVideoOrder'])->name('updateVideoOrder');
  
  // update Tutorial Order using json Api
  Route::post('updateTutorialOrder', [CourseController::class, 'updateTutorialOrder'])->name('updateTutorialOrder');

  Route::post('course/tutorial/video/post/{tutorialId}', [CourseController::class, 'createVideo'])->name('postTutorialVideo');
  Route::post('course/tutorial/video/delete/{id}', [CourseController::class, 'deleteVideo'])->name('deleteTutorialVideo');
  Route::post('course/tutorial/video/edit/{id}', [CourseController::class, 'editVideo'])->name('editTutorialVideo');
  Route::get('course/subscribes/', [CourseController::class, 'subscribesCourses'])->name('subscribesCourses');
  //package  
  Route::get('package/show', [PackageController::class, 'index'])->name('showPackage');
  Route::get('package/archive/show', [PackageController::class, 'unActive'])->name('showPackageArchive');
  Route::post('package/post', [PackageController::class, 'create'])->name('postPackage');
  Route::post('package/{package}', [PackageController::class, 'createPackageDetails'])->name('PackageDetails');
  Route::post('package/dalete/{packageId}', [PackageController::class, 'delete'])->name('deletePackage');
  Route::get('package/{package}', [PackageController::class, 'edit'])->name('editPackage');
  Route::post('package/archive/{package}', [PackageController::class, 'archivePackage'])->name('archivePackage');
  Route::post('package/unarchive/{package}', [PackageController::class, 'unarchivePackage'])->name('unarchivePackage');
  Route::get('reports/show', [CourseController::class, 'reports'])->name('showReports');
  Route::get('show/site/setting', [Sitesetteings::class, 'index'])->name('sitesettingsShow');
  Route::post('post/site/setting', [Sitesetteings::class, 'update'])->name('sitesettingsPost');
  //books
  //book->admin 
  Route::get('/book', [BookController::class, 'index'])->name('getBook');
  Route::get('/book/add', [BookController::class, 'addBook'])->name('addBook');
  Route::post('/book/add', [BookController::class, 'store'])->name('postBook');
  Route::get('/store', [BookController::class, 'storeBook'])->name('getStore');
  Route::get('/store/show/{name}', [BookController::class, 'showBooksClass'])->name('booksShow');
  Route::post('/update_print_quantity/{book}', [BookController::class, 'updatePrintQuantity'])->name('updatePrintQuantity');

  Route::post('/store/target/books', [BookController::class, 'createTarget'])->name('postTarget');
  Route::post('/store/quantity/class/books', [BookController::class, 'updateQuantityClass'])->name('postQuantityClassroom');
  Route::post('/store/print/finish/class/books', [BookController::class, 'finishPrint'])->name('finishPrint');
  Route::get('/store/print/finishprint/done/{book}', [BookController::class, 'printBookFinish'])->name('printBookFinish');
  Route::post('/delete/Book/From/Store/{book}', [BookController::class, 'deleteBookFromStore'])->name('deleteBookFromStore');
  
    Route::get('/delete/quantity/books/Store', [BookController::class, 'deleteQuantityBookFromStore'])->name('deleteBookQuantityFromStore');

  //
  Route::Post('/quantitybook/{book}', [BookController::class, 'addQuantity'])->name('addQuantity');
  Route::get('/termone', [BookController::class, 'termone'])->name('termone');
  Route::get('/termtow', [BookController::class, 'termtow'])->name('termtow');
  Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('editBook');
  Route::post('/book/edit/{book}', [BookController::class, 'update'])->name('updateBook');
  Route::post('/termone/book', [TermController::class, 'createTermOne'])->name('termOneDetail');
  Route::post('/termtow/book', [TermController::class, 'createTermTow'])->name('termTowDetail');
  //mandub->admin->book
  Route::get('/mandub', [MandubController::class, 'index'])->name('getMandub');
  Route::post('/mandub', [MandubController::class, 'store'])->name('postMandub');
  Route::post('/mandub/edit/{mandub}', [MandubController::class, 'update'])->name('updateMandub');
  Route::get('/mandub/storage/{mandub}', [MandubController::class, 'mandubStorage'])->name('mandubStorage');
  Route::post('/mandub/minimum/{mandub}/{Book}', [MandubController::class, 'addMinimum'])->name('addMinimum');
  Route::post('/mandub/{mandub}/{Book}/addquantity', [MandubController::class, 'addMandubQuantity'])->name('postMandubQuantity');
  Route::get('/mandub/book/class/{name}/{mandub}', [MandubController::class, 'showBooksClass'])->name('booksMandubShow');
  Route::get('/mandub/book/update/distributor/active/{book}/{mandub}', [MandubController::class, 'updateDistributorActive'])->name('updateDistributorActive');
  Route::get('/mandub/book/update/mandub/active/{book}/{mandub}', [MandubController::class, 'updateMandubActive'])->name('updateMandubActive');
  Route::post('/store/station/{mandub}', [MandubController::class, 'createStation'])->name('postStation');
  Route::post('/finish/station/mandub/books', [MandubController::class, 'finishStation'])->name('finishStation');
  Route::post('/update_station_quantity/{bookId}/{mandubId}', [MandubController::class, 'updateStationQuantity'])->name('update_station_quantity');

 
  Route::get('/mandubOrderComplete/{mandubId}', [MandubController::class, 'mandubOrderComplete'])->name('mandubOrderComplete');
  Route::get('/ended/all/order/complete/for/mandub/{mandubId}', [MandubController::class, 'endedAllOrderCompleteForMandub'])->name('endedAllOrderCompleteForMandub');

  //city->admin->book
  Route::get('/city', [CityController::class, 'index'])->name('getCity');
  Route::post('/city', [CityController::class, 'store'])->name('postCity');
  Route::post('/city/edit/{city}', [CityController::class, 'update'])->name('updateCity');
  Route::get('/city/mandoub/{city}', [CityController::class, 'addMandoub'])->name('addMandoubToCity');
  Route::post('/city/mandoub/add/{city}', [CityController::class, 'addNewMandoub'])->name('addNewMandoub');
  Route::post('/city/mandoub/delete/{mandoub}', [CityController::class, 'mandoubCityDelete'])->name('mandoubCityDelete');
  //package//book
  Route::get('/book/package', [BookController::class, 'allPackage'])->name('getPackage');
  Route::post('package/book/post', [BookController::class, 'create'])->name('postPackageBook');
  Route::post('package/book/{package}', [BookController::class, 'createPackageDetails'])->name('postPackageDetails');
  Route::post('package/book/archive/{package}', [BookController::class, 'archivePackage'])->name('archivePackageBook');
  Route::post('package/book/unarchive/{package}', [BookController::class, 'unarchivePackage'])->name('unarchivePackageBook');
  Route::post('package/book/dalete/{packageId}', [BookController::class, 'delete'])->name('deletePackageBook');
  Route::get('package/book/{package}', [BookController::class, 'editPackage'])->name('editPackageBook');
  Route::get('package/archive/book/show', [BookController::class, 'unActive'])->name('showPackageArchiveBook');
  //book/order/
  Route::get('/book/neworder', [OrderController::class, 'neworder'])->name('getNewOrder');
  Route::post('/book/delete/NewOrder/Details/{order}', [OrderController::class, 'deleteNewOrderDetails'])->name('deleteNewOrderDetails');
  Route::get('/book/neworder/details/{order}', [OrderController::class, 'neworderDetails'])->name('getNewOrderDetails');
  //book //current//order
  Route::get('/book/currentOrder', [OrderController::class, 'currentOrder'])->name('getCurrentOrder');
  Route::post('/book/delete/current/order/{order}', [OrderController::class, 'deleteCurrentOrderDetails'])->name('deleteCurrentOrderDetails');
  //completed //order
  Route::get('/book/order/completed', [OrderController::class, 'orderCompleted'])->name('getOrderCompleted');
//finish //order
Route::get('/book/order/finished', [OrderController::class, 'orderFinished'])->name('getOrderFinished');
  //secretary->admin
  Route::get('/secretary', [SecretaryController::class, 'index'])->name('getSecretary');
  Route::post('/secretary', [SecretaryController::class, 'store'])->name('postSecretary');
  Route::post('/secretary/edit/{secretary}', [SecretaryController::class, 'update'])->name('updateSecretary');
});
route::group(['prefix' => 'dashboard/teacher/'], function () {
  //teacher->dashboard->course
  Route::get('course/show', [SubjectController::class, 'index'])->name('teacherCourse');
  Route::get('course/tutorial/show/{courseId}', [TutorialController::class, 'index'])->name('teacherCourseTutorialShow');
  Route::get('course/tutorial/video/show/{videoId}', [TutorialController::class, 'showVideo'])->name('teacherCourseTutorialVideoShow');
  Route::post('course/tutorial/video/post/{videoId}', [TutorialController::class, 'createVideoComment'])->name('postVideoComment');
  Route::get('payment/history/show/', [TeacherPaymentsController::class, 'getPaymentHistoryTeacher'])->name('getPaymentHistoryTeacher');
  Route::get('payment/course/subscription',[TeacherPaymentsController::class, 'getCourseSubscription'])->name('getCourseSubscription');
  Route::get('payment/book/earn', [TeacherPaymentsController::class, 'getBookEarnTeacher'])->name('getBookEarnTeacher');
});
route::group(['prefix' => 'dashboard/student/'], function () {
  //student->dashboard
  Route::get('/cart', [CartController::class, 'index'])->name('studentcart');
  Route::post('/post/order/item', [CartController::class, 'order'])->name('studentPostOrder');
  Route::post('/cart/create/{course_id}/{price}', [CartController::class, 'store'])->name('studentCartCreate');
  Route::post('/cart/{package_id}/{price}', [CartController::class, 'storePackage'])->name('studentCartCreatePackage');
  Route::post('/cart/{cart_id}', [CartController::class, 'delete'])->name('cartDelete');
  Route::get('/subscription', [SubscriptionController::class, 'index'])->name('studentSubscription');
});
route::group(['prefix' => 'landingpage'], function () {
  // //landingpage->stages ////ااستكشف المواد
  // Route::get('/stage/information/{name}', [StageController::class, 'stageInfon'])->name('stageInfonShow');
  // Route::get('/subject/stages', [StageController::class, 'index'])->name('stagesPage');
  // Route::get('/subjects/show/{name}', [StageController::class, 'showAllSubjects'])->name('subjectsShow');
  // Route::get('/subjects/showone/{course}', [StageController::class, 'showOneSubject'])->name('subjectsShowOne');
  // Route::get('/subjects/freevideo/{video}', [StageController::class, 'showFreeVideo'])->name('freeVideo');
  // Route::get('/filedownload/{file}', [StageController::class, 'download'])->name('fileDownload');
  //contactUs//
  Route::get('/contactus', [ContactUs::class, 'index'])->name('contactus');
  Route::post('post/contactus', [ContactUs::class, 'create'])->name('postContact');
  //books//notes
  Route::get('/books/stages', [NotesController::class, 'index'])->name('getNotesStage');
    Route::get('/books/primary_school', [NotesController::class, 'primarySchool'])->name('getPrimarySchool');

  Route::get('/books/middleSchool', [NotesController::class, 'middleSchool'])->name('getMiddleSchool');
  Route::get('/books/highSchool', [NotesController::class, 'highSchool'])->name('getHighSchool');
  Route::get('/books/notes/class/{name}', [NotesController::class, 'classNotes'])->name('getNotesClass');
  Route::get('/pdf/book/free/{fileName}', [NotesController::class, 'downloadPdf'])->name('pdfBookFree');
  Route::get('/books/carts', [NotesController::class, 'cartBooks'])->name('getCartBooks');
  //book/cart
  Route::post('cart/add/new/book', [NotesController::class, 'addToCartbooks'])->name('addToCartbooks');
  Route::post('cart/add/new/package/packagebooks', [NotesController::class, 'addToCartPackages'])->name('addToCartPackages');
  Route::post('cart/add/quantity/package/{cart}', [NotesController::class, 'postnewquantitybook'])->name('postnewquantitybook');
  Route::get('/delete/Cart/Books/Item/{cart}', [NotesController::class, 'deleteCartBooksItem'])->name('deleteCartBooksItem');
  Route::post('cart/order/done', [NotesController::class, 'neworderbook'])->name('postneworderbook');  

  //subjest
  Route::get('/subjects/landingpage/stages', [LandingSubjectsController::class, 'index'])->name('getLandingSubjectsStage');
  Route::get('/subjects/middleSchool', [LandingSubjectsController::class, 'middleSchool'])->name('getMiddleSchoolSubjects');
  Route::get('/subjects/highSchool', [LandingSubjectsController::class, 'highSchool'])->name('getHighSchoolSubjects');
  Route::get('/subjects/courses/class/{name}', [LandingSubjectsController::class, 'getCoursesClassRoom'])->name('getCoursesClassRoom');
  Route::get('/subjects/courses/class/tutorial/free/video/{course}/{video}', [LandingSubjectsController::class, 'getSubjectTutorialsAndFreeVideos'])->name('getSubjectTutorialsAndFreeVideos');
  Route::get('/filedownload/{file}', [StageController::class, 'download'])->name('fileDownload');

  
});