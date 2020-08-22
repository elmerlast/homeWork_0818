<?php

class HomeController extends Controller {
    
    function index() {
        $this->view("Home/index");
    }
    
    function hello($name) {
        $user = $this->model("User");
        $user->name = $name;
        $this->view("Home/hello", $user);
        // echo "Hello! $user->name";
    }
    
}

?>