<?php
session_start();
 include("Navbar.php");
 require_once("dbh.php");
 include("index1.php");



?>

<style>
body{
    background: #f8f9fa!important; 



}
.community-discussion{
    display=flex;
    
}

#box input[type=text]{
    padding: 6px;
  margin-top: 12px;
  
  border: 1px solid;
  font-size: 17px;
  width:55%;
  height:180;
 position:absolute;
 right:280;
}
#details{
    float:left;
    width:50%;
}

 .community-discussion button{
    background-color: #3c3b3f;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  position:absolute;
  right:100;
  top:200;
}
</style>
<br>



<h4 style="text-align:center">Community discussion page</h4>

<div class="community-discussion">
   

    <div id ="box">
        <form method="POST">
            <input type="text" placeholder="Write something to the forum" name="discussion" style="font-family:Lato">
            <button type="submit" style="font-family:Lato">Post</button>
        </form>
    </div>

</div>
<br><br><br><br><br><br><br><br><br><br><br>

<?php
if (isset($_POST['discussion'])){
    $conn = Open_Connection();
    $discuss=$_POST['discussion'];
    if(!empty($_SESSION['login_user'])==null){
        echo "<p style='text-align:center'>";
        echo "Please login to post a comment";
        
    }
    else{

    $sql=" INSERT INTO discussion (d_content, d_name) VALUES ('$_POST[discussion]', '$_SESSION[login_user]')";
    $result = mysqli_query($conn, $sql);
    
    if ($result>0) {
        $date_clicked = date('Y-m-d H:i:s');;
        echo "<h3>Forum last updated on: </h3> $date_clicked";
        echo "<hr>";
        $mysql="SELECT * FROM discussion";
        $myresult = mysqli_query($conn, $mysql);
       
        if($myresult->num_rows> 0){
        while ($row = mysqli_fetch_assoc($myresult)){
        echo "<div>
        <h3> ".$row['d_name']." posted to the forum:</h3> <h4>".$row['d_content']."</h4>
        </div>";
        
        
        echo "<hr>";
    }
}
    else{
        echo"failed";
    }
    }
    else{
        echo"Failed11";
    }
}
}
?>
