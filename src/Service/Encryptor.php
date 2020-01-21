<?php

namespace App\Service;


use App\Entity\Interfaces\IEncryptable;
use Doctrine\ORM\Mapping as ORM;

class Encryptor implements EncryptorInterface
{
    const CHIPPER = 'AES-128-GCM';
    const TAG_LENGHT = 16;
    const OPTIONS = 0;
    /**
     * @var string
     */
    private $passphrase;


    //idk what $tag does, but it has to be defined as variable since openssl_encrypt functiong expects &$tag to write something and needed to be passed to openssl_decrypt to read it
    private $tag = '';


//    /**
//     * Encryptor constructor.
//     * @param string $passphrase
//     */
//    public function __construct(
//        string $passphrase
//    )
//    {
//        $this->bDatabasePassphrase = $passphrase;
//    }


    public function encrypt(string $stringToBeEncrypted, IEncryptable $encryptable): string
    {
        // TODO:
        $passphrase = $this->fetchEncryptorPassphrase($encryptable);

        $encryptable->setIv();
        $encryptedPassword = openssl_encrypt($stringToBeEncrypted, self::CHIPPER, $passphrase, OPENSSL_RAW_DATA, $encryptable->getIv(), $this->tag);
        return $encryptedPassword;
    }

    public function decrypt(string $stringToBeDecrypted, IEncryptable $encryptable): string
    {
        $passphrase = $this->fetchEncryptorPassphrase($encryptable);  //TODO: hardcoded return of function

        $originalPassword = openssl_decrypt($stringToBeDecrypted, self::CHIPPER, $passphrase, OPENSSL_RAW_DATA, $encryptable->getIv(), $this->tag);

        return $originalPassword;

    }

    function generateIV(): string
    {
        return substr(md5(mt_rand()), 0, 10);
    }

    function fetchEncryptorPassphrase(IEncryptable $encryptable): string
    {

        // TODO revalidate function, implement fetchEncryptorPassphrase() method.
        return 'passphrase';


//        switch (get_class($encryptable)) {
//            case 'App\Entity\Connection.php':
//                return $this->ConnectionPassphrase;
//            default:
//                return false;
//        }

    }
}