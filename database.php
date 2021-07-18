<?php

$mail = $_POST['mail'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$query = $_POST['query'];
 
$conn =new mysqli('localhost','root','','contactdb');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into datacontact(mail,name,subject,message,query)
    values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$mail,$name,$subject,$message,$query);
    $stmt->execute();

    echo "<h1> Data Submitted Successfully</h1>"." </p><br>";
    echo "Mail id :".$mail."<br>";
    echo "Name :".$name."<br>";
    echo "Subject :".$subject."<br>";
    echo "Message :".$message."<br>";
    echo "Query   :".$query."<br>";
    $stmt->close();
    $conn->close();
} 
?>