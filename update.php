
    

<?php
// including the database connection file
include_once("myphp.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
   
    $name=$_POST['name'];
   
    $email=$_POST['email'];    
    $hobbies=$_POST['hobbies'];
    $hobbies=$_POST['gender'];
    $hobbies=$_POST['password'];
    // checking empty fields
    if(empty($name) || empty($email) || empty($hobbies)|| empty($gender) ||  empty($password) ) {    
            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($hobbies)) {
            echo "<font color='red'>hobbies field is empty.</font><br/>";
        }        
        if(empty($gender)) {
            echo "<font color='red'>gender field is empty.</font><br/>";
        }     
        if(empty($password)) {
            echo "<font color='red'>password field is empty.</font><br/>";
        }     
    } else {    
        //updating the table
        $sql = "UPDATE details SET  name=:name, email=:email hobbies=:hobbies gender=:gender password=:password WHERE id=:id";
        $query = $dbConn->prepare($sql);
                
       
        $query->bindparam(':name', $name);
        $query->bindparam(':email', $email);
        $query->bindparam(':email', $email);
        $query->bindparam(':email', $email);
        $query->bindparam(':email', $email);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: myphp.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM details WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    
    $name = $row['name'];
    $email = $row['email'];
    $hobbies = $row['hobbies'];
    $gender = $row['gender'];
    $password = $row['password'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <form  action="update.php" method="POST" >
        <div class="field">
            <label class="label">id</label>
            <div class="control">
              <input class="input" name="id" type="text" value=<?php echo $_GET['id'];?>></td> required placeholder="Text input" >
            </div>
          </div>
        <div class="field">
            <label class="label">name</label>
            <div class="control">
              <input class="input" name="name" value="<?php echo $name;?>" type="text" required placeholder="Text input" >
            </div>
          </div>
         
          
          <div class="field">
            <label class="label">email</label>
            <div class="control">
              <input class="input" name="email" value="<?php echo $email;?>" type="email" required placeholder="Text input">
            </div>
          </div>
          
          <div class="field">
            <label class="label">Hobbies</label>
            <div class="control">
              <textarea class="textarea" name="hobbies" value="<?php echo $hobbies;?>" required placeholder="Textarea"></textarea>
            </div>
     
      <div class="field">
        <div class="control">
          <label class="label">Gender</label>
          <label class="radio">
            <input type="radio" name="gender" value="<?php echo $gender;?>">
            male
          </label>
          <label class="radio">
            <input type="radio" name="gender" value="<?php echo $gender;?>">
           female
          </label>
        </div>
      </div>
    </div>
    <div class="field">
      <label class="label">Password</label>
      
        <input class="input" name="password" type="password" value="<?php echo $password;?>" required placeholder="input password">
        
      </div>
      
    </div>
      <div class="field is-primary">
        <div class="control">
         <input type="submit" class="button" value="submit"/>
          </div>
      </div>
      
    </form>
    </body>
    </html>