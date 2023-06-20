<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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
    return view('clients');
});

Route::get('/create', function () {
    return view('create-client');
});

Route::post('/create', function () {
    $creationResult = (new ClientController())->addClient();
    switch ($creationResult) {
        case 'created':
            return redirect('/');
        case 'exists':
            return view('create-client-failed-email');
        case 'failed':
            return view('unknown-error');
    }
});

Route::get('/edit', function () {
    return view('edit-client');
});

Route::post('/edit', function () {
    $updateResult = (new ClientController())->updateClient();
    switch ($updateResult)
    {
        case 'updated':
            return redirect('/');
        case 'email-used':
            return view('edit-client-failed-email');
        case 'unknown':
            return view('unknown-error');
    }
});

Route::get('/delete', function () {
    if ((new ClientController())->deleteClient()) {
        return redirect('/');
    } else {
        return view('unknown-error');
    }
});

Route::get('/clients/{any}', function ($wildcard) {
    switch ($wildcard) {
        //Calling this with Http
        //$request = Illuminate\Support\Facades\Http::get('http://127.0.0.1:8000/clients/get', ['page' => '1', 'pageSize' => '10']);
        case 'get':
            $clientController = new ClientController();
            $clients['total'] = $clientController->getClientCount();
            $clients['clientData'] = $clientController->getClients();
            echo json_encode($clients);
            break;
        case 'count':
            echo json_encode((new ClientController())->getClientCount());
            break;
        case 'specific':
            echo json_encode((new ClientController())->getSpecificClient());
            break;
        default:
            break;
    }
});
