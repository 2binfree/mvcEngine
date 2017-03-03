<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 03/10/16
 * Time: 08:31
 */

namespace wcs\Model;


class UserData
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstname = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastname = $lastName;
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
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}