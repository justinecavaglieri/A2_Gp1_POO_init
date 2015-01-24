<?php
/**
 * Created by PhpStorm.
 * user: justine
 * Date: 06/01/2015
 * Time: 17:00
 */

namespace Cartman\Init\Pokemon;

use Cartman\Init\Pokemon\Model\PokemonModel;

class PokemonWater extends PokemonModel
{
    /**
     * constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_WATER);
    }
    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_PLANT === $type) ? true : false;
    }

    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_FIRE === $type) ? true : false;
    }
}
