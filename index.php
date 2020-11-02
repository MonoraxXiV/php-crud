<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "Model/ClassModel.php";
require_once "Model/Student.php";
require_once "Model/Teacher.php";
require_once "Model/Connection.php";
require_once "Controller/ClassController.php";
require_once "Controller/HomepageController.php";
require_once "Controller/StudentController.php";
require_once "Controller/TeacherController.php";


$controller = new HomepageController();

if (isset($_GET['class'])) {
    $controller = new classController();
}

if (isset($_POST['backToMain'])) {
    $controller = new HomepageController();
    header("Location: http://crud.localhost/");
}

if (isset($_GET['student'])) {
    $controller = new StudentController();
}
$controller->render();


