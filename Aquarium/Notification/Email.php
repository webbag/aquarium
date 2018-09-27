<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium\Notification;


class Email extends NotificationAbstract implements NotificationInterface
{

    public function send()
    {
        $result = new EmailExample($this->user->getEmail());
        return $result ? 'Email send' : "Email fail";
    }

}
