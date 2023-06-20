<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;

class ClientController extends Controller
{
    public function addClient(): string
    {
        $request = request();
        try {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email'
            ]);

            return (Client::createNewClient(
                $request->first_name,
                $request->last_name,
                $request->email,
                $request->company,
                $request->position,
                $request->phone1,
                $request->phone2,
                $request->phone3));
        } catch (Exception $e) {
            return 'exception';
        }
    }

    public function getClients(): array
    {
        $request = request();
        try {
            $this->validate($request, [
                'page' => 'required',
                'pageSize' => 'required',
            ]);
            return Client::getClients(
                $request->page,
                $request->pageSize);
        } catch (Exception $e) {
            return ['exception' => $e];
        }
    }

    public function getClientCount(): int
    {
        return Client::getClientCount();
    }

    public function deleteClient(): bool
    {
        $request = request();
        try {
            $this->validate($request, [
                'email' => 'required'
            ]);
            return Client::deleteClient($request->email);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getSpecificClient(): array
    {
        $request = request();
        try {
            $this->validate($request, [
                'email' => 'required|email'
            ]);
            return Client::getSpecificClient($request->email);
        } catch (Exception $e) {
            return [];
        }
    }

    public function updateClient(): string
    {
        $request = request();
        try {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'oldEmail' => 'required|email'
            ]);

            return Client::updateClient(
                $request->first_name,
                $request->last_name,
                $request->oldEmail,
                $request->email,
                $request->company,
                $request->position,
                $request->phone1,
                $request->phone2,
                $request->phone3);
        } catch (Exception $e) {
            return 'exception';
        }
    }
}
