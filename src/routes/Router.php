<?php

# More details about this class in the following link published by John O. Paul:
# https://medium.com/the-andela-way/how-to-build-a-basic-server-side-routing-system-in-php-e52e613cf241

class Router
{
  private $request;
  private $supportedHttpMethods = array(
    "GET",
    "POST"
  );

  function __construct(IRequest $request)
  {
   $this->request = $request;
  }

  function __call($name, $args)
  {

    list($route, $method) = $args;

    if(!in_array(strtoupper($name), $this->supportedHttpMethods))
    {
      $this->invalidMethodHandler();
    }

    $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
  }

  /**
   * Removes trailing forward slashes from the right of the route.
   * @param route (string)
   */
  private function formatRoute($route)
  {
    $result = rtrim($route, '/');
    if ($result === '')
    {
      return '/';
    }

    $result = explode('?', $result, 2)[0];

    return $result;
  }

  private function invalidMethodHandler()
  {
    header("{$this->request->serverProtocol} 405 Method Not Allowed");
  }

  private function defaultRequestHandler()
  {
    header("{$this->request->serverProtocol} 404 Not Found");
  }

  /**
   * Resolves a route
   */
  function resolve()
  {    
    $methodDictionary = $this->{strtolower($this->request->requestMethod)};    
    $formatedRoute = $this->formatRoute($this->request->requestUri);
          
    /*
    This modification was made by me, anfer86, to handle with
    routes that not exist    
    */    
    if (!in_array($formatedRoute, array_keys($methodDictionary) )){
      $this->defaultRequestHandler();
      return;
    }
  
    $method = $methodDictionary[$formatedRoute];

    if(is_null($method))
    {
      $this->defaultRequestHandler();
      return;
    }

    echo call_user_func_array($method, array($this->request));
  }

  function __destruct()
  {
    $this->resolve();
  }
}