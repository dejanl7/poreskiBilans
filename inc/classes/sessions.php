<?php 

class Sessions extends Connection {
	public $user;
	public $status = false;

	function __construct(){
		session_start();
		$this->session();
	}

	// Set up Session
	public function session(){
		if( isset($_SESSION['user']) ){
			$this->user = $_SESSION['user'];
			$this->status = true;
		}
		else {
			unset($this->user);
			$this->status = false;
		}
	}

	// Activate session
	public function activate_session($session_key){
		$this->user = $_SESSION['user'] = $session_key;
		$this->status = true;
	}

	// Destroy Session
	public function turnoff_session($user){
		unset( $_SESSION['user'] );
		unset( $this->user );
	}


}

$session = new Sessions();
global $session;



?>