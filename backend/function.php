<?php
include 'sanitize.php';
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_form']))
{
  $error = 'Working';
  $success = '';
  $first_name_error = '';
  $last_name_error = '';
  $email_error = '';
  $password_error = '';


  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(empty($first_name))
  {
    $first_name_error = 'First name must be filled';
   // return;
  }else if(!preg_match("/^[a-zA-Z-' ]*$/", $first_name))
  {
     $first_name_error = 'Only letters are allowed for first name';
  }

  if(empty($last_name))
  {
    $last_name_error = 'Last name can not be empty';
    //return;
  }else if(!preg_match("/^[a-zA-Z-' ]*$/", $last_name))
  {
     $last_name_error = 'Only letters are allowed for first name';
  }

  if(empty($email))
  {
    $email_error = 'email can not be empty';
    //return;
  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
  {
    $email_error = 'Invalid email address';
  }


  if(empty($password))
  {
    $password_error = 'password can not be empty';
    //return;
  }elseif(strlen($password) < 8)
  {
     $password_error = 'Your password cannot be less than 8';
  }

  if($first_name_error == '' && $last_name_error == '' && $email_error == '' && $password_error =='' )
  {
    $first_name = sanitize($first_name);
    $last_name = sanitize($last_name);
  
    $email =sanitize($email);
    $password = sanitize($password);

    
   

     }


//   if(empty($first_name) || empty($last_name) || empty( $email) || empty($password))
//   {
//     $first_name_error = 'first name must be filled';
//     return;
//   }else
//   {
//     $first_name = sanitize($first_name);
//     $last_name = sanitize($last_name);
  
//     $email =sanitize($email);
//     $password = sanitize($password);

//     if(!preg_match("/^[a-zA-Z-' ]*$/", $first_name)){
        
//       $error = $first_name .' can only be letters or spaces, pls check';
//      echo '<script>alert('.$first_name .'can only be letters or spaces, pls check")</script>';
//      return;
    
//  //   return json_encode(["Message" => $last_name . " can only be letters or spaces, pls check"]);
//     }
//     if(!preg_match("/^[a-zA-Z-' ]*$/", $last_name)){
//       $error = $last_name .' can only be letters or spaces, pls check';
//         //echo '<script>alert('.$last_name .'can only be letters or spaces, pls check")</script>';
//         return;
       
//     //   return json_encode(["Message" => $last_name . " can only be letters or spaces, pls check"]);
//      }

//      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
//       $error = "Invalid email address";
      
//       return;
     
    
//       //   return json_encode(["Message" => "Invalid email address"]);
//     }

//     if(strlen($password) < 8){
//       $error = "Your password must not be less than 8 characters";
      
//       return;
      
//     }


//   }



// }else
// {
//   //echo $error='plss';
// }

}