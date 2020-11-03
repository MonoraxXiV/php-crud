<?php
declare(strict_types=1);


class StudentController
{
    public function render()
    {
        $view = "View/StudentView.php";
        $connection = new Connection();
        $showStudents = $connection->displayStudent();
        $classes = $connection->displayClass();
        $form = "";
        if (isset($_POST['addNewStudent'])) {
            require "View/RegistrationStudentView.php";

        }
        if (isset($_POST['confirm'])) {
            $StudentName = $_POST["StudentName"];
            $StudentEmail = $_POST["StudentEmail"];
            $classID = $_POST["class"];
            if ((!empty($StudentName) && (!empty($StudentEmail)))) {
                $student = new Student($StudentName, $StudentEmail, intval($classID));
                $connection->insertStudent($student);
                header("Location: http://crud.localhost/?AllStudents");

            }
        }

        if (isset($_GET["student"])) {
            $studentId = $_GET["student"];
            $profileStudent = $connection->profileStudent($studentId);
            $studentClassId = $profileStudent['student_class'];
            if ($studentClassId !== null) {
                $getClassName = $connection->getClassName($studentClassId);
                $getTeacherName = $connection->getTeacherName($studentClassId);
                $getClassName = $getClassName['class_name'];
                $getTeacherName = $getTeacherName['teacher_name'];
            } else {
                $getClassName = "";
                $getTeacherName = "";

            }

            $view = "View/StudentProfileView.php";

            if (isset($_POST["editStudentProfile"])) {
                $form = "<form method='post'>
<div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='StudentName'>Student Name:</label>
                    <input type='text' name='StudentName' id='StudentName' class='form-control' value=''>
</div>
            <div class='form - group col - md - 6'>
    <label for='StudentEmail'>Student Email:</label>
    <input type='text' name='StudentEmail' id='StudentEmail' class='form-control' value=''>
</div>
</div>
<button type='submit' name='confirmEdit' class='btn btn-primary'>Confirm</button>
</form>";
            }
            if (isset($_POST["confirmEdit"])) {
                $studentName = $_POST["StudentName"];
                $studentEmail = $_POST["StudentEmail"];
                $updateStudent = $connection->updateStudent($studentName, $studentEmail, intval($studentId));
                header("Location: http://crud.localhost/?student=$studentId");
            }
        }

        require $view;
    }
}