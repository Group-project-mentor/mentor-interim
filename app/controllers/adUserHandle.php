<?php

class AdUserHandle extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/userhandle');
    }

}


?>