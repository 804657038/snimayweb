<?php
class JoinAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        $this->display(':joinUs');
    }
}