<?php

namespace App\Entity;

use App\Repository\FooRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FooRepository::class)]
class Foo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 255)]
    public ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'foos')]
    public ?Bar $bar = null;

    public function __toString(): string
    {
        return $this->name;
    }
}
