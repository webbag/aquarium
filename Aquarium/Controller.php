<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium;


use App\Aquarium\Life\LifeAbstract;

class Controller
{

    /**
     * Initial App.
     *
     * @param Aquarium $aquarium
     */
    public function action(Aquarium $aquarium)
    {
        $aquarium->initNotification('webbager@webbag.pl', '12346789');
        $aquarium->setEat(LifeAbstract::EAT_BREAD);
        $aquarium->setLightShinesAction(true);
        $aquarium->setHungryAction(true);
        $aquarium->setFilterAction(true);
        $aquarium->setWarmerMode(Warmer::HARD);

        $aquarium->startTimeline();
    }

}
