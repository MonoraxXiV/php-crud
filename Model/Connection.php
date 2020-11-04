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
        $handle = $this->openConnection()->prepare("SELECT * FROM student where student_id = :student_id");
        $handle->bindParam(':student_id', $studentId);
        $handle->execute();
        $profileStudent = $handle->fetch();
        return $profileStudent;
    }

    public function profileTeacher($teacherId)
    {
        $handle = $this->openConnection()->prepare("SELECT * FROM teacher where teacher_id = :teacher_id");
        $handle->bindParam(':teacher_id', $teacherId);
        $handle->execute();
        $profileTeacher = $handle->fetch();
        return $profileTeacher;
    }

    public function profileClass($classId)
    {
        $handle = $this->openConnection()->prepare("SELECT * FROM class where class_id = :class_id");
        $handle->bindParam(':class_id', $classId);
        $handle->execute();
        $profileClass = $handle->fetch();
        return $profileClass;
    }

    public function updateStudent(string $sName, string $sEmail,$sClass, int $studentId)
    {
        $handle = $this->openConnection()->prepare('UPDATE student SET student_name = :student_name, student_email = :student_email, student_class = :student_class WHERE student_id = :student_id');
        $handle->bindParam(':student_name', $sName);
        $handle->bindParam(':student_email', $sEmail);
        $handle->bindParam(':student_class', $sClass);
        $handle->bindParam(':student_id', $studentId);
        $handle->execute();
    }

    public function updateTeacher(string $tName, string $tEmail,$tClass, int $teacherId)
    {
        $handle = $this->openConnection()->prepare('UPDATE teacher SET teacher_name = :teacher_name, teacher_email = :teacher_email, teacher_class = :teacher_class WHERE teacher_id = :teacher_id');
        $handle->bindParam(':teacher_name', $tName);
        $handle->bindParam(':teacher_email', $tEmail);
        $handle->bindParam(':teacher_class', $tClass);
        $handle->bindParam(':teacher_id', $teacherId);
        $handle->execute();
    }

    public function updateClass(string $cName, string $cLocation, int $classId)
    {
        $handle = $this->openConnection()->prepare('UPDATE class SET class_name = :class_name, class_location = :class_location WHERE class_id = :class_id');
        $handle->bindParam(':class_name', $cName);
        $handle->bindParam(':class_location', $cLocation);
        $handle->bindParam(':class_id', $classId);
        $handle->execute();
    }

    public function getClassName($classId)
    {
        $handle = $this->openConnection()->prepare('SELECT class_name FROM class WHERE class_id = :class_id');
        $handle->bindParam('class_id', $classId);
        $handle->execute();
        return $handle->fetch();
    }

    public function getTeacherName($teacherClassId)
    {
        $handle = $this->openConnection()->prepare('SELECT teacher_name FROM teacher WHERE teacher_class = :teacher_class');
        $handle->bindParam('teacher_class', $teacherClassId);
        $handle->execute();
        return $handle->fetch();
    }

    public function getTeacherId($teacherClassId)
    {
        $handle = $this->openConnection()->prepare('SELECT teacher_id FROM teacher where teacher_class = :teacher_class');
        $handle->bindParam('teacher_class', $teacherClassId);
        $handle->execute();
        return $handle->fetch();
    }

    public function getStudentsFromClass($studentClassId)
    {
        $handle = $this->openConnection()->prepare('SELECT * FROM student WHERE student_class = :student_class');
        $handle->bindParam('student_class', $studentClassId);
        $handle->execute();
        return $handle->fetchAll();
    }

    public function deleteStudent($studentId)
    {
        $handle = $this->openConnection()->prepare('DELETE FROM student WHERE student_id = :student_id');
        $handle->bindParam(':student_id', $studentId);
        $handle->execute();
    }

    public function deleteTeacher($teacherId)
    {
        $handle = $this->openConnection()->prepare('DELETE FROM teacher WHERE teacher_id = :teacher_id');
        $handle->bindParam(':teacher_id', $teacherId);
        $handle->execute();
    }

    public function deleteClass($classId)
    {
        $handle = $this->openConnection()->prepare('DELETE FROM class WHERE class_id = :class_id');
        $handle->bindParam(':class_id', $classId);
        $handle->execute();
    }
    
    




}