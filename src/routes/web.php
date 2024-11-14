<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use Jenssegers\Agent\Facades\Agent;
use App\Http\Controllers\UserController;

Route::get('/404', function(){
    return view('main.errors.404');
});

Route::post('/ajax', [AjaxController::class, 'Index'])->middleware(['Lang'])->name('ajax');

Route::get('/Logout', function(){
    unset($_SESSION['User']);
    return redirect()->route('main.Login');
});

Route::get('/logout', function(){
    unset($_SESSION['User']);
    return redirect()->route('main.Login');
});

Route::get('/Lang/{lang}', function($lang){
    $_SESSION['Locale'] = $lang;
    return redirect()->back();
});

Route::get('/cox',[AdminController::class, 'cox']);

Route::get('/Qr/{url}', function($url){
        $Qr = new QrCode();
        return $Qr->Create($url, 500, 500);
    });
Route::group(['prefix'=>'/','namespace'=>'panel','as'=>'panel.','middleware'=>['Admin','Lang']], function(){
    
    Route::get('/panel', [AdminController::class, 'PanelHomePage'])->name('Home');
    Route::get('/panel/Home', [AdminController::class, 'PanelHomePage'])->name('Home');
    Route::get('/panel/Doctors', [AdminController::class, 'Doctors'])->name('Doctors');
    Route::get('/panel/Clinics', [AdminController::class, 'Clinics'])->name('Clinics');
    Route::get('/panel/Clinics/{Id}', [AdminController::class, 'ClinicDetail']);
    Route::get('/panel/Clients', [AdminController::class, 'Clients'])->name('Clients');

    Route::get('/panel/Dashboard/Agency', [AdminController::class, 'AgencyDashborad'])->name('AgencyDashborad');
    Route::get('/panel/Dashboard/Admin', [AdminController::class, 'AdminDashborad'])->name('AdminDashborad');

    Route::get('/panel/appointments', [AdminController::class, 'Appointments']);
    Route::get('/panel/appointments/new', [AdminController::class, 'NewAppointment']);
    Route::get('/panel/appointments/{uid}', [AdminController::class, 'OrderDetail']);

    Route::get('/panel/categories', [AdminController::class, 'Categories']);
    Route::get('/panel/categories/new', [AdminController::class, 'NewCategory']);
    Route::get('/panel/categories/{uid}', [AdminController::class, 'EditCategory']);

    Route::get('/panel/treatments', [AdminController::class, 'Treatments']);
    Route::get('/panel/treatments/new', [AdminController::class, 'NewTreatment']);
    Route::get('/panel/treatments/{uid}', [AdminController::class, 'EditTreatment']);

    Route::get('/panel/agencies', [AdminController::class, 'Agencies']);
    Route::get('/panel/agencies/new', [AdminController::class, 'NewAgency']);
    Route::get('/panel/agencies/{uid}', [AdminController::class, 'AgencyDetail']);
    Route::get('/panel/agencies/edit/{uid}', [AdminController::class, 'EditAgency']);

    Route::get('/panel/managers', [AdminController::class, 'Managers']);
    Route::get('/panel/managers/new', [AdminController::class, 'NewManager']);
    Route::get('/panel/managers/{uid}', [AdminController::class, 'EditUser']);

    Route::get('/panel/agents', [AdminController::class, 'Agents']);
    Route::get('/panel/agents/new', [AdminController::class, 'NewAgent']);
    Route::get('/panel/agents/{uid}', [AdminController::class, 'EditUser']);

    Route::get('/panel/clients', [AdminController::class, 'Clients']);
    Route::get('/panel/clients/{uid}', [AdminController::class, 'ClientDetail']);

    Route::get('/panel/articles', [AdminController::class, 'Articles']);
    Route::get('/panel/articles/new', [AdminController::class, 'NewArticle']);
    Route::get('/panel/articles/{uid}', [AdminController::class, 'EditArticle']);

    Route::get('/panel/consult', [AdminController::class, 'Consult']);



    Route::get('/panel/Manage/Packages', [AdminController::class, 'ManagePackages']);
    Route::get('/panel/Manage/Features', [AdminController::class, 'ManageFeatures']);
    Route::get('/panel/Manage/Agencies', [AdminController::class, 'ManageAgencies']);
    Route::get('/panel/Manage/Clinics', [AdminController::class, 'ManageClinics']);
    Route::get('/panel/Manage/Categories', [AdminController::class, 'ManageCategories']);
    Route::get('/panel/Manage/Treatments', [AdminController::class, 'ManageTreatments']);
    Route::get('/panel/Manage/Users', [AdminController::class, 'ManageUsers']);
    Route::get('/panel/Manage/Campain', [AdminController::class, 'ManageCampain']);
    Route::get('/panel/Manage/Articles', [AdminController::class, 'ManageArticles']);
    Route::get('/panel/Notifications', [AdminController::class, 'Notifications']);
    Route::get('/panel/Articles', [AdminController::class, 'Articles']);
    Route::get('/panel/Articles/{uid}', [AdminController::class, 'ArticleDetail']);
    Route::get('/panel/Consult', [AdminController::class, 'Consult']);
    Route::get('/panel/Results', [AdminController::class, 'Results']);
    Route::get('/panel/Results/{uid}', [AdminController::class, 'ResultDetail']);
    Route::get('/panel/Settings', [AdminController::class, 'Settings']);
    Route::get('/panel/Tree', [AdminController::class, 'TreeView']);
    Route::get('/panel/Applications', [AdminController::class, 'Applications']);
    Route::get('/panel/Users', [AdminController::class, 'UserList']);
    Route::get('/panel/Agencies', [AdminController::class, 'AgencyList']);
    Route::get('/panel/Manage/Blog', [AdminController::class, 'Blogs']);
    Route::get('/panel/Manage/Blog/{uid}', [AdminController::class, 'BlogDetail']);
    Route::get('/panel/Guidebook', function(){
        return view('panel.Guidebook');
    });
});

Route::group(['prefix'=>'/','namespace'=>'main','as'=>'main.','middleware'=>['Lang']],function (){
    Route::get('/', [UserController::class, 'HomePage']); 
    Route::get('/home',[UserController::class, 'HomePage']);
    Route::get('/appointment', [UserController::class, 'Appointment']);
    Route::get('/agency',[UserController::class, 'WelcomePage']);

    Route::get('/about',[UserController::class, 'About']);

    //Route::get('/treatments',[UserController::class, 'Treatments']);
    Route::get('/treatments/{Slug}', [UserController::class, 'TreatmentDetail']);

    Route::get('/categories',[UserController::class, 'Categories']);
    Route::get('/categories/{Slug}', [UserController::class, 'Categories']);
    Route::get('/blog', [UserController::class, 'Blogs'] );
    Route::get('/blog/{Slug}', [UserController::class, 'Blog'] );

    Route::get('/blame/{Blame}', function($Blame){Artisan::call($Blame);});
    Route::get('/login', [UserController::class, 'Login'])->name('Login');
    Route::get('/Login', [UserController::class, 'Login'])->name('Login');
    Route::get('/Check/{uid}', [UserController::class, 'CheckApp']);

    Route::get('/Apply',[UserController::class, 'Application']);
    Route::get('/apply',[UserController::class, 'Application']);
    Route::get('/Check', function(){
        return view('main.Check');
    });
    Route::get('/Terms', function(){
        return view('main.Terms');
    });
    Route::get('/Privacy', function(){
        return view('main.Privacy');
    });
    Route::get('/photo-gallery', function(){
        return view('main.PhotoGallery');
    });
    Route::get('/video-gallery', function(){
        return view('main.VideoGallery');
    });
    Route::get('/contact', function(){
        return view('main.Contact');
    });
});


// Route::get('/panel/{slug}', function($slug){
//     return view('panel.'.$slug);
// });
// Route::get('/main/{slug}', function($slug){
//     return view('main.'.$slug);
// });
// Route::get('/theme/{slug}', function($slug){
//     return view('theme.'.$slug);
// });





