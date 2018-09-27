<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium\Life;


abstract class LifeAbstract
{

    protected const LIKE_LITTLE = 'I like a little bit';
    protected const LIKE_MEDIUM = 'I like medium';
    protected const LIKE_MANY = 'I like very much';

    public const EAT_BREAD = 'bread';
    public const EAT_GRAIN = 'grain';
    public const EAT_MEAT = 'meat';

    public const OXYGEN = true;

    /**
     * @var string
     */
    protected $swim;

    /**
     * @var bool
     */
    protected $hungry = false;

    /**
     * @return string
     */
    public function getSwim(): string
    {
        return $this->swim;
    }

    /**
     * @param string $swim
     * @return Turtle
     */
    public function setSwim(string $swim): Turtle
    {
        $this->swim = $swim;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHungry(): bool
    {
        return $this->hungry;
    }

    /**
     * @param bool $hungry
     * @return Fish
     */
    public function setHungry(bool $hungry): Fish
    {
        $this->hungry = $hungry;

        return $this;
    }

    /**
     * @param $eat
     * @return string (I like a little bit bread)
     */
    public function eat($eat)
    {
        if (!$this->isHungry()) {
            return false;
        }

        return self::FOOT_TYPE[$eat] . ' ' . $eat;
    }

}