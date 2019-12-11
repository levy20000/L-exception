<?php  

include "reclamation.php";

	 $recl=new reclamation();
	$msg=$recl->traiter($_POST["IDSUP"]);
	if($msg='ok')
	{
            require_once "phpmailer/class.phpmailer.php";
            $message = "<p>cher client,</p>
      <p> nous vous informons que votre reclamation a été traitée</p>
 <p> nous vous contacterons dans les plus brefs délais </p>
      <p>meilleures salutations</p>
  ";





            $mail = new PHPMailer(true);


            $mail->IsSMTP();


            $mail->SMTPDebug = 0;


            $mail->SMTPAuth = true;

// sets the prefix to the server
            $mail->SMTPSecure = 'tls';


            $mail->Host = 'smtp.gmail.com';


            $mail->Port = 587;



            $mail->Username = 'meriem.khattat@esprit.tn';


            $mail->Password = '181JFT3114M';


            $mail->SetFrom('meriem.khattat@esprit.tn', 'meriem');


            $mail->AddAddress($_POST["email"]);
            $mail->Subject = 'Reclamation';

//
            $mail->MsgHTML($message);




            if( $mail->Send()){

                ?>
                <script type=""> location.replace("succes_modification.html");</script>
                <?php
            }
            else
            {
                echo 'error';
            }}
        ?>