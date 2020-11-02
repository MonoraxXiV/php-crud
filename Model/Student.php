<?php


class Student
{
    private int $student_id;
    private string $student_name;
    private string $student_email;
    private int $student_class;

    /**
     * Student constructor.
     * @param int $id
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param $created_at
     */
    public function __construct(string $student_name, string $student_email, int $student_class)
    {
        $this->student_name = $student_name;
        $this->student_email = $student_email;
        $this->student_class = $student_class;
    }

    /**
     * @return int
     */
    public function getStudentId(): int
    {
        return $this->student_id;
    }

    /**
     * @return string
     */
    public function getStudentName(): string
    {
        return $this->student_name;
    }

    /**
     * @return string
     */
    public function getStudentEmail(): string
    {
        return $this->student_email;
    }

    /**
     * @return int
     */
    public function getStudentClass(): int
    {
        return $this->student_class;
    }


}

