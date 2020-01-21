<?php

namespace App\Entity\Interfaces;

interface IEncryptable
{
    public function getIv(): ?string;
    public function setIv(): self;
    public function getPassword(): ?string;
    public function setPassword(string $password): self;

}