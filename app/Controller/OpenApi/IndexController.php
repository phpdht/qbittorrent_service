<?php

namespace App\Controller\OpenApi;

use App\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        $user   = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method'  => $method,
            'message' => "Hello {$user} this is OpenApi.",
        ];
    }
}
