<?php
/**
 * Created by PhpStorm.
 * user: justine
 * Date: 09/01/2015
 * Time: 11:59
 */

namespace Cartman\Init;



class User
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=40)
     */
    private $password;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param  $username
     *
     * @throws \Exception
     *
     * @return User
     */
    public function setUsername($username)
    {
        if(is_string($username))
            $this->username=$username;
        else
            throw new \Exception('Username must be a string');
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param int $password
     *
     * @throws \Exception
     *
     * @return Article
     */
    public function setPassword($password)
    {
        if(is_string($password))
            $this->password=$password;
        else
            throw new \Exception('Password must be a string');
        return $this;
    }

} 