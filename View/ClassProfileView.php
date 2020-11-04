<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>class profile</title>
</head>
<body style="background-color: plum">


<div class="card ml-5 mr-5 shadow-lg p-1">

    <div class="card-body">
        <h4 class="card-title"><?php echo "Class information" ?></h4>
        <p class="card-text">

            id: <?php echo $connection->profileClass($classId)['class_id'] .'<br>' ?>
            class name: <?php echo $connection->profileClass($classId)['class_name'] .'<br>'?>
            Location: <?php echo $connection->profileClass($classId)['class_location'] .'<br>' ?>
            Teacher: <a href="?teacher=<?=$getTeacherLink?>"><?php echo $getTeacherName .'<br>' ?></a>
        </p>
    </div>
    <form method="get">
        <table id='customers'>
            <tbody>
            <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>PROFILE</td>

            <?php foreach ($studentList as $studentFromClass): ?>
                <tr>
                    <td><?php echo $studentFromClass['student_id'] ?></td>
                    <td><?php echo $studentFromClass['student_name'] ?></td>
                    <td><?php echo $studentFromClass['student_email'] ?></td>
                    <td><a href="?student=<?= $studentFromClass["student_id"] ?>">
                            <button type="button" name="studentId" class="btn btn-primary">Profile</button></td>
                    </a>
                </tr>


            <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    <br>
    <form method="post">
        <button type="submit" name="editClassProfile" class="btn btn-primary mb-2 ">Edit</button>
        <button type="submit" name="deleteClassProfile" class="btn btn-primary mb-2 ">Delete</button>
        <br>
        <button type="submit" name="backToClasses" class="btn btn-primary m-auto">Go Back To Class overview</button>
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

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
</style>
</div>

</div>
</body>
</html>
