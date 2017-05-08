<?php

namespace App\Middleware;

class PreviousInput extends Middleware {

    public function __invoke($request, $response, $next){

        $this->container->view->getEnvironment()->addGlobal('previous', $_SESSION['previous']);
        $_SESSION['previous'] = $request->getParams();

        $response = $next($request, $response);
        return ($response);

    }

}