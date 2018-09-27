<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium;


use App\Aquarium\Life\Fish;
use App\Aquarium\Life\Plant;
use App\Aquarium\Life\Turtle;
use App\Aquarium\Notification\Email;
use App\Aquarium\Notification\Sms;

class Aquarium
{
    /**
     * @var Sms
     */
    protected $notificationEmail;
    /**
     * @var Email
     */
    protected $notificationSms;
    /**
     * @var bool
     */
    protected $lightShinesAction = false;

    protected $filterAction = false;

    protected $hungryAction = false;

    /**
     * @var Fish
     */
    protected $fish;
    /**
     * @var Plant
     */
    protected $plant;
    /**
     * @var Turtle
     */
    protected $turtle;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var Warmer
     */
    protected $warmer;

    protected $warmerMode;

    protected $eat;

    /**
     * Time constructor.
     * @param Sms $notificationEmail
     * @param Email $notificationSms
     * @param Fish $fish
     * @param Plant $plant
     * @param Turtle $turtle
     * @param Filter $filter
     * @param Warmer $warmer
     */
    public function __construct(Sms $notificationEmail, Email $notificationSms, Fish $fish, Plant $plant, Turtle $turtle, Filter $filter, Warmer $warmer)
    {
        $this->notificationEmail = $notificationEmail;
        $this->notificationSms = $notificationSms;
        $this->fish = $fish;
        $this->plant = $plant;
        $this->turtle = $turtle;
        $this->filter = $filter;
        $this->warmer = $warmer;
    }

    public function initNotification($email, $mobileNumber)
    {
        $this->notificationEmail->getUser()->setEmail($email);
        $this->notificationEmail->getUser()->setMobileNumber($mobileNumber);
    }

    public function startTimeline()
    {
        if ($this->lightShinesAction) {
            $this->fish->setSwim(Fish::SWIM_TYPE);
            $this->turtle->setSwim(Turtle::SWIM_TYPE);
        }

        if ($this->filterAction) {
            // 3 hour
            if (date('G', time()) == 3) {
                $this->filter->setCleaning(true);
            }
            // Monday
            if (date('N', time()) == 1) {
                $this->filter->setDecontamination(true);
            }
            // 15 day
            if (date('j', time()) == 15) {
                $this->filter->setFastFiltering(true);
            }
            $this->filter->start();
        }

        if ($this->hungryAction) {
            $this->fish->setHungry(true);
            $this->turtle->setHungry(true);

            $this->fish->eat($this->eat);
            $this->turtle->eat($this->eat);
            $this->sendNotification();
        }

        $this->warmer->start($this->warmerMode);
    }

    protected function sendNotification()
    {
        $this->notificationEmail->send();
        $this->notificationSms->send();
    }

    /**
     * @param bool $lightShinesAction
     */
    public function setLightShinesAction(bool $lightShinesAction): void
    {
        $this->lightShinesAction = $lightShinesAction;
    }

    /**
     * @param bool $filterAction
     */
    public function setFilterAction(bool $filterAction): void
    {
        $this->filterAction = $filterAction;
    }

    /**
     * @param bool $hungryAction
     */
    public function setHungryAction(bool $hungryAction): void
    {
        $this->hungryAction = $hungryAction;
    }

    /**
     * @param mixed $eat
     */
    public function setEat($eat): void
    {
        $this->eat = $eat;
    }

    /**
     * @param mixed $warmerMode
     */
    public function setWarmerMode($warmerMode): void
    {
        $this->warmerMode = $warmerMode;
    }

}

