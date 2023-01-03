<?php 

// Create object User 

class User

{
    // Attribut de la class User en Private 

    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    private $db;

    //Construct User object
    public function __construct()
    {
        // Variables declareé 
        $host="localhost";
        $user_name="root";
        $password="";
        $database="classes";
        
        // this fais reference à lobject courant 
        $this->db =  mysqli_connect($host,$user_name,$password,$database);
        if(!$this->db){
            die("Connexion lost");
        }else{
            echo "Connexion etablie";
        }

    }

    //Methods class User

    // method register

    public function register($login,$password,$email,$firstname,$lastname){

        $this->login=$login;
        $this->password=$password;
        $this->email=$email;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        
        

       

            $bdd_request="INSERT INTO utilisateurs (`login`,`password`,`email`,`firstname`,`lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')";
            var_dump($bdd_request);
            $db_query=mysqli_query($this->db,$bdd_request);

            if($db_query){
                echo "register done";
                header('refresh:3 url=index.php');
            }else{
                echo "register its not done ";
            }


       



    }

    // method connection 
    public function connect($login,$password){
            $this->login=$login;
            $this->password=$password;

            $bdd_connect="SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'";

            $bb_query=mysqli_query($this->db,$bdd_connect);
            $compare_login=mysqli_fetch_all($bb_query);
           
            //var_dump($bb_query);
            //echo "boou";
            echo "<br>";
            if($bb_query){
                echo "bienvenue";
                
                $_SESSION['login']=$login;
                header('location: index.php');
               
                return true;

            }else{
                echo "pas de connection";
                return false;
            }

    }

    // method disconnect
    public function disconnect(){
        session_unset();
        session_destroy();
        header('location: index.php');
    }


    // method delete

    public function delete(){
        $login=$_SESSION['login'];
        $bdd_query_del="DELETE FROM utilisateurs WHERE login='$login'";
        $query_del=mysqli_query($this->db,$bdd_query_del);

        if($query_del){
            echo "<br>";
            echo "supprime de bdd";
            
            
            return true;
        }else{
            echo "profil not delete";
        }



    }

    public function update($login,$password,$email,$firstname,$lastname){
        $this->login=$login;
        $this->password=$password;
        $this->email=$email;
        $this->firstname=$firstname;
        $this->lastname=$lastname;

        $login=$_SESSION['login'];

        $bdd_req_up="UPDATE utilisateurs SET login='$login', password='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE login='$login'";
        $bdd_query_up=mysqli_query($this->db,$bdd_req_up);

        if($bdd_query_up === TRUE)  {
            echo "<br>";
            echo "profil update";

        }else{
            echo "profil no update :(";
        }

    }
}





