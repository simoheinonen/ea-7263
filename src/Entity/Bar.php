<?php

namespace App\Entity;

use App\Repository\BarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BarRepository::class)]
class Bar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 255)]
    public ?string $name = null;

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @var Collection<int, Foo>
     */
    #[ORM\OneToMany(targetEntity: Foo::class, mappedBy: 'bar')]
    public Collection $foos;

    public function __construct()
    {
        $this->foos = new ArrayCollection();
    }

    /**
     * @return Collection<int, Foo>
     */
    public function getFoos(): Collection
    {
        return $this->foos;
    }

    public function addFoo(Foo $foo): static
    {
        if (!$this->foos->contains($foo)) {
            $this->foos->add($foo);
            $foo->setBar($this);
        }

        return $this;
    }

    public function removeFoo(Foo $foo): static
    {
        if ($this->foos->removeElement($foo)) {
            // set the owning side to null (unless already changed)
            if ($foo->getBar() === $this) {
                $foo->setBar(null);
            }
        }

        return $this;
    }
}
