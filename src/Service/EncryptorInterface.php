<?php

namespace App\Service;


use App\Entity\Interfaces\IEncryptable;

interface EncryptorInterface
{

    public function encrypt(string $stringToBeEncrypted, IEncryptable $encryptable): string ;
    public function decrypt(string $stringToBeDecrypted, IEncryptable $encryptable): ?string ;
    function generateIV(): string ;
    function fetchEncryptorPassphrase(IEncryptable $encryptable): string;
}