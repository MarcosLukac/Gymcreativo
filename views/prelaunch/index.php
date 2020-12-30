<?php

use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ . '/vendor/autoload.php';

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();

        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'd5g6bc7a7dd6c7';
        $mail->Password = '27f211b3fcad87';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        $mail->setFrom($email, 'Mailtrap Website');
        $mail->addAddress('piotr@mailtrap.io', 'Me');
        $mail->Subject = 'New message from your website';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;

        echo $body;
        if($mail->send()){

            header('Location: thank-you.html'); // redirect to 'thank you' page
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Creativo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/ce17e9ddbf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">    
</head>
<body>
    <header id="header-wip">
        <div id="encabezado-wip">
            <img class="encabezado-logo-imagen" src="public/design/logo-horizontal-fondo-oscuro-chato.png" alt="Logo Gym Creativo" style="width: 90%;">
        </div>

        <div id="content-wip">
            <section id="prepare">
                <div>
                    <h2 class="titulos white-text">Estamos trabajando en nuestro nuevo sitio</h2>
                    <p class="white-text">Dentro de poco vas a poder conocer todo lo que tenemos para ofrecerte!</p>
                </div>
                <div class="gym-creativo-imagen">
                    <img src="public/images/lightbulb.png" class="lightbulb-wip rocket">    
                </div>
            </section>
            <section id="chateamos-wip" class="chateamos-wip">

                <div class="chateamos-content">
                    <h3 class="titulos white-text">Charlemos</h3>
                    <div class="charlemos-wip">
                        <div class="redes-wip">
                        <p>Si tenés dudas o querés mas información, ¡escribime!</p>
                        <a href="https://www.instagram.com/gymcreativo/" class="footer-links" target="blanck"><i class="fab fa-instagram fa-lg white-text"></i></a>
                        <a href="https://wa.me/5491160186557" class="footer-links" target="blanck"><i class="fab fa-whatsapp fa-lg white-text"></i></a>    
                        <a href="https://www.linkedin.com/in/santiago-caranza-256723bb/" class="footer-links" target="blanck"><i class="fab fa-linkedin fa-lg white-text"></i></a>
                        </div>
                        <form action="index.html" method="post" class="form-y-boton">
                            <div >
                                    <input class="chateamos-input" type="text" name="name" id="name" placeholder="Nombre:">
                                    <input class="chateamos-input" type="tel" name="cell" id="cell" placeholder="Celular:">
                                    <input class="chateamos-input" type="email" name="email" id="email" placeholder="E-mail:">
                                    <textarea class="chateamos-input" name="message" id="chateamos-message" cols="30" rows="6" placeholder="Mensaje:"></textarea>
                                    <p>
                                        <button class="g-recaptcha chateamos-boton" type="submit" value="Enviar" data-sitekey="your site key" data-callback='onRecaptchaSuccess'>Submit</button>
                                    </p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>  
    </header>
   

    <script src="jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: {allowEmpty: false}
          },
          email: {
              presence: {allowEmpty: false},
              email: true
          },
          message: {
              presence: {allowEmpty: false}
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);

      function onRecaptchaSuccess () {
          document.getElementById('contact-form').submit()
      }
  </script>

</body>
</html>