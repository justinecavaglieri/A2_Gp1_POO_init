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
     * @var int
     *
     * @Column (name="lastBattle", type="integer")
     */
    private $lastBattle;

    /**
     * @var int
     *
     * @Column (name="lastRevive", type="integer")
     */
    private $lastRevive;

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

    /**
     * @return int
     */
    public function getLastBattle()
    {
        return $this->lastBattle;
    }

    /**
     * @param int $lastBattle
     *
    * @throws \Exception
    *
    * @return TrainerModel
    */
    public function setLastBattle($lastBattle)
    {
        $this->lastBattle = $lastBattle;
    }

    /**
     * @return int
     */
    public function getLastRevive()
    {
        return $this->lastRevive;
    }

    /**
     * @param int $lastRevive
     *
     * @throws \Exception
     *
     * @return TrainerModel
     */

    public function setLastRevive($lastRevive)
    {
        $this->lastRevive = $lastRevive;
    }


} 