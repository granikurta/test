<?php

namespace routes;

class Router
{
    private $baseController = 'IndexController';
    private $baseModel = 'IndexModel';
    private $baseAction = 'index';

    public function newRoute(string $route, string $controller)
    {
        $params = [];
        $paramKey = [];
        $indexNum = [];
        preg_match_all("/(?<={).+?(?=})/", $route, $paramMatches);
        $route = preg_replace("/(^\/)|(\/$)/", "", $route);
        $requestUrl = preg_replace("/(^\/)|(\/$)/", "", $_SERVER['REQUEST_URI']);
        if (empty($paramMatches[0])) {
            //without params
        }
        foreach ($paramMatches[0] as $key) {
            $paramKey[] = $key;
        }
        $uri = explode("/", $route);
        $requestUrl = preg_replace("/\?.*/", '', $requestUrl);

        foreach ($uri as $index => $param) {
            if (preg_match("/{.*}/", $param)) {
                $indexNum[] = $index;
            }
        }
        $requestUrl = explode('/', $requestUrl);
        foreach ($indexNum as $key => $index) {
            if (empty($requestUrl[$index])) {
                return;
            }

            $params[$paramKey[$key]] = $requestUrl[$index];

            $requestUrl[$index] = "{.*}";
        }
        $requestUrl = implode("/", $requestUrl);
        $requestUrl = str_replace("/", '\\/', $requestUrl);

        if (preg_match("/$requestUrl/", $route)) {

            $includeFile = explode('@', $controller);
            $controllerNamespace = CONTROLLER_PATH_NAMESPACE . $includeFile[0];
            call_user_func_array([new  $controllerNamespace, $includeFile[1]], $params);
        }
    }
}