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
    Route::get('/', function () {           return view('dashboard.homepage'); });

    // Route::group(['middleware' => ['role:user']], function () {
    //     Route::get('/colors', function () {     return view('dashboard.colors'); });
    //     Route::get('/typography', function () { return view('dashboard.typography'); });
    //     Route::get('/charts', function () {     return view('dashboard.charts'); });
    //     Route::get('/widgets', function () {    return view('dashboard.widgets'); });
    //     Route::get('/404', function () {        return view('dashboard.404'); });
    //     Route::get('/500', function () {        return view('dashboard.500'); });
    //     Route::prefix('base')->group(function () {  
    //         Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
    //         Route::get('/cards', function(){        return view('dashboard.base.cards'); });
    //         Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
    //         Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });

    //         Route::get('/forms', function(){        return view('dashboard.base.forms'); });
    //         Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
    //         Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
    //         Route::get('/navs', function(){         return view('dashboard.base.navs'); });

    //         Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
    //         Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
    //         Route::get('/progress', function(){     return view('dashboard.base.progress'); });
    //         Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });

    //         Route::get('/switches', function(){     return view('dashboard.base.switches'); });
    //         Route::get('/tables', function () {     return view('dashboard.base.tables'); });
    //         Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
    //         Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
    //     });
    //     Route::prefix('buttons')->group(function () {  
    //         Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
    //         Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
    //         Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
    //         Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
    //     });
    //     Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
    //         Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
    //         Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
    //         Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
    //     });
    //     Route::prefix('notifications')->group(function () {  
    //         Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
    //         Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
    //         Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
    //     });
    //     Route::resource('notes', 'NotesController');
    // });
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
        Route::resource('bread',  'BreadController');   //create BREAD (resource)
        Route::resource('users',        'UsersController')->except( ['create', 'store'] );
        Route::resource('roles',        'RolesController');
        Route::resource('mail',        'MailController');
        Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
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
        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });

        //manajemen klasifikasi dan sub klasifikasi
        Route::resource('klasifikasi','KlasifikasiController')->except('show');
        Route::get('klasifikasi-sub/{klasifikasi}','KlasifikasiController@getListSub')->name('klasifikasi.sub');
        Route::resource('klasifikasi-sub/{klasifikasi}/sub','SubKlasifikasiController')->except('index','show');

        //manajemen syarat
        Route::resource('syarat','SyaratController')->except('show');

        //manajemen layanan
        Route::resource('layanan','LayananController');

        //manajemen permohonan
        Route::resource('permohonan','PermohonanController');
        Route::put('permohonan/{permohonan}/verifikasi','DraftSuratController@verifikasi')->name('draft.verifikasi');
        Route::get('permohonan/{permohonan}/getDraft','DraftSuratController@getDraft')->name('draft.getDraft');
        Route::put('permohonan-proses/{draft}','DraftSuratController@prosesDraft')->name('draft.prosesDraft');
        Route::put('permohonan/{permohonan}/getDraft-t', 'PermohonanController@tolakPermohonan')->name('permohonan.tolakPermohonan');
            //belum berfungsi dengan baik
             Route::get('permohonan/create/{id}','PermohonanController@layananAjax')->name('layananAjax');
            
        //manajemen draft
        Route::get('draft','DraftSuratController@index')->name('draft.index');
        Route::get('draft/{draft}/showDraft','DraftSuratController@showDraft')->name('draft.showDraft');
        Route::put('draft-tolak/{draft}','DraftSuratController@tolakDraft')->name('draft.tolakDraft');
            // Route::get('draft/{draft}/getDraft-no','DraftSuratController@generateNoSurat')->name('draft.generateNoSurat');

        //penandatanganan
        Route::get('draft/{draft}/getFile','DraftSuratController@getFile')->name('draft.getFile');
        //Route::put('draft-sign/{draft}','DraftSuratController@sign')->name('draft.sign');

        //manajemen surat keluar
        Route::resource('suratkeluar','SuratKeluarController');

        //sign belum pindah ke controller
        Route::put('draft-sign/{draft}',function(Request $request, $id){
            require_once('..\vendor\setasign\setapdf-signer_eval_ioncube_php7.1\library\SetaPDF\Autoload.php');
            $surat = App\Models\SuratKeluar::find($id);

            // create a Http writer (file name)
            $writer = new SetaPDF_Core_Writer_Http('../nama_file.pdf', true);
            // load document by filename
            $document = SetaPDF_Core_Document::loadByFilename('../public/file/draft/'.$surat->nama_file, $writer);

            // create a signer instance for the document
            $signer = new SetaPDF_Signer($document);

            // add a field with the name "Signature" to the top left of page 1
            $signer->addSignatureField(
                'Signature',                    // Name of the signature field
                1,                              // put appearance on page 1
                SetaPDF_Signer_SignatureField::POSITION_LEFT_TOP,
                array('x' => 260, 'y' => -580),   // Translate the position (x 50, y -80 -> 50 points right, 80 points down)
                180,                            // Width - 180 points
                70                              // Height - 50 points
            );

            // set some signature properties
            $signer->setReason("Just for testing");
            $signer->setLocation('setasign.com');
            //$signer->setContactInfo('+49 5351 3803603');


            // read certificate and private key from the PFX file
            $pkcs12 = array();
            $pfxRead = openssl_pkcs12_read(
                file_get_contents('../public/file/aura24011998@gmail.com.p12'),
                $pkcs12,
                $request->password
            );

            // error handling
            if (false === $pfxRead) {
                throw new Exception('The certificate could not be read.');
            }

            // create e.g. a PAdES module instance
            $module = new SetaPDF_Signer_Signature_Module_Pades();
            // pass the certificate ...
            $module->setCertificate($pkcs12['cert']);
            // ...and private key to the module
            $module->setPrivateKey($pkcs12['pkey']);

            // pass extra certificates if included in the PFX file
            if (isset($pkcs12['extracerts']) && count($pkcs12['extracerts'])) {
                $module->setExtraCertificates($pkcs12['extracerts']);
            }

            // create a Signature appearance
            $visibleAppearance = new SetaPDF_Signer_Signature_Appearance_Dynamic($module);
            // create a font instance for the signature appearance
            $font = new SetaPDF_Core_Font_TrueType_Subset(
                $document,
                '../public/file/DejaVuSans.ttf'
            );
            // set the font
            $visibleAppearance->setFont($font);
            // choose a document to get the background from and convert the art box to an xObject
            $backgroundDocument = SetaPDF_Core_Document::loadByFilename('../public/file/logo_.pdf');
            $backgroundXObject = $backgroundDocument->getCatalog()->getPages()->getPage(1)->toXObject($document);
            // set the background with 50% opacity
            $visibleAppearance->setBackgroundLogo($backgroundXObject, .8);

            // choose a document with a handwritten signature
            $signatureDocument = SetaPDF_Core_Document::loadByFilename('../public/file/ttd.pdf');
            $signatureXObject = $signatureDocument->getCatalog()->getPages()->getPage(1)->toXObject($document);
            // set the signature xObject as graphic
            $visibleAppearance->setGraphic($signatureXObject);

            // define the appearance
            $signer->setAppearance($visibleAppearance);

            // sign the document
            $signer->sign($module);

            $suratUpdate = App\Models\SuratKeluar::where('no_regist','=',$id)->update(['nama_file' => 'surat_'.$id.'.pdf' , 'status' => 5]);
        })->name('draft.sign');
    });
});