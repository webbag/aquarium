<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium\Notification;


use App\Aquarium\User;

abstract class NotificationAbstract
{

    /**
     * @var User
     */
    protected $user;

    /**
     * NotificationAbstract constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

}
