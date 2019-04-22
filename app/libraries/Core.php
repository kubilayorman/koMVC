<?php 
/*
* App Core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
*/


class Core {

    protected $currentController = "Pages";
    protected $currentMethod     = "index";
    protected $params            = [];

    public function __construct() {

        $url = $this->getUrl();

        // Look in controllers for first value (i.e the /controller)
        if(file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        // Require the necessary controller - which will in turn talk to necessary model & view
        require_once "../app/controllers/" . $this->currentController . ".php";

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of the URL  (i.e the /the method)
        if(isset($url[1])) {
            // Check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                
                unset($url[1]);
            }
        }

        // Get params and align as array beginning from index 0
        $this->params = $url ? array_values($url) : [];
        //$thearray = $this->params;

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if (isset($_GET["url"])) {

            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);

            return $url;
        }
    }

}


?>