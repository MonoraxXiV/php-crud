<?php


class TeacherController
{
    public function render()
    {
        $view = 'View/TeacherView.php';
        $connection = new Connection();
        $showTeachers= $connection->displayTeacher();
        $classes = $connection->displayClass();
        $arrayClass = [];
        foreach ($showTeachers as $teacher){
            array_push($arrayClass, $teacher['teacher_class']);
        }
        var_dump($arrayClass);
        if (isset($_POST['addNewTeacher'])){
            require "View/RegistrationTeacherView.php";
        }
        if (isset($_POST['confirmTeacher'])) {
            $TeacherName = $_POST["TeacherName"];
            $TeacherEmail = $_POST["TeacherEmail"];
            $classTeacherID = $_POST["TeacherClass"];
            if ((!empty($TeacherName) && (!empty($TeacherEmail)))) {
                if (in_array($classTeacherID, $arrayClass)){
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
        }

        require $view;
    }
}
