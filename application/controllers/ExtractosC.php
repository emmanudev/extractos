<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExtractosC extends CI_Controller {

	function __construct() {
        parent::__construct();
        
    }
	public function index()
	{
		$this->load->view('mostrar_extractos');
	}

	public function mostrar()
	{
		return phpinfo(INFO_MODULES);
	}

	public function ssh2()
	{
	  $connection = ssh2_connect("123.45.67.890", 22);
  
      if(!$connection) {
         echo json_encode('Connection failed');
      }
  
      ssh2_auth_password($connection, "root", "passroot");
      $stream = ssh2_exec($connection, "ls -l");
      stream_get_blocking($stream, true);
      $output = "";
      while($line = fgets($stream)) {
          $output .= $line;
      }
      echo json_encode($line);
	}
}
