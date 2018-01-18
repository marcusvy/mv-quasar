<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

$app->get('/', App\Action\HomePageAction::class, 'home');
$app->get('/api/ping', App\Action\PingAction::class, 'api.ping');

/**
 * Log Module
 */
$app->get('/api/logger/list[/{page:\d+}]', Log\Action\LoggerRestAction::class, 'logger.pagination');
$app->route('/api/logger[/[{id:\d+}]]', Log\Action\LoggerRestAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'logger.role');

/**
 * User Module
 */
$app->get('/test-form',User\Action\FormPageAction::class,'teste');
$app->route('/login', User\Action\AuthPageAction::class, ['GET', 'POST'], 'auth.login');
$app->route('/api/user[/{id:\d+}]', User\Action\UserRestAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'user');
$app->route('/api/user-perfil[/{id:\d+}]', User\Action\PerfilRestAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'user.perfil');
$app->get('/api/user-role/list[/{page:\d+}]', User\Action\RoleRestAction::class, 'user.role.pagination');
$app->route('/api/user-role[/[{id:\d+}]]', User\Action\RoleRestAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'user.role');
$app->post('/api/user/register', User\Action\RegisterPageAction::class, 'user.register');
$app->get('/api/user/activate/{id:\d+}/{key}', User\Action\ActivationPageAction::class, 'user.activation');

/**
 * Imc Module
 */
//$app->route('/api/lotacao[/{id:\d+}]', Imc\Action\LotacaoAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'lotacao');
//$app->route('/api/microarea[/{id:\d+}]', Imc\Action\MicroareaAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'microarea');
//$app->route('/api/concurso[/{id:\d+}]', Imc\Action\ConcursoAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'concurso');
//$app->route('/api/concurso-file[/{id:\d+}]', Imc\Action\ConcursoArquivoAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'concurso-file');
//$app->route('/api/concurso-info[/{id:\d+}]', Imc\Action\ConcursoInformacaoAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'concurso-info');
//$app->route('/api/candidato[/{id:\d+}]', Imc\Action\CandidatoAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'candidato');
//$app->route('/api/candidato-perfil[/{id:\d+}]', Imc\Action\CandidatoPerfilAction::class, ['GET', 'POST', 'PUT', 'DELETE'], 'candidato-perfil');
//$app->post('/api/candidato-registro', Imc\Action\CandidatoRegistroPageAction::class, 'candidato-registro');
//$app->get('/api/candidato-ativar[/{key}]', Imc\Action\CandidatoAtivarPageAction::class, 'candidato-ativar');
//$app->post('/api/candidato-login', Imc\Action\CandidatoLoginPageAction::class, 'candidato-login');
