<?php
if (  isset($_POST['nom_client']) AND isset($_POST['prenom_client'])AND isset($_POST['mdp_client'])  AND isset($_POST['telephone_client'])AND isset($_POST['adresse_client'])AND isset($_POST['ville_client']))

{

    $link = mysqli_connect("localhost", "root", "", "projetweb")or die("Impossible de se connecter : " . mysqli_error());

    // Check connection
    if($link === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
    $token = str_shuffle($token);
    $token = substr($token, 0, 10);
    $nom_client=$_POST['nom_client'];
    $prenom_client=$_POST['prenom_client'];
    $mdp_client=$_POST['mdp_client'];


    $password = hash('sha512', $mdp_client);
    //$map=$_POST['map'];
    $telephone_client=$_POST['telephone_client'];
    $adresse_client=$_POST['adresse_client'];
    $ville_client=$_POST['ville_client'];

    $sql="insert into client (nom_client,prenom_client,mdp_client,telephone_client,adresse_client,ville_client,token) VALUES ('$nom_client','$prenom_client','$password','$telephone_client','$adresse_client','$ville_client','$token')";
    if(mysqli_query($link, $sql))
    {
        require_once "../core/phpmailer/class.phpmailer.php";
        $base_url = "http://localhost/inesguizani/core/";
        $message = "<p>Hi ".$_POST['nom_client']." "." ".$_POST['prenom_client'].",</p>
          <p>Thanks for Registration. this account will work only after your email verification.</p>
          <p>Please Open this link to verify your email address - ".$base_url."activer.php?activation_code=".$token."
          <p>Best Regards</p>
          ";

        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = 'yessine.darmoul@esprit.tn';
        $mail->Password = '181JMT1780';
        $mail->SetFrom('admin@esprit.tn', 'admin');
        $mail->AddAddress($_POST['adresse_client']);
        $mail->Subject = 'EMAIL VALIDATION';
        $mail->MsgHTML($message);

        if( $mail->Send()){    echo "<script type='text/javascript'>;
          window.location.replace(\"../core/alert_succes_signin.html\");
      </script>";}
        else{ echo "<script type='text/javascript'>;
          window.location.replace(\"../core/alert_error_signin.html\");
      </script>";}




    }
    else
    {
        ?>

        <?php
        echo "Error: " .$sql. "<br>" . mysqli_error($link)."\n";


    }
    // Close connection
    mysqli_close($link);






}





?>
