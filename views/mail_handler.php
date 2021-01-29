<?php 

    if(isset($_POST['submit']))
    {
       $UserName = $_POST['name'];
       $Phone = $_POST['tel'];
       $Email = $_POST['email'];
       $Subject = 'Contacto desde WEB Gym Creativo';
       $Msg = $_POST['message'];

       if(empty($UserName) || empty($Email) || empty($Phone) || empty($Msg))
       {
           header('location:index.php/#chateamos?error');
       }
       else
       {
           $to = "marcoslukac@gmail.com";

           if(mail($to,$Subject,$Msg,$Email))
           {
               header("location:index.php/#chateamos?success");
           }
       }
    }
    else
    {
        header("location:index.php/#chateamos");
    }
?>