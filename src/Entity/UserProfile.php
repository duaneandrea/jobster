<?php

namespace App\Entity;

use App\Repository\UserProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserProfileRepository::class)]
class UserProfile
{
    //define entity constants

    const LANG_ENGLISH = 'ENGLISH';
    const LANG_SPANISH = 'SPANISH';
    const LANG_SHONA = 'SHONA';

    const STATUS_PENDING_APPROVAL = 1;
    const STATUS_APPROVED = 2;
    const STATUS_VERIFIED = 3;
    const STATUS_TEMPORARY_BAN = 4;
    const STATUS_PERMANENT_BAN = 5;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cellNumber = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $whatsApp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $houseAddress = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $userBio = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(nullable: true)]
    private ?int $approvalStatusId = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ipAddress = null;

    #[ORM\Column(nullable: true)]
    private ?int $loginCount = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $recordHash = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isDeleted = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToOne(mappedBy: 'userProfileId', cascade: ['persist', 'remove'])]
    private ?User $userId = null;

    #[ORM\ManyToOne(inversedBy: 'userProfiles')]
    private ?Countries $countryId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCellNumber(): ?string
    {
        return $this->cellNumber;
    }

    public function setCellNumber(?string $cellNumber): static
    {
        $this->cellNumber = $cellNumber;

        return $this;
    }

    public function getWhatsApp(): ?string
    {
        return $this->whatsApp;
    }

    public function setWhatsApp(?string $whatsApp): static
    {
        $this->whatsApp = $whatsApp;

        return $this;
    }

    public function getHouseAddress(): ?string
    {
        return $this->houseAddress;
    }

    public function setHouseAddress(?string $houseAddress): static
    {
        $this->houseAddress = $houseAddress;

        return $this;
    }

    public function getUserBio(): ?string
    {
        return $this->userBio;
    }

    public function setUserBio(?string $userBio): static
    {
        $this->userBio = $userBio;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): static
    {
        $this->language = $language;

        return $this;
    }
    

    public function getApprovalStatusId(): ?int
    {
        return $this->approvalStatusId;
    }

    public function setApprovalStatusId(?int $approvalStatusId): static
    {
        $this->approvalStatusId = $approvalStatusId;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): static
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getLoginCount(): ?int
    {
        return $this->loginCount;
    }

    public function setLoginCount(?int $loginCount): static
    {
        $this->loginCount = $loginCount;

        return $this;
    }

    public function getRecordHash(): ?string
    {
        return $this->recordHash;
    }

    public function setRecordHash(?string $recordHash): static
    {
        $this->recordHash = $recordHash;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        // unset the owning side of the relation if necessary
        if ($userId === null && $this->userId !== null) {
            $this->userId->setUserProfileId(null);
        }

        // set the owning side of the relation if necessary
        if ($userId !== null && $userId->getUserProfileId() !== $this) {
            $userId->setUserProfileId($this);
        }

        $this->userId = $userId;

        return $this;
    }

    public function getCountryId(): ?Countries
    {
        return $this->countryId;
    }

    public function setCountryId(?Countries $countryId): static
    {
        $this->countryId = $countryId;

        return $this;
    }
}
