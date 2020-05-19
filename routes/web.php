<?php

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
   use Illuminate\Http\Request;
Route::group(['middleware' => ['get.menu']], function () {
    Route::get('/', function () {           return view('dashboard.authBase'); });

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/colors', function () {     return view('dashboard.colors'); });
        Route::get('/typography', function () { return view('dashboard.typography'); });
        Route::get('/charts', function () {     return view('dashboard.charts'); });
        Route::get('/widgets', function () {    return view('dashboard.widgets'); });
        Route::get('/404', function () {        return view('dashboard.404'); });
        Route::get('/500', function () {        return view('dashboard.500'); });
        Route::prefix('base')->group(function () {  
            Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
            Route::get('/cards', function(){        return view('dashboard.base.cards'); });
            Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
            Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });

            Route::get('/forms', function(){        return view('dashboard.base.forms'); });
            Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
            Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
            Route::get('/navs', function(){         return view('dashboard.base.navs'); });

            Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
            Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
            Route::get('/progress', function(){     return view('dashboard.base.progress'); });
            Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });

            Route::get('/switches', function(){     return view('dashboard.base.switches'); });
            Route::get('/tables', function () {     return view('dashboard.base.tables'); });
            Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
            Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
        });
        Route::prefix('buttons')->group(function () {  
            Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
            Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
            Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
            Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
        });
        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
            Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
            Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
        });
        Route::prefix('notifications')->group(function () {  
            Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
            Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
            Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
        });
        Route::resource('notes', 'NotesController');
    });
    Auth::routes();

    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users',        'UsersController')->except( ['create', 'store'] );
        Route::resource('roles',        'RolesController');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () { 
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () { 
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });

        //dashboard
        Route::get('/dashboard','DashboardController@index')->name('dashboard');

        //manajemen klasifikasi dan sub klasifikasi
        Route::resource('klasifikasi','KlasifikasiController')->except('show');
        Route::get('klasifikasi-{klasifikasi}','KlasifikasiController@getListSub')->name('klasifikasi.sub');
        Route::resource('klasifikasi-{klasifikasi}/sub','SubKlasifikasiController')->except('index','show');

        //manajemen syarat
        Route::resource('syarat','SyaratController')->except('show');

        //manajemen layanan
        Route::resource('layanan','LayananController');

        //manajemen permohonan
        Route::resource('permohonan','PermohonanController');
        Route::get('permohonan/createAjax/{id}','PermohonanController@createAjax')->name('permohonan.createAjax');
        Route::get('permohonan/{permohonan}/getDraft','PermohonanController@getDraft')->name('permohonan.getDraft');
        Route::put('permohonan/{permohonan}/verifikasiDok','PermohonanController@verifikasiDok')->name('permohonan.verifikasiDok');
        Route::put('permohonan/{permohonan}/getDraft-t', 'PermohonanController@tolakPermohonan')->name('permohonan.tolakPermohonan');
        Route::put('permohonan-proses/{draft}','PermohonanController@prosesDraft')->name('permohonan.prosesDraft');
            //*belum berfungsi dengan baik*
             Route::get('permohonan/create/{id}','PermohonanController@layananAjax')->name('layananAjax');
            
        //manajemen draft
        Route::get('draft','DraftSuratController@index')->name('draft.index');
        Route::get('draft/{draft}/showDraft','DraftSuratController@showDraft')->name('draft.showDraft');
        Route::put('draft/{draft}/verifikasiDraft','DraftSuratController@verifikasiDraft')->name('draft.verifikasiDraft');
        Route::put('draft-tolak/{draft}','DraftSuratController@tolakDraft')->name('draft.tolakDraft');
            //*Route::get('draft/{draft}/getDraft-no','DraftSuratController@generateNoSurat')->name('draft.generateNoSurat');*

        //penandatanganan
        Route::get('draft/{draft}/getFile','DraftSuratController@getFile')->name('draft.getFile');
        Route::put('draft-sign/{draft}','DraftSuratController@sign')->name('draft.sign');
            //*unsign*

        //manajemen surat keluar
        Route::resource('suratkeluar','SuratKeluarController'); //*ubah sesuai yang dibutuhkan saja(index,show,download)*
    });
});