<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountriesRepository::class)]
class Countries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $iso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $countryName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iso3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numcode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phonecode = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isDeleted = null;

    #[ORM\Column(nullable: true)]
    private ?int $recordDate = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'countryId', targetEntity: UserProfile::class)]
    private Collection $userProfiles;

    public function __construct()
    {
        $this->userProfiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIso(): ?string
    {
        return $this->iso;
    }

    public function setIso(?string $iso): static
    {
        $this->iso = $iso;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(?string $countryName): static
    {
        $this->countryName = $countryName;

        return $this;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(?string $iso3): static
    {
        $this->iso3 = $iso3;

        return $this;
    }

    public function getNumcode(): ?string
    {
        return $this->numcode;
    }

    public function setNumcode(?string $numcode): static
    {
        $this->numcode = $numcode;

        return $this;
    }

    public function getPhonecode(): ?string
    {
        return $this->phonecode;
    }

    public function setPhonecode(?string $phonecode): static
    {
        $this->phonecode = $phonecode;

        return $this;
    }

    public function isIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getRecordDate(): ?int
    {
        return $this->recordDate;
    }

    public function setRecordDate(?int $recordDate): static
    {
        $this->recordDate = $recordDate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, UserProfile>
     */
    public function getUserProfiles(): Collection
    {
        return $this->userProfiles;
    }

    public function addUserProfile(UserProfile $userProfile): static
    {
        if (!$this->userProfiles->contains($userProfile)) {
            $this->userProfiles->add($userProfile);
            $userProfile->setCountryId($this);
        }

        return $this;
    }

    public function removeUserProfile(UserProfile $userProfile): static
    {
        if ($this->userProfiles->removeElement($userProfile)) {
            // set the owning side to null (unless already changed)
            if ($userProfile->getCountryId() === $this) {
                $userProfile->setCountryId(null);
            }
        }

        return $this;
    }
}
