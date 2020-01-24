<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 1/23/2020
 * Time: 3:25 PM
 */

namespace App\EventSubscribers;


use App\Entity\BDatabase;
use App\Entity\Connection;
use App\Service\EncryptorInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class DoctrineEventSubscriber implements EventSubscriber
{
    private $encryptor;
    public function __construct(EncryptorInterface $encryptor)
    {
        $this->encryptor = $encryptor;
    }

    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof Connection)
        {
            $entity->setIv();
            $passToBeEncrypted = $entity->getPassword();
            $encryptedPassword = $this->encryptor->encrypt($passToBeEncrypted, $entity);

            $entity->setPassword($encryptedPassword . '-HARDCODED');

            return;

        }elseif ($entity instanceof BDatabase)
        {
            $passToBeEncrypted = $entity->getPassword();
            $entity->setPassword($passToBeEncrypted .'HARDCODED');

            return;

        }else return;
    }
}