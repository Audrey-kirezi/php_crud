<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h2>All students</h2>
    <a class="btn btn-primary" href="./create.php" role="button">New student</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>password</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $server="localhost";
            $username="root";
            $password ="root";
            $databse ="student_db";

            $connection =new mysqli($server,$username,$password,$databse);
            if($connection ->connect_error){
                die("Connection failed: " .$connection->connect_error);
            }

            $sql = "SELECT *FROM users";
            $result = $connection->query($sql);
            if(!$result){
                die("Invalid query: " .$connection->error);
            }

            while($row = $result->fetch_assoc()){
                echo "   <tr>
                <td>$row[id]</td>
                <td>$row[firstname]</td>
                <td>$row[lastname]</td>
                <td>$row[email]</td>
                <td>$row[password]</td>
                
                <td>
                    <a class='btn btn-primary btn-sm' href='./update.php?id=$row[id]'>Update</a>
                    <a class='btn btn-danger btn-sm ' href='./delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr> ";
            }
            ?>
         
        </tbody>
    </table>
    </div>
</body>
</html>