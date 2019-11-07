<?php
session_start();
class LoginUsers{
    private $mail;
	private $pwd;

	public function __construct($mail,$pwd){
        $this->mail = $mail;
        $this->pwd  = $pwd;
        

        $this->logtoin();
	}

	private function logtoin(){
		if (isset($this->mail) && isset($this->pwd)) {
            $mysqli = new mysqli("localhost", "root", "", "sqlclasses") or die(mysqli_connect_error());
            if (!empty($this->mail) && !empty($this->pwd)) {  
                $result = $mysqli->query("SELECT * FROM `users` WHERE mail ='$this->mail' AND pwd = '$this->pwd'");
                        $data = $result->fetch_assoc();
                    if ($this->mail == $data["mail"] && $this->pwd == $data['pwd']){
                        $_SESSION['pwd']  = $this->pwd;
                        $_SESSION['mail'] = $this->mail;
                        $_SESSION['dataPWD'] = $data['pwd'];
                        $_SESSION['dataMAIL'] = $data['mail'];
                        $_SESSION['uid'] = $data['uid'];
        require_once "loggedIN.php";    
header("Location:home.php");
        require "footer.php";
?>
                    <?php
                    }else{
                        header("Location: index.php?incorrectfields");
                        exit();                
                    }
            }else{
                header("Location: index.php?emptyfields&open=");
                exit();
            }
        }else{
            header("Location: index.php?inputfields");
            exit();
        }
	}
}
?>