<?php


class TeacherController
{
    public function render()
    {
        $form = "";
        $view = 'View/TeacherView.php';
        $connection = new Connection();
        $showTeachers = $connection->displayTeacher();
        $classes = $connection->displayClass();
        $arrayClass = [];
        foreach ($showTeachers as $teacher) {
            array_push($arrayClass, $teacher['teacher_class']);
        }
        if (isset($_POST['addNewTeacher'])) {
            require "View/RegistrationTeacherView.php";
        }
        if (isset($_POST['confirmTeacher'])) {
            $TeacherName = $_POST["TeacherName"];
            $TeacherEmail = $_POST["TeacherEmail"];
            $classTeacherID = $_POST["TeacherClass"];
            if ((!empty($TeacherName) && (!empty($TeacherEmail)))) {
                if (in_array($classTeacherID, $arrayClass)) {
                    echo "Choose another class";
                } else {
                    $teacher = new Teacher($TeacherName, $TeacherEmail, intval($classTeacherID));
                    $connection->insertTeacher($teacher);
                    header("Location: http://crud.localhost/?teacher");
                }
            }
        }

        if (isset($_GET["teacher"])) {
            $teacherId = $_GET["teacher"];
            $profileTeacher = $connection->profileTeacher($teacherId);
            $view = "View/TeacherProfileView.php";
            if ($profileTeacher['teacher_class'] !== null) {
                $getClassName = $connection->getClassName($profileTeacher['teacher_class']);
                $getClassName = $getClassName['class_name'];
            } else {
                $getClassName = "";
                $getTeacherName = "";
            }
        }
        if (isset($_POST["editTeacherProfile"])) {
            $form = "<form method='post'>
<div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='TeacherName'>Teacher Name:</label>
                    <input type='text' name='TeacherName' id='TeacherName' class='form-control' value=''>
</div>
            <div class='form - group col - md - 6'>
    <label for='StudentEmail'>Teacher Email:</label>
    <input type='text' name='TeacherEmail' id='TeacherEmail' class='form-control' value=''>
</div>
</div>
<button type='submit' name='confirmEdit' class='btn btn-primary'>Confirm</button>
</form>";
        }
        if (isset($_POST["confirmEdit"])) {
            $teacherName = $_POST["TeacherName"];
            $teacherEmail = $_POST["TeacherEmail"];
            $updateTeacher = $connection->updateTeacher($teacherName, $teacherEmail, intval($teacherId));
            header("Location: http://crud.localhost/?teacher=$teacherId");
        }


        require $view;
    }
}
