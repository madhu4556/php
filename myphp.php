  <!Doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>php file</title>
    </head>
    <body>
      <?php
      $username = "root";
      $password = "root";
      $host = "localhost";
    $dbname = "form1";
    
//check connection
try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $id=$_POST['id'];
   $name=$_POST['name'];
   $email=$_POST['email'];

   $hobbies=$_POST['hobbies'];
   
   $gender=$_POST['gender'];

   $password=$_POST['password'];
   $creation_time=date('jS F g:i A');
   $last_update=date('jS F g:i A');

   
   $sql = "INSERT INTO details (id,name, email, hobbies,gender, password,creation_time,last_update)
   VALUES ( '$id','$name','$email','$hobbies','$gender','$password','$creation_time','$last_update')";
   //use exec() because no results are returned
   $conn->exec($sql);
   echo "New record created successfully";
   echo "Connected successfully";
   
}
catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
}
$conn=null;
?>
<?php
$id=$_GET["id"];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "form1";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM details;"); 
                $stmt->execute();
                // set the resulting array to associative
                //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
?>
<table >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>hobbies</th>
                        <th>gender</th>
                        <th>password</th>
                        <th>creation_time</th>/myphp.php
                        <th>last_update</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php while( $result = $stmt->fetch()) : ?>
                    <tr>
                        <td><a href="<?php echo 'display.php?id='.$result['id'] ?>"><?php echo $result['id']; ?></a></td>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['hobbies']; ?></td>
                        <td><?php echo $result['gender']; ?></td>
                        <td><?php echo $result['password']; ?></td>
                        <td><?php echo $result['creation_time']; ?></td> 
                        <td><?php echo $result['last_update']; ?></td>
                        <td>
 
                        <td> <a href="<?php echo 'delete.php?id='.$id ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                                                        
                         </td>
                         <td><a href="<?php echo 'update.php?id='.$id ?>"> update</a></td>      
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>  
<?php

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "form1";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $count = $conn->query("SELECT count(1) FROM details")->fetchColumn();
  
  echo "total number of records entered:".$count;
?>

    </body>
    </html>