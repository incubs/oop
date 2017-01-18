<?php

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $message;
    private $name;
    private $mysql;

    function __construct()
    {
        $this->mysql = mysqli_connect('localhost', 'root', '', 'oop-form');
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Invalid Email');
        }
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }


    public function save()
    {

        $query = 'insert into users( first_name, last_name, email, message ) 
                    VALUES ("' . $this->getFirstName() . '",
                    "' . $this->getLastName() . '",
                    "' . $this->getEmail() . '",
                    "' . $this->getMessage() . '"
                    )';

        return mysqli_query($this->mysql, $query);
    }

    public function getAll() {
        $query = mysqli_query($this->mysql, 'select * from users');
        $users = [];
        while ($row = mysqli_fetch_assoc($query)) {

            $user = new self();
            $user->setFirstName($row['first_name']);
            $user->setLastName($row['last_name']);
            try{
                $user->setEmail($row['email']);
            } catch ( Exception $exception ){

            }

            $user->setMessage($row['message']);
            $users[] = $user;
        }
        return $users;
    }

    function getName() {
        return $this->firstName . " " . $this->lastName;
    }

}