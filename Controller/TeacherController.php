<?php


class TeacherController
{
    public function render()
    {
        $view = 'View/TeacherView.php';
        $viewform = "View/emptyView.php";
        $connection = new Connection();
        $showTeachers = $connection->displayTeacher();
        $classes = $connection->displayClass();
        $arrayClass = [];
        foreach ($showTeachers as $teacher) {
            array_push($arrayClass, $teacher['teacher_class']);
        }
        if (isset($_POST['addNewTeacher'])) {
            $viewform = "View/RegistrationTeacherView.php";
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
                    header('Location: ' . $_SERVER['PHP_SELF'] . "?AllTeachers=");
                }
            }
        }

        if (isset($_GET["teacher"])) {
            $teacherId = $_GET["teacher"];
            $profileTeacher = $connection->profileTeacher($teacherId);
            if ($profileTeacher['teacher_class'] !== null) {
                $getClassName = $connection->getClassName($profileTeacher['teacher_class']);
                $getClassName = $getClassName['class_name'];
            } else {
                $getClassName = "";
                $getTeacherName = "";
            }
            $view = "View/TeacherProfileView.php";

            if (isset($_POST["editTeacherProfile"])) {
                $viewform = "View/UpdateTeacherView.php";
            }
            if (isset($_POST["confirmTeacherUpdate"])) {
                $teacherName = $_POST["TeacherName"];
                $teacherEmail = $_POST["TeacherEmail"];
                $teacherClass = $_POST["TeacherClass"];
                if ((!empty($teacherName) && (!empty($teacherEmail)))) {
                    $updateTeacher = $connection->updateTeacher($teacherName, $teacherEmail,$teacherClass, intval($teacherId));
                    header('Location: ' . $_SERVER['PHP_SELF'] . "?teacher=$teacherId");

                }
            }
            if (isset($_POST["deleteTeacherProfile"])) {
                $deleteTeacher = $connection->deleteTeacher($teacherId);
                header('Location: ' . $_SERVER['PHP_SELF'] . "?AllTeachers=");
            }
        }
        if (isset($_GET['AllTeachers'])) {
            if (($_GET['AllTeachers'] !== "")) {
                $teacherId = $_GET['AllTeachers'];
                $viewform = "View/UpdateTeacherView.php";
            }
            if (isset($_POST["confirmTeacherUpdate"])) {
                $teacherNameOverview = $_POST["TeacherName"];
                $teacherEmailOverview = $_POST["TeacherEmail"];
                $teacherClassOverview = $_POST["TeacherClass"];
                if ((!empty($teacherNameOverview) && (!empty($teacherEmailOverview)))) {
                    $updateStudent = $connection->updateTeacher($teacherNameOverview, $teacherEmailOverview, $teacherClassOverview, intval($teacherId));
                    header('Location: ' . $_SERVER['PHP_SELF'] . "?AllTeachers=");
                }
            }
        }
        if (isset($_POST["deleteTeacherRow"])) {
            $teacherId = $_POST["deleteTeacherRow"];
            $deleteTeacher = $connection->deleteTeacher(intval($teacherId));
            header('Location: ' . $_SERVER['PHP_SELF'] . "?AllTeachers=");
        }
        require $view;
        require $viewform;
    }
}
