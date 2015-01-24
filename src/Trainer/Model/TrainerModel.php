<?php

namespace Cartman\Init\Trainer\Model;

/**
 * Class Trainer
 * @package Cartman\Init\Trainer\Model
 *
 * @entity
 * @table (name="trainer")
 */
class TrainerModel
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
     * @return TrainerModel
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
     * @return TrainerModel
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