<?php
include "db.php";
  
$server_time=date("Y-m-d H:i:s");

if(isset($_POST['text'])){

$msg=mysqli_real_escape_string($conn,$_POST["text"]);

$query=mysqli_query($conn,"SELECT c_ans FROM chat WHERE c_qn RLIKE '[[:<:]]".$msg."[[:>:]]'");
$count = mysqli_num_rows($query);

    if($count=="0"){
      
        $data = "I am Sorry but I am not exactly clear how to help you";
        $query4=mysqli_query($conn,"insert into chats(user,chatbot,date)values('$msg','$data','$server_time')");
      
    }else{
        while($row = mysqli_fetch_array($query)){
              
                $data= $row['answer'];
              
                $query4=mysqli_query($conn,"insert into chats(user,chatbot,date)values('$msg','$data','$server_time')");
            }
        }
}