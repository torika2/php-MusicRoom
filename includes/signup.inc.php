<?php
class NewClass{
   private $uid;
   private $mail;
   private $pwd;


   public function __construct($uid,$mail,$pwd){
    $this->uid  = $uid;
    $this->mail = $mail;
    $this->pwd  = $pwd;


    $this->insertToDatabase();
   }
   
   private function insertToDatabase(){
        if (isset($this->uid) && isset($this->pwd) && isset($this->mail)) {

            if(filter_var($this->mail,FILTER_VALIDATE_EMAIL)){
            $mysqli = new mysqli("localhost", "root", "", "sqlclasses") or die(mysqli_connect_error());
            if (!empty($this->uid) && !empty($this->pwd) && !empty($this->mail)) {
                $result = $mysqli->query("SELECT * FROM `users` WHERE uid ='$this->uid'");
                $data = $result->fetch_assoc();
                if($this->mail !== $data['mail']){
                    if ($this->uid !== $data["uid"]){

                       $pattern ='/^[-a-zA-Z0-9_\x{30A0}-\x{30FF}'
                 .'\x{3040}-\x{309F}\x{4E00}-\x{9FBF}\s]*$/u';

            if (preg_match($pattern,$this->uid)) { 
                $sql = $mysqli->query("INSERT INTO `users`(`uid`,`mail`,`pwd`) VALUES ('$this->uid','$this->mail','$this->pwd')");
                        ?>
                            <?php require_once 'index.php' ?>
                        <main>
                            <div>
                                <section>
                                    <p>Successfully registered!</p> 
                                </section>
                            </div>
                        </main>
                        <?php
                        require 'footer.php';

            }else{ 
                header("Location:index.php?dontTryThat");
            } 
                       
                    }else{
                        header("Location: index.php?usernameIsNotValid");
                        exit();                
                    }
                }else{
                    header("Location: index.php?emailIsNotValid");
                    mysqli_close($conn);
                }
            }else{
                header("Location: index.php?emptyInputs");
                exit();
            }
        }
        }else{
            header("Location: index.php?inputSignupFields");
            exit();
        }
    }
}

?>