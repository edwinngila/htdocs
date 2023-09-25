<?php include("./config/config.php");

$sql = "select * from student";
$result = $db->query($sql);
$students = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" >
        <div>
        <a class="btn btn-success"  href="">Add</a>
        </div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>FIRSTNAME</th>
                <th>LASTNAME</th>
                <th>PHONE NO</th>
                <th>ACTION</th>
            </tr>
            <?php foreach ($students as $student) {?>
                <td><?=$student['id'];?></td>
                <td><?=$student['firstname'];?></td>
                <td><?=$student['lastname'];?></td>
                <td><?=$student['phone_no'];?></td>
                <td>
                    <a class="btn btn-primary" href="">Update</a>
                    <a class="btn btn-danger" href="">Delete</a>
                </td>

            <?php }?>
        </table>
    </div>
</body>
</html>