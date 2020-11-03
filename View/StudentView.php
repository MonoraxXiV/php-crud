<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Users</title>
</head>
<body>
<div class="container">
    <h1>All Classes</h1>
    <form method="get">
        <table id ='customers'>
            <tbody>
            <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>CLASS</td>
            <td>PROFILE</td>
            <?php foreach ($showStudents as $student): ?>
                <tr>
                    <td><?php echo $student['student_id'] ?></td>
                    <td><?php echo $student['student_name'] ?></td>
                    <td><?php echo $student['student_email'] ?></td>
                    <td><?php echo $student['student_class']  ?></td>
                    <!--placeholder for profile link -->
                    <td><a href="?student=<?=$student["student_id"]?>"><button type="button" name="studentId" class="btn btn-primary">Profile</button></td></a>
                    <td><button type="submit" name="editStudentRow" class="btn btn-primary">Edit</button></td>
                    <td> <button type="submit" name="deleteStudentRow" class="btn btn-primary">Delete</button></td>
                </tr>


            <?php endforeach; ?>
            </tbody>
        </table>
    </form> <br>
    <form method="post">
        <button type="submit" name="addNewStudent" class="btn btn-primary">Add Student</button>
        <button type="submit" name="backToMain" class="btn btn-primary">Go Back To Main Page</button>
    </form>
    <?php echo $form; ?>
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
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
