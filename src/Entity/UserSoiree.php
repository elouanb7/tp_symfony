<?php

namespace App\Entity;

use App\Repository\UserSoireeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserSoireeRepository::class)
 */
class UserSoiree
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isGuest;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isHost;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="soirees")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Soiree::class, inversedBy="users")
     */
    private $soiree;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $expenses;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $debts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsGuest(): ?bool
    {
        return $this->isGuest;
    }

    public function setIsGuest(?bool $isGuest): self
    {
        $this->isGuest = $isGuest;

        return $this;
    }

    public function getIsHost(): ?bool
    {
        return $this->isHost;
    }

    public function setIsHost(?bool $isHost): self
    {
        $this->isHost = $isHost;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSoiree(): ?Soiree
    {
        return $this->soiree;
    }

    public function setSoiree(?Soiree $soiree): self
    {
        $this->soiree = $soiree;

        return $this;
    }

    public function getExpenses(): ?float
    {
        return $this->expenses;
    }

    public function setExpenses(?float $expenses): self
    {
        $this->expenses = $expenses;

        return $this;
    }

    public function getDebts(): ?float
    {
        return $this->debts;
    }

    public function setDebts(?float $debts): self
    {
        $this->debts = $debts;

        return $this;
    }
}
