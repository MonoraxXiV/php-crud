<?php


class ClassModel
{
    private int $class_id;
    private string $class_name;
    private string $class_location;

    /**
     * ClassModel constructor.
     * @param int $class_id
     * @param string $class_name
     * @param string $class_location
     */
    public function __construct(int $class_id, string $class_name, string $class_location)
    {
        $this->class_id = $class_id;
        $this->class_name = $class_name;
        $this->class_location = $class_location;
    }

    /**
     * @return int
     */
    public function getClassId(): int
    {
        return $this->class_id;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->class_name;
    }

    /**
     * @return string
     */
    public function getClassLocation(): string
    {
        return $this->class_location;
    }

}