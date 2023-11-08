<?php
$_SESSION['Error'] = "Please enter a valid phone number.";
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $message = $_POST['message'];
  if(!empty($nom) && !empty($email) && !empty($phone)){
    if(filter_var($phone, FILTER_SANITIZE_NUMBER_INT)){
      $receiver = "jalalnarajil2829@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "Nouvelle Course :";
      $body = " Nom : $nom\n\n Email :$email\n\nDate:$date\n\nPhone:$phone\n\n Détails de course :$message ";
      
      if(mail($receiver, $subject, $body)){
        header("location: thankyou.php");
         header("Refresh:5;url=index.php");
      }else{
         echo "Sorry, failed to send your message!";
         header("Refresh:5;url=index.php");
      }
    }else{
      
      if( isset($_SESSION['Error']) )
{
        echo $_SESSION['Error'];

        unset($_SESSION['Error']);

}
    }
  }else{
    echo "Please, fill all the fields.";
    
  }
  
?>