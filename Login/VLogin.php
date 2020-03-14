<?php
class VLogin{
    protected $request;
public function __construct($request)
{
    $this->request = $request;
}
    public function verificar():bool{
         $email=$_POST['email']??null;
         $password=$_POST['pass']??null;
        if($email=='joseph.rd09@gmail.com' && $password=='1234' ){
           return  false;
      
          }else{
             return true;
             header('Location: index.php');
          }
  }
    }
?>

