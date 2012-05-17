<?php

class Logout extends Controller{
    function index(){
    }

    public function pre() {
        $this->alert("Logged out!", "success");
        $this->redirect("");
    }
}
?>
