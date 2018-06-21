<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "form1";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
//getting id of the data from url
            $id=$_GET['id'];
            try {
                $sql = "DELETE FROM details WHERE id='$id'";

                // use exec() because no results are returned
                $conn->exec($sql);
                echo 'alert("Record deleted successfully");';
                 header("Location:myphp.php");

                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;
?>