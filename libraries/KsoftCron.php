<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KsoftCron {
    private $login = '';
    private $password = '';
    private $phpExe = '';
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->config("ksoftcron");
        
        $this->login = $this->CI->config->item("login", "ksoftcron");
        $this->password = $this->CI->config->item("password", "ksoftcron");
        $this->phpExe = $this->CI->config->item("phpExePath", "ksoftcron");
    }
    public function setCron($task, $taskname = NULL, $time = NULL) {
        $time || $time = 5;
        $taskname || $taskname = 'My Cron Job title';
        $task = $this->phpExe . $task;
        exec('schtasks /Create /tn "'.$taskname.'" /sc MINUTE /mo '.$time.' /ru "'.$this->login.'" /rp "'.$this->password.'" /tr "'.$task.'"');
    }
    public function runCron() {}
    public function stopCron($id = NULL) {}
    public function delCron($id = NULL) {}
}
