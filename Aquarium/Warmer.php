<?php
/**
 * @author: Krzysztof Kromolicki
 */
namespace App\Aquarium;


class Warmer
{

    public const POOR = 1;
    public const MEDIUM = 2;
    public const HARD = 3;

    protected const MODE = [
        self::HARD => 'hard',
        self::POOR => 'poor',
        self::MODIUM => 'medium',
    ];

    public function start(int $mode)
    {
        return 'The warmer works on ' . self::MODE[$mode];
    }

}