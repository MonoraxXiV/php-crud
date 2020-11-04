<?php


class ClassController
{
    public function render()
    {
        $view = "View/ClassView.php";
        $viewform = "View/emptyView.php";
        $connection = new Connection();
        $classes = $connection->displayClass();
        $classID = $className = "";

        if (isset($_POST['addNewClass'])) {
            $viewform = "View/RegistrationClassView.php";
        }

        if (isset($_POST['confirm'])) {
            $className = $_POST["ClassName"];
            $classLocation = $_POST["ClassLocation"];
            if ((!empty($className) && (!empty($classLocation)))) {
                $class = new ClassModel($className, $classLocation);
                $connection->insertClass($class);
                header('Location: ' . $_SERVER['PHP_SELF'] . "?AllClasses=");
            }
        }

        if (isset($_GET["class"])) {
            $classId = $_GET["class"];
            $className = $connection->getClassName($classId);
            $studentList = $connection->getStudentsFromClass($classId);
            $getTeacherName = $connection->getTeacherName($classId);
            if ($getTeacherName !== false) {
                $getTeacherName = $getTeacherName['teacher_name'];
                $getTeacherLink = $connection->getTeacherId($classId)['teacher_id'];
            } else {
                $getTeacherLink = '';
                $getTeacherName = "";
                $getTeacherLink = '';
            }


            $view = "View/ClassProfileView.php";

            if (isset($_POST["editClassProfile"])) {
                $viewform = "View/UpdateClassView.php";
            }
            if (isset($_POST["deleteClassProfile"])) {
                $deleteStudent = $connection->deleteClass($classId);
                header('Location: ' . $_SERVER['PHP_SELF'] . "?AllClasses=");
            }
            if (isset($_POST["confirmClassUpdate"])) {
                $ClassName = $_POST["ClassName"];
                $ClassLocation = $_POST["ClassLocation"];
                if ((!empty($ClassName) && (!empty($ClassLocation)))) {
                    $updateClass = $connection->updateClass($ClassName, $ClassLocation, intval($classId));
                    header('Location: ' . $_SERVER['PHP_SELF'] . "?class=$classId");
                }
            }
//            $classID = $classId;
        }
        if (isset($_GET['AllClasses'])) {

            if (($_GET['AllClasses'] !== "")) {
                $classId = $_GET['AllClasses'];
                $className = $connection->getClassName($classId);
                $viewform = "View/UpdateClassView.php";
            }
            if (isset($_POST["confirmClassUpdate"])) {
                $ClassNameOverview = $_POST["ClassName"];
                $ClassLocationOverview = $_POST["ClassLocation"];
                if ((!empty($ClassNameOverview) && (!empty($ClassLocationOverview)))) {
                    $updateClass = $connection->updateClass($ClassNameOverview, $ClassLocationOverview, intval($classId));
                    header('Location: ' . $_SERVER['PHP_SELF'] . "?AllClasses=");
                }
            }
        }
        if (isset($_POST['delete'])) {
            $classId = $_POST['delete'];
            $deleteClass = $connection->deleteClass($classId);
            header('Location: ' . $_SERVER['PHP_SELF'] . "?AllClasses=");
        }
        require $view;
        require $viewform;
    }
}