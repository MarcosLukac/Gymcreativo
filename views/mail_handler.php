<?php

if(isset($_POST['submit']))
{
    $UserName = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['cell'];
    $Message = $_POST['message'];
    $to = "marcoslukac@gmail.com";
    $subject = "Consultas desde web GYM Creativo";
    $txt = 'De: ' .$UserName."\n";
    $txt = 'Correo de contacto: ' .$Email."\n"; 
    $txt = 'Celular: ' .$Phone."\n";
    $txt = 'Mensaje: ' .$Message;
    $headers .= "Reply-To: GymCreativo <marcoslukac@gmail.com>\r\n";
    $headers .= "Return-Path: GymCreativo <marcoslukac@gmail.com>\r\n";
    $headers .= "From:  GymCreativo <marcoslukac@gmail.com>\r\n";

    if(empty($UserName) || empty($Email) || empty($Phone) || empty($Message))
        {?>
            <script language="javascript" type="text/javascript">
            alert('Su mensaje no pudo ser enviado. Por favor revise que todos los campos estén completos.');
            window.location.href = 'index.php/#chateamos';
           </script>
           <?php
        }
        else{
            if(mail($to,$subject,$txt,$headers))
            {?>
                <script language="javascript" type="text/javascript">
                alert('Gracias por su mensaje. En breve estaremos respondiendo.');
                window.location.href = 'index.php';
                </script>
                <?php
            }
            else{?>
                <script language="javascript" type="text/javascript">
                alert('Thank you for the message. We will contact you shortly.');
                window.location.href = 'index.html';
                </script>
                <?php
            }
        }
    }
?>
