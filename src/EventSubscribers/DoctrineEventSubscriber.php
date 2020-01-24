<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 1/23/2020
 * Time: 3:25 PM
 */

namespace App\EventSubscribers;

use App\Entity\Interfaces\IEncryptable;
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
            Events::prePersist,
            Events::postLoad
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof IEncryptable)
        {
            $passToBeEncrypted = $entity->getPassword();
            $encryptedPassword = $this->encryptor->encrypt($passToBeEncrypted, $entity);
            $entity->setPassword($encryptedPassword);
        }

        return;
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();


        if ($entity instanceof IEncryptable)
        {
            $passToBeDecrypted = $entity->getPassword();
            echo "<br> Encrypted: ";
            var_dump($passToBeDecrypted);
            $decryptedPassword = $this->encryptor->decrypt($passToBeDecrypted, $entity);
            echo "<br> Decrypted: ";
            var_dump($decryptedPassword);

            $entity->setPassword($decryptedPassword);
        }

        return;
    }
}