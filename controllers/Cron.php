<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('ksoftcron'));
    }
    public function index() {
		$this->ksoftcron->setCron("http://www.codeigniter.com", NULL, NULL);
    }
}