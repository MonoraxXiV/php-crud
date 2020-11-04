<?php


class ClassController
{
    public function render()
    {
        $view = "View/ClassView.php";
        $connection = new Connection();
        $classes = $connection->displayClass();

        if (isset($_POST['addNewClass'])) {
            require_once "View/RegistrationClassView.php";
        }
            if (isset($_POST['confirm'])) {
                $className = $_POST["ClassName"];
                $classLocation = $_POST["ClassLocation"];
                if ((!empty($className) && (!empty($classLocation)))) {
                    $class = new ClassModel($className, $classLocation);
                    $connection->insertClass($class);
                    header("Location: http://crud.localhost/?AllClasses");
                }
            }

        if (isset($_GET["class"])) {
            $classId = $_GET["class"];
            $studentList = $connection->getStudentsFromClass($classId);
            $view = "View/ClassProfileView.php";
        }
        if (isset($_POST["editClassProfile"])) {
            require_once "View/UpdateClassView.php";
        }
        if (isset($_POST["confirmUpdate"])) {
            $ClassName = $_POST["ClassName"];
            $ClassLocation = $_POST["ClassLocation"];
            if ((!empty($ClassName) && (!empty($ClassLocation)))) {
                $updateClass = $connection->updateClass($ClassName, $ClassLocation, intval($classId));
                header("Location: http://crud.localhost/?class=$classId");
            }
        }

        if (isset($_GET['AllClasses'])) {
            if (($_GET['AllClasses'] !== "")) {
                $overviewClassId = $_GET['AllClasses'];
                var_dump($overviewClassId);
                require_once "View/UpdateClassView.php";
            }
            if (isset($_POST["confirmUpdate"])) {
                $ClassNameOverview = $_POST["ClassName"];
                $ClassLocationOverview = $_POST["ClassLocation"];
                if ((!empty($ClassNameOverview) && (!empty($ClassLocationOverview)))) {
                    $updateClass = $connection->updateClass($ClassNameOverview, $ClassLocationOverview, intval($overviewClassId));
                    header("Location: http://crud.localhost/?AllClasses");
                }
            }
        }
        require $view;
    }
}