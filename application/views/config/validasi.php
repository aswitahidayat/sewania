<?PHP

error_reporting(0);

if($_SESSION['login'] == true){
   $user = mysql_fetch_array(mysql_query("select * from member where token_id = '$_SESSION[token_id]'"));
   $nama = $user['first_name'];
   $last = $user['last_name'];
   $email = $user['email'];
   $phone = $user['phone'];
   $about = $user['about_you'];
   $type = $user['type'];
   $token = $user[12];
   
   if($user['gender'] == 'L'){
   $kelamin = "Laki - Laki";
   }
   else{
   $kelamin = "Perempuan";
   }
   
}

?>