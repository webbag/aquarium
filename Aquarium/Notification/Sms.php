<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium\Notification;


class Sms extends NotificationAbstract implements NotificationInterface
{

    public function send()
    {
        $result = new ApiSmsExample($this->user->getMobileNumber());
        return $result ? 'SMS send' : "SMS fail ";
    }

}
