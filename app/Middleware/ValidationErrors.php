<?php

namespace App\Middleware;

class ValidationErrors extends Middleware
{

    public function __invoke($requset, $response, $next)
    {
        //echo('Middleware');
        if(isset($_SESSION['errors'])){
			$this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
			unset($_SESSION['errors']);
		}

        $response = $next($requset, $response);
        return $response;
    }
}
