<?php 
if(isset($_POST['submit'])){
    $to = "marcoslukac@gmail.com"; // Acá va la casilla de Gym Creativo
    $from = $_POST['email']; // Email del usuario
    $name = $_POST['name'];
    $cellphone = $_POST['cell'];
    $subject = "Consulta desde WEB GymCreativo";
    //$subjec2t = "Copia de su consulta desde WEB GymCreativo";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    //$message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "De:" . $from;
    //$headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); para mandar una copia al usuario
    echo "Mensaje enviado. Muchas gracias " . $first_name . ", dentro de poco estaremos en contacto.";
    }
?>