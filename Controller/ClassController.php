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
                header('Location: ' . $_SERVER['PHP_SELF'] . "?AllClasses=");
            }
        }

        if (isset($_GET["class"])) {
            $classId = $_GET["class"];
            $studentList = $connection->getStudentsFromClass($classId);

            $view = "View/ClassProfileView.php";

            if (isset($_POST["editClassProfile"])) {
                require_once "View/UpdateClassView.php";
            }
            if (isset($_POST["confirmClassUpdate"])) {
                $ClassName = $_POST["ClassName"];
                $ClassLocation = $_POST["ClassName"];
                if ((!empty($ClassName) && (!empty($ClassLocation)))) {
                    $updateClass = $connection->updateClass($ClassName, $ClassLocation, intval($classId));
                    header('Location: ' . $_SERVER['PHP_SELF'] . "?class=$classId");
                }
            }
        }
        if (isset($_GET['AllClasses'])) {
            if (($_GET['AllClasses'] !== "")) {
                $overviewClassId = $_GET['AllClasses'];
                require_once "View/UpdateClassView.php";
            }
            if (isset($_POST["confirmClassUpdate"])) {
                $ClassNameOverview = $_POST["ClassName"];
                $ClassLocationOverview = $_POST["ClassName"];
                if ((!empty($ClassNameOverview) && (!empty($ClassLocationOverview)))) {
                    $updateClass = $connection->updateClass($ClassLocationOverview, $ClassLocationOverview, intval($overviewClassId));
                    header('Location: ' . $_SERVER['PHP_SELF'] . "?AllClasses=");
                }
            }
        }
        if (isset($_POST['delete'])) {
            $overviewClassId = $_POST['delete'];
            $deleteClass = $connection->deleteClass($overviewClassId);
            header('Location: ' . $_SERVER['PHP_SELF'] . "?AllClasses=");
        }
        require $view;
    }
}