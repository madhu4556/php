<!DOCTYPE html>
<html lang="en">
<!-- Start of head section-->

    <body>
        <form action="" method="POST">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname= "form1";
            $tablename= "details";
            //check connection
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            try {
                $id=$_GET['id'];
                $stmt = $conn->prepare("SELECT * from details where id='$id';"); 
                $stmt->execute();

                // set the resulting array to associative
                //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetch();
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo $result['id']; ?></td>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['hobbies']; ?></td>
                        <td><?php echo $result['gender']; ?></td>
                        <td><?php echo $result['password']; ?></td>
                    </tr>
                </tbody>
            </table>    
        </form>
    </body>

</html>