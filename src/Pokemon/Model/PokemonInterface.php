<?php
/**
 * Created by PhpStorm.
 * user: justine
 * Date: 06/01/2015
 * Time: 15:09
 */

namespace Cartman\Init\Pokemon\Model;


interface PokemonInterface
{
    /**
     * @return string
     */
    public function getUsername();

    /**
     * @param string $username
     *
     * @return PokemonInterface
     */
    public function setUsername($username);

    /**
     * @return int
     */
    public function getHP();

    /**
     * @param int $hp
     *
     * @return PokemonInterface
     */
    public function setHP($hp);

    /**
     * @param int $hp
     *
     * @return int
     */
    public function addHP($hp);

    /**
     * @param int $hp
     *
     * @return int
     */
    public function removeHP($hp);

    /**
     * @return int
     */
    public function getType();

    /**
     * @param int $type
     *
     * @return PokemonInterface
     */
    public function setType($type);

} 