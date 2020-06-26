<?php

class Login {

    private $DB;

    function __construct() {
  
        $this->DB = New DB();
           

    }
    
    private function sesion_register(){

        $tsql="select top (1) Supervisor_ID,PRJ_Code,[Supervisor Users].User_ID,[Supervisor Users].User_Name,[Supervisor Users].User_Position,[Supervisor Users].User_Password,[Supervisor Groups].Group_ID,[Supervisor Groups].Group_Name from Supervisors LEFT JOIN [Supervisor Users] ON [Supervisor Users].User_ID=Supervisors.User_ID LEFT JOIN [Supervisor Groups] ON [Supervisor Groups].Group_ID=Supervisors.Group_ID WHERE [Supervisor Users].User_ID='".trim($_POST['UserName'])."'";
            
        $conn= $this->DB->getConnection('MDB'); // Database where stored user creditionals and other  user information
        $query = $conn->prepare($tsql);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if(!empty($data)){

            unset($data['User_Password']);
            $_SESSION["user"]=(object) $data;
            //header ("Location: ".MAIN_PAGE);
            //exit();
        }else{
            //header ("Location: ".LOGIN_PAGE);
            exit();
        }

    }

    private function sesion_unregister(){

        if(isset($_SESSION["user"])) {
            
            session_destroy();
            unset($_SESSION);
            //header ("Location: ".LOGIN_PAGE);
        }
        
         

    }

    function init(){

        switch(true){

            case  isset($_POST['Logout']) && isset($_SESSION["user"]):
                $this->sesion_unregister();
                die('sesion is not registred  logouted');
               
            case !isset($_SESSION["user"]) && isset($_POST['Login']) && !empty(isset($_POST['UserName'])) && !empty(isset($_POST['Password'])):
                $data = $this->sesion_register();

            case isset($_SESSION["user"])  && count((array)$_SESSION["user"])>2:

                print_r($_SESSION["user"]);

                $this->Role = New Role();
                print_r($this->Role->getUsersProjects());
                //header ("Location: ".MAIN_PAGE);
                break;
            
            
            default:
                die('sesion is not registred');
                //header ("Location: ".LOGIN_PAGE);
            
        }

    }

}


?>