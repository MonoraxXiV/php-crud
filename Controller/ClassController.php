<?php


class ClassController
{
    public function render()
    {
        $view = "View/ClassView.php";
        $form = "";
        $formEdit = "";
        $formEditOverview = "";
        $connection = new Connection();
        $classes = $connection->displayClass();
        if (isset($_POST['addNewClass'])) {
            $form = "
<form method='post'>
<div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='ClassName'>Class Name:</label>
                    <input type='text' name='ClassName' id='ClassName' class='form-control' value=''>
</div>
            <div class='form - group col - md - 6'>
    <label for='ClassLocation'>Class Location:</label>
    <input type='text' name='ClassLocation' id='ClassLocation' class='form-control' value=''>
</div>
</div>
<button type='submit' name='confirm' class='btn btn-primary'>Confirm</button>
</form>";
        }
        if (isset($_POST['confirm'])) {
            $ClassName = $_POST["ClassName"];
            $ClassLocation = $_POST["ClassLocation"];
            if ((!empty($ClassName) && (!empty($ClassLocation)))) {
                $class = new ClassModel($ClassName, $ClassLocation);
                $connection->insertClass($class);
                header("Location: http://crud.localhost/?class");

            }
        }
        if (isset($_GET["class"])) {
            $classId = $_GET["class"];
            $studentList = $connection->getStudentsFromClass($classId);
            $view = "View/ClassProfileView.php";
        }
        if (isset($_POST["editClassProfile"])) {
            $formEditOverview = "<form method='post'>
<div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='ClassName'>Class Name:</label>
                    <input type='text' name='ClassName' id='ClassName' class='form-control' value=''>
</div>
            <div class='form - group col - md - 6'>
    <label for='ClassLocation'>Class Location:</label>
    <input type='text' name='ClassLocation' id='ClassLocation' class='form-control' value=''>
</div>
</div>
<button type='submit' name='confirmEdit' class='btn btn-primary'>Confirm</button>
</form>";
        }
        if (isset($_POST["confirmEdit"])) {
            $ClassName = $_POST["ClassName"];
            $ClassLocation = $_POST["ClassLocation"];
            $updateClass = $connection->updateClass($ClassName, $ClassLocation, intval($classId));
            header("Location: http://crud.localhost/?class=$classId");
        }
        if (isset($_GET['AllClasses'])) {
            if (($_GET['AllClasses'] !== "")) {
                $overviewClassId = $_GET['AllClasses'];
                var_dump($overviewClassId);
                $formEdit = "<form method='post'>
<div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='ClassName'>Class Name:</label>
                    <input type='text' name='ClassName' id='ClassName' class='form-control' value=''>
</div>
            <div class='form - group col - md - 6'>
    <label for='ClassLocation'>Class Location:</label>
    <input type='text' name='ClassLocation' id='ClassLocation' class='form-control' value=''>
</div>
</div>
<button type='submit' name='confirmEditOverview' class='btn btn-primary'>Confirm</button>
</form>";
            }
        } else $formEdit = "";
        if (isset($_POST["confirmEditOverview"])) {
            $ClassNameOverview = $_POST["ClassName"];
            $ClassLocationOverview = $_POST["ClassLocation"];
            $updateClass = $connection->updateClass($ClassNameOverview, $ClassLocationOverview, intval($overviewClassId));
            header("Location: http://crud.localhost/?AllClasses");

        }

        require $view;
    }
}