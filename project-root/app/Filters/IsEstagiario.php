<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsEstagiario implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');

        if(session()->get('isEstagiario') == 1 && $uri->getSegment(2) != 'Estagiario') {
            return redirect()->to('/Home/Estagiario');
        } else if (session()->get('isEstagiario') == 0 && $uri->getSegment(2) != 'Empresa'){
            return redirect()->to('/Home/Empresa');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}