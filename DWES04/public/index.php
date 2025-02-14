<?php

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/AthleteController.php';

$url = $_SERVER['QUERY_STRING'];

$urlParams = explode('/', $url);

$urlArray = [
    'path' => $url,
    'metodo' => $_SERVER['REQUEST_METHOD'],
    'controller' => '',
    'action' => "",
    'params' => $urlParams[3] ?? null
];

$router = new Router();

$router->add('/atleta/get', [
    'controller' => 'AthleteController',
    'action' => 'getAll'
    ]
);
$router->add('/atleta/get/{id}', array(
    'controller' => 'AthleteController',
    'action' => 'getById'
    )
);
$router->add('/atleta/getbyclub/{id}', array(
    'controller' => 'AthleteController',
    'action' => 'getByClubId'
    )
);


$router->add('/atleta/create', array(
    'controller' => 'AthleteController',
    'action' => 'create'
    )
);

$router->add('/atleta/update/{id}', array(
    'controller' => 'AthleteController',
    'action' => 'update'
    )
);

$router->add('/atleta/delete/{id}', array(
    'controller' => 'AthleteController',
    'action' => 'delete'
    )
);

$params = [];

if ($urlArray['metodo'] === 'GET') {
    $params[] = intval($urlArray['params']) ?? null;

} elseif ($urlArray['metodo'] === 'POST') {
    $json = file_get_contents('php://input');
    $json = json_decode($json, true);
    $params[] = $json;

} elseif ($urlArray['metodo'] === 'PUT') {
    $id = intval($urlArray['params']) ?? null;
    $json = file_get_contents('php://input');
    $json = json_decode($json, true);
    $params = [$id, $json];

} elseif ($urlArray['metodo'] === 'DELETE') {
    $params[] = intval($urlArray['params']) ?? null;
}


if ($router->match($url)) {
    $urlArray['controller'] = $router->getParams()['controller'];
    $urlArray['action'] = $router->getParams()['action'];

    $controllerInstance = new $urlArray['controller']();
    call_user_func_array([$controllerInstance, $urlArray['action']], $params);
} else {
    header('Content-Type: application/json');
    http_response_code(404);
    $response = [
        'status' => 'NO SUCCES',
        'codigo' => 404,
        'mensaje' => 'ruta no encontrada',

    ];
    
    echo json_encode($response, JSON_PRETTY_PRINT);
    
};
