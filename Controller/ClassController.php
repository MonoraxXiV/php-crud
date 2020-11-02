<?php


class ClassController
{
    public function render()
    {
        $form = "";
        $connection = new Connection();
        $classes = $connection->displayClass();

        if (isset($_POST['addNewClass'])){
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

            }
        }


        require "View/ClassView.php";
    }
}