<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Manage Students</title>
</head>
<body>

    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Students Section</span>
        <a href="logout.php" style="color: white; text-decoration:none;"><span class="fa fa-sign-out"></span> Logout</a>
    </div>

    <div class="nav">
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="add_classes.php">Add Classes</a></li>
        <li><a href="manage_classes.php">Manage Classes</a></li>
        <li><a href="add_students.php">Add Students</a></li>
        <li><a class="active" href="manage_students.php">Manage Students</a></li>
        <li><a href="add_results.php">Add Result</a></li>
        <li><a href="manage_results.php">Manage Result</a></li>
      </ul>
    </div>
    <div class="main">
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption><img src='images\work-process.png'>&nbspManage Students</caption>
                <tr>
                <th>#</th>
                <th>NAME</th>
                <th>ROLL</th>
                <th>CLASS</th>
                <th>ACTION</th>
                </tr>";
                $cnt=1;
                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo"<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "<td><a href='delete-student.php?rno=".$row['rno']."' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";
                    echo "</tr>";
                 $cnt++; }

                echo "</table>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>


</body>
</html>
