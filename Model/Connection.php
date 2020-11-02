<?php

class Connection
{
    private $PDO;

    public function openConnection(): PDO
    {

        require('resources/config.php');

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);

        $this->PDO = $pdo;
        return $pdo;

    }

    public function insertStudent(Student $student)
    {
        $this->PDO;
        $handle = $this->openConnection()->prepare("INSERT INTO student (student_name, student_email, student_class) VALUES (:student_name, :student_email, :student_class)");
        $handle->bindValue(':student_name', $student->getStudentName());
        $handle->bindValue(':student_email', $student->getStudentEmail());
        $handle->bindValue(':student_class', $student->getStudentClass());
        $handle->execute();
    }

    public function insertTeacher(Teacher $teacher)
    {
        $this->PDO;
        $handle = $this->openConnection()->prepare("INSERT INTO teacher (teacher_name, teacher_email, teacher_class) VALUES (:teacher_name, :teacher_email, :teacher_class)");
        $handle->bindValue(':teacher_name', $teacher->getTeacherName());
        $handle->bindValue(':teacher_email', $teacher->getTeacherEmail());
        $handle->bindValue(':teacher_class', $teacher->getTeacherClass());
        $handle->execute();
    }
}