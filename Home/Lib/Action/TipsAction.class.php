<?php
class TipsAction extends CommonAction {
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->hover = 7;
		$this->display();
	}	
}	