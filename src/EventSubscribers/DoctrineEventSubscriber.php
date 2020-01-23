<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 1/23/2020
 * Time: 3:25 PM
 */

namespace App\EventSubscribers;


use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Contracts\EventDispatcher\Event;

class DoctrineEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist
        );
    }

    public function prePersist(LifecycleEventArgs $event)
    {
        die("sadfasdf");
    }
}