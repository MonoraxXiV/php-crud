<?php


class Teacher extends Student
{
    private int $teacher_id;
    private string $teacher_name;
    private string $teacher_email;
    private int $teacher_class;

    /**
     * Teacher constructor.
     * @param int $teacher_id
     * @param string $teacher_name
     * @param string $teacher_email
     * @param int $teacher_class
     */
    public function __construct( string $teacher_name, string $teacher_email, int $teacher_class)
    {

        $this->teacher_name = $teacher_name;
        $this->teacher_email = $teacher_email;
        $this->teacher_class = $teacher_class;
    }

    /**
     * @return int
     */
    public function getTeacherId(): int
    {
        return $this->teacher_id;
    }

    /**
     * @return string
     */
    public function getTeacherName(): string
    {
        return $this->teacher_name;
    }

    /**
     * @return string
     */
    public function getTeacherEmail(): string
    {
        return $this->teacher_email;
    }

    /**
     * @return int
     */
    public function getTeacherClass(): int
    {
        return $this->teacher_class;
    }



}