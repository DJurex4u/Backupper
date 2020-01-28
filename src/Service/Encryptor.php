<?php

namespace App\Service;


use App\Entity\Interfaces\IEncryptable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class Encryptor implements EncryptorInterface
{
    const CHIPPER = 'AES128';
    /**
     * @var string
     */
    private $passphrase;

    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }


    public function encrypt(string $stringToBeEncrypted, IEncryptable $encryptable): string
    {
        $passphrase = $this->fetchEncryptorPassphrase($encryptable);

        $encryptable->setIv($this->generateIV());
        $encryptedPassword = openssl_encrypt($stringToBeEncrypted, self::CHIPPER, $passphrase, 0, $encryptable->getIv());
        return $encryptedPassword;
    }

    public function decrypt(?string $stringToBeDecrypted, IEncryptable $encryptable): ?string
    {
        if (!$stringToBeDecrypted){
            return null;
        }
        $passphrase = $this->fetchEncryptorPassphrase($encryptable);
        $originalPassword = openssl_decrypt($stringToBeDecrypted, self::CHIPPER, $passphrase, 0, $encryptable->getIv());

        return $originalPassword;
    }

    function generateIV(): string
    {
        return substr(md5(mt_rand()), 0, 16);
    }

    /**
     * @param IEncryptable $encryptable
     * @return string
     */
    function fetchEncryptorPassphrase(IEncryptable $encryptable): string
    {
        switch (get_class($encryptable)) {
            case 'App\Entity\Connection':
                return $this->parameterBag->get("passphrases_connection");
            case 'App\Entity\BDatabase':
                return $this->parameterBag->get("passphrases_database");
            default:
                return false;
        }

    }
}