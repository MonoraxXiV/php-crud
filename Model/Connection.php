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

    public function insertClass(ClassModel $class)
    {
        $this->PDO;
        $handle = $this->openConnection()->prepare("INSERT INTO class (class_name, class_location) VALUES (:class_name, :class_location)");
        $handle->bindValue(':class_name', $class->getClassName());
        $handle->bindValue(':class_location', $class->getClassLocation());
        $handle->execute();
    }

    public function displayStudent()
    {
        $handle = $this->openConnection()->prepare("SELECT * FROM student");
        $handle->execute();
        $displayStudents = $handle->fetchAll();
        return $displayStudents;
    }

    public function displayTeacher()
    {
        $handle = $this->openConnection()->prepare("SELECT * FROM teacher");
        $handle->execute();
        $displayTeachers = $handle->fetchAll();
        return $displayTeachers;
    }

    public function displayClass()
    {
        $handle = $this->openConnection()->prepare("SELECT * FROM class");
        $handle->execute();
        $displayClasses = $handle->fetchAll();
        return $displayClasses;
    }

    public function profileStudent($studentId)
    {
        $studentId = $_GET['student'];
        $handle = $this->openConnection()->prepare("SELECT * FROM student where student_id = :student_id");
        $handle->bindParam(':student_id', $studentId);
        $handle->execute();
        $profileStudent = $handle->fetch();
        return $profileStudent;
    }

    public function profileTeacher($teacherId)
    {
        $teacherId = $_GET['teacher'];
        $handle = $this->openConnection()->prepare("SELECT * FROM teacher where teacher_id = :teacher_id");
        $handle->bindParam(':teacher_id', $teacherId);
        $handle->execute();
        $profileTeacher = $handle->fetch();
        return $profileTeacher;
    }

    public function profileClass($classId)
    {
        $classId = $_GET['class'];
        $handle = $this->openConnection()->prepare("SELECT * FROM class where class_id = :class_id");
        $handle->bindParam(':class_id', $classId);
        $handle->execute();
        $profileClass = $handle->fetch();
        return $profileClass;
    }

    public function updateStudent(string $sName, string $sEmail, int $sClass, int $studentId)
    {
        $handle = $this->openConnection()->prepare('UPDATE student SET student_name = :sName, student_email = :sEmail, student_class = :sClass WHERE student_id = :student_id');
        $handle->bindParam(':sName', $sName);
        $handle->bindParam(':sEmail', $sEmail);
        $handle->bindParam(':sClass', $sClass);
        $handle->bindParam(':student_id', $studentId);
        $handle->execute();
    }







}