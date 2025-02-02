<?php

use App\Http\Controllers\ActController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BabycampController;
use App\Http\Controllers\BreakfastController;
use App\Http\Controllers\DoaBabyController;
use App\Http\Controllers\DoaController;
use App\Http\Controllers\FunController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HadistBabyController;
use App\Http\Controllers\HadistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IslamicController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\KindergartenController;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MorningController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PlaygroupController;
use App\Http\Controllers\PoopPeeController;
use App\Http\Controllers\PreschoolController;
use App\Http\Controllers\ProgramControler;
use App\Http\Controllers\QuranBabyController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\RecallingController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SubTopikController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\TematikController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::resource('program', ProgramControler::class);

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// login pembeli
Route::get('/loginpembeli', [AuthController::class, 'loginpembeli'])->name('loginpembeli');
Route::post('/loginpembeli', [AuthController::class, 'loginpembeliPost'])->name('loginpembeli');
Route::get('/logoutpembeli', [AuthController::class, 'logoutpembeli'])->name('logoutpembeli');

//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');

    // home admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    //list akun
    Route::get('/list-akun/admin', [AdminController::class, 'indexAdmin'])->name('akun.admin');
    Route::get('/list-akun/guru', [AdminController::class, 'indexGuru'])->name('akun.guru');
    Route::get('/list-akun/orangtua', [AdminController::class, 'indexOrtu'])->name('akun.ortu');
    Route::get('/list-akun/pembeli', [AdminController::class, 'indexPembeli'])->name('akun.pembeli');

    // akun
    Route::get('akun/{user}', [AdminController::class, 'editAkun'])->name('editAkun');
    Route::put('akun/{user}', [AdminController::class, 'updateAkun'])->name('updateAkun');
    Route::delete('akun/{user}', [AdminController::class, 'destroyAkun'])->name('destroyAkun');
    Route::get('password/{user}', [PasswordController::class, 'edit'])->name('editPassword');
    Route::put('password/{user}', [PasswordController::class, 'update'])->name('updatePassword');

    // tahun
    Route::resource('tahun', TahunController::class);
    Route::get('/tahun/{tahun}/edit-status', [TahunController::class, 'editStatus'])->name('tahun.editStatus');
    Route::put('/tahun/{tahun}/update-status', [TahunController::class, 'updateStatus'])->name('tahun.updateStatus');

    // kelompok
    Route::resource('kelompok', KelompokController::class);

    // siswa
    Route::resource('siswa', SiswaController::class);
    Route::get('/siswa-kindergarten', [SiswaController::class, 'showKindergarten'])->name('showKindergarten');
    Route::get('/siswa-playgroup', [SiswaController::class, 'showPlaygroup'])->name('showPlaygroup');
    Route::get('/siswa-babycamp', [SiswaController::class, 'showBabycamp'])->name('showBabycamp');

    // montessory
    Route::resource('tema', TemaController::class);
    Route::resource('topik', TopikController::class);
    Route::resource('subtopik', SubTopikController::class);
    Route::resource('youtube', YoutubeController::class);
    Route::resource('pdf', PdfController::class);

});

//guru
Route::middleware(['auth', 'user-access:guru'])->group(function () {
    Route::get('/teacher', [GuruController::class, 'index'])->name('teacher.index');

    // KINDERGARTEN
    Route::get('/teacher-kindergarten', [GuruController::class, 'kindergarten'])->name('teacher.kindergarten');
    Route::get('/teacher-kindergarten/welcome-mood', [KindergartenController::class, 'welcome'])->name('tkwelcome.siswa');
    Route::get('/teacher-kindergarten/morning-booster', [KindergartenController::class, 'morning'])->name('tkmorning.siswa');
    Route::get('/teacher-kindergarten/breakfast', [KindergartenController::class, 'breakfast'])->name('tkbreakfast.siswa');
    Route::get('/teacher-kindergarten/islamic-base-learning', [KindergartenController::class, 'islamic'])->name('tkislamic.siswa');
    Route::get('/teacher-kindergarten/pre-school', [KindergartenController::class, 'preschool'])->name('tkpreschool.siswa');
    Route::get('/teacher-kindergarten/tematik', [KindergartenController::class, 'tematik'])->name('tktematik.siswa');
    Route::get('/teacher-kindergarten/poop-pee', [KindergartenController::class, 'pooppee'])->name('tkpooppee.siswa');
    Route::get('/teacher-kindergarten/re-calling', [KindergartenController::class, 'recalling'])->name('tkrecalling.siswa');
    Route::get('/teacher-kindergarten/vocabulary', [KindergartenController::class, 'vocabulary'])->name('tkvocabulary.siswa');

    // PLAYGROUP
    Route::get('/teacher-playgroup', [GuruController::class, 'playgroup'])->name('teacher.playgroup');
    Route::get('/teacher-playgroup/welcome-mood', [PlaygroupController::class, 'welcome'])->name('tpwelcome.siswa');
    Route::get('/teacher-playgroup/morning-booster', [PlaygroupController::class, 'morning'])->name('tpmorning.siswa');
    Route::get('/teacher-playgroup/breakfast', [PlaygroupController::class, 'breakfast'])->name('tpbreakfast.siswa');
    Route::get('/teacher-playgroup/islamic-base-learning', [PlaygroupController::class, 'islamic'])->name('tpislamic.siswa');
    Route::get('/teacher-playgroup/pre-school', [PlaygroupController::class, 'preschool'])->name('tppreschool.siswa');
    Route::get('/teacher-playgroup/tematik', [PlaygroupController::class, 'tematik'])->name('tptematik.siswa');
    Route::get('/teacher-playgroup/poop-pee', [PlaygroupController::class, 'pooppee'])->name('tppooppee.siswa');
    Route::get('/teacher-playgroup/re-calling', [PlaygroupController::class, 'recalling'])->name('tprecalling.siswa');
    Route::get('/teacher-playgroup/vocabulary', [PlaygroupController::class, 'vocabulary'])->name('tpvocabulary.siswa');

    // BABYCAMP
    Route::get('/teacher-babycamp', [GuruController::class, 'babycamp'])->name('teacher.babycamp');
    Route::get('/teacher-babycamp/welcome-mood', [BabycampController::class, 'welcome'])->name('tbwelcome.siswa');
    Route::get('/teacher-babycamp/morning-booster', [BabycampController::class, 'morning'])->name('tbmorning.siswa');
    Route::get('/teacher-babycamp/breakfast', [BabycampController::class, 'breakfast'])->name('tbbreakfast.siswa');
    Route::get('/teacher-babycamp/islamic-base-learning', [BabycampController::class, 'islamic'])->name('tbislamic.siswa');
    Route::get('/teacher-babycamp/act-base-learning', [BabycampController::class, 'act'])->name('tbact.siswa');
    Route::get('/teacher-babycamp/fun-activities', [BabycampController::class, 'fun'])->name('tbfun.siswa');
    Route::get('/teacher-babycamp/lunch', [BabycampController::class, 'lunch'])->name('tblunch.siswa');
    Route::get('/teacher-babycamp/re-calling', [BabycampController::class, 'recalling'])->name('tbrecalling.siswa');

    // welcome mood
    Route::get('/teacher-kindergarten/welcome-mood/index/{id}', [WelcomeController::class, 'kindergarten'])->name('tkwelcome.index');
    Route::get('/teacher-playgroup/welcome-mood/index/{id}', [WelcomeController::class, 'playgroup'])->name('tpwelcome.index');
    Route::get('/teacher-babycamp/welcome-mood/index/{id}', [WelcomeController::class, 'babycamp'])->name('tbwelcome.index');
    Route::resource('welcome', WelcomeController::class);

    // morning booster
    Route::get('/teacher-kindergarten/morning-booster/index/{id}', [MorningController::class, 'kindergarten'])->name('tkmorning.index');
    Route::get('/teacher-playgroup/morning-booster/index/{id}', [MorningController::class, 'playgroup'])->name('tpmorning.index');
    Route::get('/teacher-babycamp/morning-booster/index/{id}', [MorningController::class, 'babycamp'])->name('tbmorning.index');
    Route::resource('morning', MorningController::class);

    // breakfast
    Route::get('/teacher-kindergarten/breakfast/index/{id}', [BreakfastController::class, 'kindergarten'])->name('tkbreakfast.index');
    Route::get('/teacher-playgroup/breakfast/index/{id}', [BreakfastController::class, 'playgroup'])->name('tpbreakfast.index');
    Route::get('/teacher-babycamp/breakfast/index/{id}', [BreakfastController::class, 'babycamp'])->name('tbbreakfast.index');
    Route::resource('breakfast', BreakfastController::class);

    // islamic base learning
    Route::get('/teacher-kindergarten/islamic-base-learning/index/{id}', [IslamicController::class, 'kindergarten'])->name('tkislamic.index');
    Route::get('/teacher-playgroup/islamic-base-learning/index/{id}', [IslamicController::class, 'playgroup'])->name('tpislamic.index');
    Route::get('/teacher-babycamp/islamic-base-learning/index/{id}', [IslamicController::class, 'babycamp'])->name('tbislamic.index');
    Route::resource('islamic', IslamicController::class);
    Route::get('/islamicbaby/create', [IslamicController::class, 'createbaby'])->name('islamic.createbaby');
    Route::get('/islamicbaby/{islamic}/edit', [IslamicController::class, 'editbaby'])->name('islamic.editbaby');

    // pre school
    Route::get('/teacher-kindergarten/pre-school/index/{id}', [PreschoolController::class, 'kindergarten'])->name('tkpreschool.index');
    Route::get('/teacher-playgroup/pre-school/index/{id}', [PreschoolController::class, 'playgroup'])->name('tppreschool.index');
    Route::resource('preschool', PreschoolController::class);

    // tematik
    Route::get('/teacher-kindergarten/tematik/index/{id}', [TematikController::class, 'kindergarten'])->name('tktematik.index');
    Route::get('/teacher-playgroup/tematik/index/{id}', [TematikController::class, 'playgroup'])->name('tptematik.index');
    Route::resource('tematik', TematikController::class);

    // poop & pee
    Route::get('/teacher-kindergarten/poop-pee/index/{id}', [PoopPeeController::class, 'kindergarten'])->name('tkpooppee.index');
    Route::get('/teacher-playgroup/poop-pee/index/{id}', [PoopPeeController::class, 'playgroup'])->name('tppooppee.index');
    Route::resource('pooppee', PoopPeeController::class);

    // re calling
    Route::get('/teacher-kindergarten/re-calling/index/{id}', [RecallingController::class, 'kindergarten'])->name('tkrecalling.index');
    Route::get('/teacher-playgroup/re-calling/index/{id}', [RecallingController::class, 'playgroup'])->name('tprecalling.index');
    Route::get('/teacher-babycamp/re-calling/index/{id}', [RecallingController::class, 'babycamp'])->name('tbrecalling.index');
    Route::resource('recalling', RecallingController::class);

    // vocabulary
    Route::get('/teacher-kindergarten/vocabulary/index/{id}', [VocabularyController::class, 'kindergarten'])->name('tkvocabulary.index');
    Route::get('/teacher-playgroup/vocabulary/index/{id}', [VocabularyController::class, 'playgroup'])->name('tpvocabulary.index');
    Route::resource('vocabulary', VocabularyController::class);

    // lunch
    Route::get('/teacher-babycamp/lunch/index/{id}', [LunchController::class, 'babycamp'])->name('tblunch.index');
    Route::resource('lunch', LunchController::class);

    // act base learning
    Route::get('/teacher-babycamp/act-base-learning/index/{id}', [ActController::class, 'babycamp'])->name('tbact.index');
    Route::resource('act', ActController::class);

    // fun activities
    Route::get('/teacher-babycamp/fun-activities/index/{id}', [FunController::class, 'babycamp'])->name('tbfun.index');
    Route::resource('fun', FunController::class);

    // kelola video
    Route::resource('video', VideosController::class);

    // kelola menu
    Route::resource('menu', MenuController::class);

    // kelola islamic
    Route::get('/islamic-kelola', function () {
        return view('guru.kelola.islamic.index');
    })->name('tkislamic.kelola');

    Route::resource('doa', DoaController::class);
    Route::resource('hadist', HadistController::class);
    Route::resource('quran', QuranController::class);
    Route::resource('doababy', DoaBabyController::class);
    Route::resource('hadistbaby', HadistBabyController::class);
    Route::resource('quranbaby', QuranBabyController::class);
});

//ortu
Route::middleware(['auth', 'user-access:ortu'])->group(function () {
    Route::get('/halaman-orangtua', [OrtuController::class, 'index'])->name('ortu')->middleware('auth');

    Route::get('/halaman-orangtua-laporan/{id}', [OrtuController::class, 'showLaporan'])->name('ortu.laporan');
    Route::post('/halaman-orangtua-laporan/{id}', [OrtuController::class, 'laporan'])->name('laporan.tanggal');
});
