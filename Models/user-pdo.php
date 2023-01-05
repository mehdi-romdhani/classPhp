<!-- Create classUser PDO  -->
<?php


class UserPdo
{
    //Attribut de class UserPdo 

    private $id;//avec private les proprietes sont accesibles que à linterieur de class
    public $login;// avec public elles sont accesibles à linterieur & exterieur de la class
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    private $connect_bdd;


    public function __construct()
    {
        $dsn='mysql:dbname=classes;host=127.0.0.1';
        $user='root';
        $password='';

        try{

            $this->connect_bdd=new PDO($dsn,$user,$password);
            //echo " connexion etablie ";
            echo "<br>";
            echo "<hr>";
            
        }catch(PDOException $e){
            echo " echec connexion bdd " .$e->getMessage();
        }
        

    }

    public function register($login,$password,$email,$firstname,$lastname){
        
        $this->login=$login;
        $this->password=$password;
        $this->email=$email;
        $this->firstname=$firstname;
        $this->lastname=$lastname;

        $req_check_login="SELECT * FROM utilisateurs WHERE login= :login";
        $check_login=$this->connect_bdd->prepare($req_check_login);
        // le faite des binder des valeurs est de lier les valeurs ou variables à nos marqueurs 
        $check_login->bindParam(':login',$login);

        $check_login->execute();
        //echo $check_login->rowCount();

        if($check_login->rowCount() == 0){
           
             $req_prepare=$this->connect_bdd->prepare("INSERT INTO utilisateurs(login,password,email,firstname,lastname) VALUES(?,?,?,?,?)");
             $req_prepare->execute(array($this->login,$this->password, $this->email,$this->firstname,$this->lastname));
            
            echo "enregistrer ";
            header('location: connexion.php');

         } else { 

           
           echo"user existe";
         }

   
    }

    public function Connect($login,$password){
        
        $this->login=$login;
        $this->password=$password;
        //$mess_error='';

        $req=$this->connect_bdd->prepare('SELECT * FROM utilisateurs WHERE login=:login AND password=:password');
        $req->bindParam(':login',$login);
        $req->bindParam(':password',$password);
        $req->execute();
        //$fetch=$req->fetchAll(PDO::FETCH_ASSOC);

        
        if($req->rowCount() != 0){
                    
            $_SESSION['login']=$login;
            header('location: index.php');
        } else { 

         echo "user doesnt exist , please sign in :)";

        }
        
        
    }

    public function disconnect(){

            session_unset();
            session_destroy();
            header('location: index.php');
    }

    public function delete(){
        $login=$_SESSION['login'];
        $req=$this->connect_bdd->prepare("DELETE FROM utilisateurs WHERE login=:login");
        $req->bindParam(':login',$login);
        $check=$req->execute();

        if($check==true){

            echo "profil delete";
            session_unset();
            session_destroy();
            header('location: inscription.php');
            
        }else{
            echo "profil not delete";
        }


    }

    public function update($login,$password,$email,$firstname,$lastname){
        $this->login=$login;
        $this->$password=$password;
        $this->email=$email;
        $this->firstname=$firstname;
        $this->lastname=$lastname;

        $login=$_SESSION['login'];

        $req_del_prepare=$this->connect_bdd->prepare("UPDATE utilisateurs SET login=:login, password=:password, email=:email, firstname=:firstname,lastname=:lastname");
        $req_del_prepare->bindParam(':login',$login);
        $req_del_prepare->bindParam(':password',$password);
        $req_del_prepare->bindParam(':email',$email);
        $req_del_prepare->bindParam(':firstname',$firstname);
        $req_del_prepare->bindParam(':lastname',$lastname);

        $req_del_prepare->execute();
        echo "profil upd";
   
    }

    public function isConnected(){

        if(isset($_SESSION['login'])){
            echo "<br>";
            echo 'Votre etes connecté en tant que ' . ucwords($_SESSION['login']) ;
            echo "<br>";
            global $isConnected;
            return $isConnected=true;

        }
    }

    public function getAllInfos(){

        if(isset($_SESSION['login'])){

            $login=$_SESSION['login'];

            $req=$this->connect_bdd->prepare("SELECT * FROM utilisateurs WHERE Login='$login'");
            $req->execute();
            $fetch=$req->fetchAll(PDO::FETCH_ASSOC);
            
          
            //var_dump($fetch);
            foreach($fetch as $f){
                echo "votre login est " . $f['login'];
                echo "<br>";
                echo "votre password est ". $f['password'];
                echo "<br>";
                echo "votre firstname est ". $f['firstname'];
                echo "<br>";
                echo "votre lastname est " . $f['lastname'];
                echo "<br>";
                echo "votre email est " . $f['email'];
                echo "<hr>";
                
            }

        }
    }

    public function getLogin(){
        if(isset($_SESSION['login'])){
            $login=$_SESSION['login'];
            $req=$this->connect_bdd->prepare("SELECT login FROM utilisateurs where login='$login'");
            // use bindParam
            //$req->bindParam(':nom',$login);
            $req->execute();
            $fetch=$req->fetchAll(PDO::FETCH_ASSOC);

            foreach($fetch as $f){
                echo "votre login est : ".$f['login'];
                echo "<hr>";
            }
        }
    }

    public function getEmail(){
        if(isset($_SESSION['login'])){
            $login=$_SESSION['login'];
            $req=$this->connect_bdd->prepare("SELECT email FROM utilisateurs where login='$login'");
            // use bindParam
            //$req->bindParam(':nom',$login);
            $req->execute();
            $fetch=$req->fetchAll(PDO::FETCH_ASSOC);

            foreach($fetch as $f){
                echo "votre email est : ".$f['email'];
                echo "<hr>";
            }
        }
    }

    public function getFirstName(){
        if(isset($_SESSION['login'])){
            $login=$_SESSION['login'];
            $req=$this->connect_bdd->prepare("SELECT firstname FROM utilisateurs where login='$login'");
            // use bindParam
            //$req->bindParam(':nom',$login);
            $req->execute();
            $fetch=$req->fetchAll(PDO::FETCH_ASSOC);

            foreach($fetch as $f){
                echo "votre firstname est : ".$f['firstname'];
                echo "<hr>";
            }
        }
    }

    public function getLastName(){
        if(isset($_SESSION['login'])){
            $login=$_SESSION['login'];
            $req=$this->connect_bdd->prepare("SELECT lastname FROM utilisateurs where login='$login'");
            // use bindParam
            //$req->bindParam(':nom',$login);
            $req->execute();
            $fetch=$req->fetchAll(PDO::FETCH_ASSOC);

            foreach($fetch as $f){
                echo "votre lastname est : ".$f['lastname'];
                echo "<hr>";
            }
        }
    }


}
