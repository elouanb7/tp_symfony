<?php

namespace App\Entity;

use App\Repository\SoireeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SoireeRepository::class)
 */
class Soiree
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbUsers;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $moneySpent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $averagePerUser;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $creatorId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=UserSoiree::class, mappedBy="soiree")
     */
    private $users;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isFull;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbUsers(): ?int
    {
        return $this->nbUsers;
    }

    public function setNbUsers(?int $nbUsers): self
    {
        $this->nbUsers = $nbUsers;

        return $this;
    }

    public function getMoneySpent(): ?float
    {
        return $this->moneySpent;
    }

    public function setMoneySpent(?float $moneySpent): self
    {
        $this->moneySpent = $moneySpent;

        return $this;
    }

    public function getAveragePerUser(): ?float
    {
        return $this->averagePerUser;
    }

    public function setAveragePerUser(?float $averagePerUser): self
    {
        $this->averagePerUser = $averagePerUser;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCreatorId(): ?int
    {
        return $this->creatorId;
    }

    public function setCreatorId(?int $creatorId): self
    {
        $this->creatorId = $creatorId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|UserSoiree[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(UserSoiree $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setSoiree($this);
        }

        return $this;
    }

    public function removeUser(UserSoiree $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getSoiree() === $this) {
                $user->setSoiree(null);
            }
        }

        return $this;
    }

    public function getIsFull(): ?bool
    {
        return $this->isFull;
    }

    public function setIsFull(?bool $isFull): self
    {
        $this->isFull = $isFull;

        return $this;
    }
}
