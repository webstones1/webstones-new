<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CrowlerController;
use App\Http\Controllers\ExcellenceAndExpertiseController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AwardsAndRecognitionController;
use App\Http\Controllers\TechnologyWeWorkController;

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
Route::get('/', function () {
    return view('backend/login');
});
// Route::get('/loginSubmit', function () {
//     return view('backend/login');
// });
Route::post('/loginSubmit', [LoginController::class, 'loginSubmit']);
Route::get('/dashboard', function () {
    $data = [
        'pageTitle' => 'Dashboard',
        //'menus' => Menu::paginate(3), // You can adjust the number of items per page as needed
    ];
   return view('backend.dashboard',$data);
    //return view('backend/dashboard');
});


/************START-[MANAGE MENU ROUTES]*********************** */
Route::get('addMenu', [MenuController::class, 'addMenu']);
Route::post('/submitMenu', [MenuController::class, 'submitMenu']);
Route::get('manageMenu', [MenuController::class, 'manageMenu'])->name('manageMenu');
Route::get('editMenu/{id}', [MenuController::class, 'editMenu']);
Route::post('menu/{id}/toggle', [MenuController::class, 'menuToggleEnableStatus']);  //MENU ENABLE AND DISABLE
Route::post('/updateMenu', [MenuController::class, 'updateMenu']);
Route::get('/deleteMenu/{id}', [MenuController::class, 'deleteMenu']);
/************END-[MANAGE MENU ROUTES]*********************** */
/************START-[MANAGE SUBMENU ROUTES]*********************** */
Route::get('manageSubMenu', [MenuController::class, 'manageSubMenu'])->name('manageSubMenu');
Route::get('addSubMenu', [MenuController::class, 'addSubMenu']);
Route::post('submitSubMenu', [MenuController::class, 'submitSubMenu']);
Route::get('editSubMenu/{id}', [MenuController::class, 'editSubMenu']);
Route::post('/updateSubMenu', [MenuController::class, 'updateSubMenu']);
Route::post('submenu/{id}/toggle', [MenuController::class, 'submenuToggleEnableStatus']);  //SUBMENU ENABLE AND DISABLE
Route::get('/deleteSubMenu/{id}', [MenuController::class, 'deleteSubMenu']);

/************END-[MANAGE SUBMENU ROUTES]*********************** */
/************START-[MANAGE SLIDER ROUTES]*********************** */
Route::get('manageSlider', [SliderController::class, 'manageSlider'])->name('manageSlider');
Route::get('addSlider', [SliderController::class, 'addSlider']);
Route::post('submitSlider', [SliderController::class, 'submitSlider']);
Route::get('editSlider/{id}', [SliderController::class, 'editSlider']);
Route::post('/updateSlider', [SliderController::class, 'updateSlider']);
Route::post('slider/{id}/toggle', [SliderController::class, 'sliderToggleEnableStatus']);  //SLIDER ENABLE AND DISABLE
Route::get('/deleteSlider/{id}', [SliderController::class, 'deleteSlider']);
/************END-[MANAGE SLIDER ROUTES]*********************** */
/************START-[MANAGE CROWLER ROUTES]*********************** */
Route::get('manageCrowler', [CrowlerController::class, 'manageCrowler'])->name('manageCrowler');
Route::get('addCrowler', [CrowlerController::class, 'addCrowler']);
Route::post('submitCrowler', [CrowlerController::class, 'submitCrowler']);
Route::get('editCrowler/{id}', [CrowlerController::class, 'editCrowler']);
Route::post('/updateCrowler', [CrowlerController::class, 'updateCrowler']);
Route::post('crowler/{id}/toggle', [CrowlerController::class, 'crowlerToggleEnableStatus']);  //CROWLER ENABLE AND DISABLE
Route::get('/deleteCrowler/{id}', [CrowlerController::class, 'deleteCrowler']);
/************END-[MANAGE CROWLER ROUTES]*********************** */
/************START-[MANAGE EXCELLENCE AND EXPERTISE ROUTES]*********************** */
Route::get('manageExcellenceAndExpertise', [ExcellenceAndExpertiseController::class, 'manageExcellenceAndExpertise'])->name('manageExcellenceAndExpertise');
Route::get('addExcellenceAndExpertise', [ExcellenceAndExpertiseController::class, 'addExcellenceAndExpertise']);
Route::post('submitExcellenceAndExpertise', [ExcellenceAndExpertiseController::class, 'submitExcellenceAndExpertise']);
Route::get('editExcellenceAndExpertise/{id}', [ExcellenceAndExpertiseController::class, 'editExcellenceAndExpertise']);
Route::post('/updateExcellenceAndExpertise', [ExcellenceAndExpertiseController::class, 'updateExcellenceAndExpertise']);
Route::post('excellenceAndExpertise/{id}/toggle', [ExcellenceAndExpertiseController::class, 'excellenceAndExpertiseToggleEnableStatus']);  //Excellence And Expertise ENABLE AND DISABLE
Route::get('/deleteExcellenceAndExpertise/{id}', [ExcellenceAndExpertiseController::class, 'deleteExcellenceAndExpertise']);
/************END-[MANAGE EXCELLENCE AND EXPERTISE ROUTES]*********************** */
/************START-[MANAGE SETTINGS ROUTES]************************/
Route::get('manageSettings', [SettingsController::class, 'manageSettings'])->name('manageSettings');
Route::get('addSettings', [SettingsController::class, 'addSettings']);
Route::post('submitaddSettingForm', [SettingsController::class, 'submitaddSettingForm']);
Route::get('editSetting/{id}', [SettingsController::class, 'editSetting']);
Route::post('/updateSetting', [SettingsController::class, 'updateSetting']);
Route::post('settings/{id}/toggle', [SettingsController::class, 'settingsToggleEnableStatus']);  //Settings ENABLE AND DISABLE
Route::get('/deleteSettings/{id}', [SettingsController::class, 'deleteSettings']);
/************END-[MANAGE SETTINGS ROUTES]************************/
/************START-[MANAGE AWARDS & RECOGNITION ROUTES]************************/
Route::get('manageAwardsAndRecognition', [AwardsAndRecognitionController::class, 'manageAwardsAndRecognition'])->name('manageAwardsAndRecognition');
Route::get('addAwardsAndRecognition', [AwardsAndRecognitionController::class, 'addAwardsAndRecognition']);
Route::post('submitAwardsAndRecognition', [AwardsAndRecognitionController::class, 'submitAwardsAndRecognition']);
Route::get('editAwardsAndRecognition/{id}', [AwardsAndRecognitionController::class, 'editAwardsAndRecognition']);
Route::post('/updateAwardsAndRecognition', [AwardsAndRecognitionController::class, 'updateAwardsAndRecognition']);
Route::post('awardsandrecognitions/{id}/toggle', [AwardsAndRecognitionController::class, 'awardsAndRecognitionsToggleEnableStatus']);  //AWARDS & RECOGNITION ENABLE AND DISABLE
Route::get('/deleteAwardsAndRecognition/{id}', [AwardsAndRecognitionController::class, 'deleteAwardsAndRecognition']);
/************END-[MANAGE AWARDS & RECOGNITION ROUTES]************************/
/************START-[MANAGE TECHNOLOGY WE WORK ROUTES]***************/
Route::get('manageTecnologyWeWork', [TechnologyWeWorkController::class, 'manageTecnologyWeWork'])->name('manageTecnologyWeWork');
Route::get('addTechnologyWeWork', [TechnologyWeWorkController::class, 'addTechnologyWeWork']);
Route::post('submitTechnologyWeWork', [TechnologyWeWorkController::class, 'submitTechnologyWeWork']);
Route::get('editTechnologyWeWork/{id}', [TechnologyWeWorkController::class, 'editTechnologyWeWork']);
Route::post('/updateTechnologyWeWork', [TechnologyWeWorkController::class, 'updateTechnologyWeWork']);

Route::post('technologyweworks/{id}/toggle', [TechnologyWeWorkController::class, 'technologyweworksToggleEnableStatus']);  //AWARDS & RECOGNITION ENABLE AND DISABLE
Route::get('/deleteTechnologyWeWork/{id}', [TechnologyWeWorkController::class, 'deleteTechnologyWeWork']);

/************END-[MANAGE ROUTES]*****************/



Route::get('clear_cache', function () 
{
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    dd("Cache is cleared");
});

