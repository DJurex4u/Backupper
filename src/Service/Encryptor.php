<?php

namespace App\Service;


use App\Entity\Interfaces\IEncryptable;

class Encryptor implements EncryptorInterface
{
    const CHIPPER = '';
    const OPTIONS = 0;
    /**
     * @var string
     */
    private $bDatabasePassphrase;

    /**
     * Encryptor constructor.
     * @param string $bDatabasePassphrase
     */
    public function __construct(
        string $bDatabasePassphrase
    )
    {
        $this->bDatabasePassphrase = $bDatabasePassphrase;
    }


    public function encrypt(string $stringToBeEncrypted, IEncryptable $encryptable): string
    {
        // TODO: Implement encrypt() method.
        $passphrase = $this->fetchEncryptorPassphrase($encryptable);
        $iv = $this->generateIV($encryptable);
    }

    public function decrypt(string $stringToBeEncrypted, IEncryptable $encryptable): string
    {
        // TODO: Implement decrypt() method.
    }

    function generateIV(): string
    {
        // TODO: Implement generateIV() method.
    }

    function fetchEncryptorPassphrase(IEncryptable $encryptable): string
    {
        switch (get_class($encryptable)) {
            case 'App\Entity\Bdatabase':
                return $this->bDatabasePassphrase;
            default:
                return false;
        }
        // TODO: Implement fetchEncryptorPassphrase() method.
    }
}