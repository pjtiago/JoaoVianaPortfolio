<?php

   class Message{
      public $content;
   }

   class AccessDb{


    public function __construct(){
      $this->message = new Message();
      $this->message->content;

      include_once '../connection/connection_db.php';

      if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['mensagem'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $query = "INSERT INTO mensagens(username,email,mensagem) VALUES ('".$username."','".$email."','".$mensagem."')";
        $conn->query($query);
        $this->message->content = "Message Send";

        $conn = null;
        header("Location: http://localhost/portfolio-pjota-master/");
       
      }else{
        $this->message->content = "Message Fail";
      }
    }

    public function toJSON(){
     return json_encode($this->message);         
    }
  }

   $obtem = new AccessDb();

   echo ($obtem->toJSON());

?>