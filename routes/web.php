//Rutas de Acabados
	Route::resource('/admin/construccion/acabado/closet','admin\AcabadoClosetController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/cubierta','admin\AcabadoCubiertaController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/cubiertaventana','admin\AcabadoCubiertaVentanaController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/escalera','admin\AcabadoEscaleraController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/piso','admin\AcabadoPisosController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/puerta','admin\AcabadoPuertasController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/revestido/externo','admin\AcabadoRevExternoController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/revestido/interno','admin\AcabadoRevInternoController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/tumbado','admin\AcabadoTumbadosController')->middleware('auth');
	Route::resource('/admin/construccion/acabado/ventana','admin\AcabadoVentanasController')->middleware('auth');

//end
//Rutas estructura
	Route::resource('/admin/construccion/estructura/columna','admin\EstructuraColumnaController')->middleware('auth');
	Route::resource('/admin/construccion/estructura/cubierta','admin\EstructuraCubiertaController')->middleware('auth');
	Route::resource('/admin/construccion/estructura/entrepiso','admin\EstructuraEntrepisoController')->middleware('auth');
	Route::resource('/admin/construccion/estructura/escalera','admin\EstructuraEscalerasController')->middleware('auth');
	Route::resource('/admin/construccion/estructura/paredes','admin\EstructuraParedesController')->middleware('auth');
	Route::resource('/admin/construccion/estructura/vigascadena','admin\EstructuraVigascadenasController')->middleware('auth');
//end

//Rutas instalacion
	Route::resource('/admin/construccion/instalacion/banos','admin\InstalacionBanosController')->middleware('auth');
	Route::resource('/admin/construccion/instalacion/conservacion','admin\InstalacionConservacionController')->middleware('auth');
	Route::resource('/admin/construccion/instalacion/electricas','admin\InstalacionElectricasController')->middleware('auth');
	Route::resource('/admin/construccion/instalacion/especiales','admin\InstalacionEspecialesController')->middleware('auth');
	Route::resource('/admin/construccion/instalacion/etapa','admin\InstalacionEtapaController')->middleware('auth');
	Route::resource('/admin/construccion/instalacion/indust','admin\InstalacionIndustController')->middleware('auth');
	Route::resource('/admin/construccion/instalacion/sanitarias','admin\InstalacionSanitariasController')->middleware('auth');

//end

//rutas para el perfil
	Route::resource('/perfil', 'PerfilController')->middleware('auth');
	Route::get('/autenticate', 'PerfilController@confirmarIngreso')->name('autenticate');

//ruta información
	Route::resource('/admin/informacion','admin\InformacionController')->middleware('auth');