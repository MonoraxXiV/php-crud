<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher registration</title>
</head>
<body>
<div class="container">
<form method="get">
    <table id ='customers'>
        <tbody>
        <td>ID</td>
        <td>NAME</td>
        <td>EMAIL</td>
        <td>CLASS</td>
        <td>PROFILE</td>
        <?php foreach ($showTeachers as $Teacher): ?>
            <tr>
                <td><?php echo $Teacher['teacher_id'] ?></td>
                <td><?php echo $Teacher['teacher_name'] ?></td>
                <td><?php echo $Teacher['teacher_email']  ?></td>
                <td><?php echo $Teacher['teacher_class']  ?></td>
                <td><a href="?teacher=<?=$Teacher["teacher_id"]?>"><button type="button" name="TeacherId" class="btn btn-primary">Profile</button></td></a>
                <td><button type="submit" name="editTeacherRow" class="btn btn-primary">Edit</button></td>
                <td> <button type="submit" name="deleteTeacherRow" class="btn btn-primary">Delete</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form> <br>
<form  method="post">
    <button type="submit" name="addNewTeacher" class="btn btn-primary">Add Teacher</button>
    <button type="submit" name="backToMain" class="btn btn-primary">Go Back To Main Page</button>
</form>
</div>
<style>
    .container {
        width: 50%;
    }
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
</style>

</body>
</html>
