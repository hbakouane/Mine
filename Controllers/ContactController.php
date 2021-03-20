<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;

class ContactController extends Controller
{
    public function index()
    {
        $params = [
            'name' => 'Haytam Bakouane',
            'age' => 18
        ];
        return $this->render('contact', $params);
    }

    public function handleContact(Request $request)
    {
        echo "<pre>";
        var_dump($request->getBody());
        echo "</pre>";
    }
}