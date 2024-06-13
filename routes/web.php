<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BreakfastController;
use App\Http\Controllers\CatatanOrangtuaController;
use App\Http\Controllers\DoaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HadistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IslamicController;
use App\Http\Controllers\KindergartenController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MorningController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PoopPeeController;
use App\Http\Controllers\PreschoolController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\RecallingController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TematikController;
use App\Http\Controllers\VideosController;
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
Route::get('/montessory-youtube', [HomeController::class, 'youtube'])->name('montessory.youtube');
Route::get('/montessory-pdf', [HomeController::class, 'pdf'])->name('montessory.pdf');

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');

//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // home admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // akun
    Route::get('/list-akun', [AdminController::class, 'showAkun'])->name('showAkun');
    Route::get('akun/{user}', [AdminController::class, 'editAkun'])->name('editAkun');
    Route::put('akun/{user}', [AdminController::class, 'updateAkun'])->name('updateAkun');
    Route::delete('akun/{user}', [AdminController::class, 'destroyAkun'])->name('destroyAkun');
    Route::get('password/{user}', [PasswordController::class, 'edit'])->name('editPassword');
    Route::put('password/{user}', [PasswordController::class, 'update'])->name('updatePassword');



    // tahun
    Route::resource('tahun', TahunController::class);

    // siswa
    Route::resource('siswa', SiswaController::class);
    Route::get('/siswa-kindergarten', [SiswaController::class, 'showKindergarten'])->name('showKindergarten');
    Route::get('/siswa-playgroup', [SiswaController::class, 'showPlaygroup'])->name('showPlaygroup');
    Route::get('/siswa-babycamp', [SiswaController::class, 'showBabycamp'])->name('showBabycamp');

    // montessory
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

    // kelola menu
    Route::resource('menu', MenuController::class);

    // kelola video
    Route::resource('video', VideosController::class);

    // kelola islamic
    Route::get('/islamic', function () {
        return view('guru.kelola.islamic.index');
    })->name('tkislamic.kelola');
    Route::resource('doa', DoaController::class);
    Route::resource('hadist', HadistController::class);
    Route::resource('quran', QuranController::class);

    // welcome mood
    Route::get('/teacher-kindergarten/welcome-mood/index/{id}', [WelcomeController::class, 'kindergarten'])->name('tkwelcome.index');
    Route::resource('welcome-mood', WelcomeController::class);

    // morning booster
    Route::get('/teacher-kindergarten/morning-booster/index/{id}', [MorningController::class, 'kindergarten'])->name('tkmorning.index');
    Route::resource('morning-booster', MorningController::class);

    // breakfast
    Route::get('/teacher-kindergarten/breakfast/index/{id}', [BreakfastController::class, 'kindergarten'])->name('tkbreakfast.index');
    Route::resource('breakfast', BreakfastController::class);

    // islamic base learning
    Route::get('/teacher-kindergarten/islamic-base-learning/index/{id}', [IslamicController::class, 'kindergarten'])->name('tkislamic.index');
    Route::resource('islamic-base-learning', IslamicController::class);

    // pre school
    Route::get('/teacher-kindergarten/pre-school/index/{id}', [PreschoolController::class, 'kindergarten'])->name('tkpreschool.index');
    Route::resource('preschool', PreschoolController::class);

    // tematik
    Route::get('/teacher-kindergarten/tematik/index/{id}', [TematikController::class, 'kindergarten'])->name('tktematik.index');
    Route::resource('tematik', TematikController::class);

    // poop & pee
    Route::get('/teacher-kindergarten/poop-pee/index/{id}', [PoopPeeController::class, 'kindergarten'])->name('tkpooppee.index');
    Route::resource('poop-pee', PoopPeeController::class);

    // re calling
    Route::get('/teacher-kindergarten/re-calling/index/{id}', [RecallingController::class, 'kindergarten'])->name('tkrecalling.index');
    Route::resource('re-calling', RecallingController::class);

    // PLAYGROUP
    Route::get('/teacher-playgroup', [GuruController::class, 'playgroup'])->name('teacher.playgroup');

    // BABYCAMP
    Route::get('/teacher-babycamp', [GuruController::class, 'babycamp'])->name('teacher.babycamp');
});

//ortu
Route::middleware(['auth', 'user-access:ortu'])->group(function () {
    Route::get('/halaman-orangtua', [OrtuController::class, 'index'])->name('ortu');
    Route::get('/halaman-orangtua-siswa', [OrtuController::class, 'siswa'])->name('ortu.siswa');

    Route::get('halaman-orangtua-siswa/{siswa}/kindergarten', [OrtuController::class, 'kindergarten'])->name('ortu.kindergarten');
    Route::get('halaman-orangtua-siswa/{siswa}/playgroup', [OrtuController::class, 'playgroup'])->name('ortu.playgroup');
    Route::get('halaman-orangtua-siswa/{siswa}/babycamp', [OrtuController::class, 'babycamp'])->name('ortu.babycamp');

    // catatan orangtua
    Route::resource('catatanorangtua', CatatanOrangtuaController::class);
    Route::get('catatan-orangtua/create/{siswa}/{tanggal}', [CatatanOrangtuaController::class, 'create'])->name('catatanorangtua.create');

    Route::get('/halaman-orangtua-test', [OrtuController::class, 'test'])->name('ortu.test');
});
