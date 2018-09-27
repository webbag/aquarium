<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium\Life;


class Turtle extends LifeAbstract
{

    protected const FOOT_TYPE = [
        self::EAT_BREAD => self::LIKE_MANY,
        self::EAT_MEAT => self::LIKE_MEDIUM,
        self::EAT_GRAIN => self::LIKE_LITTLE,
    ];

    public const SWIM_TYPE = 'slow';

}
