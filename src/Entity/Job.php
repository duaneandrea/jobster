<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    //Job types constants
    const JOB_TYPE_FULL_TIME = "FULL TIME";
    const JOB_TYPE_PART_TIME = "PART TIME";
    const JOB_TYPE_CONTRACT = "CONTRACT";
    const JOB_TYPE_TEMPORARY = "TEMPORARY";
    const JOB_TYPE_INTERNSHIP = "INTERNSHIP";
    const JOB_TYPE_OTHER = "OTHER";

    //Experience Level Constants
    const EXPERIENCE_LEVEL_INTERN = "INTERNSHIP";
    const EXPERIENCE_LEVEL_ENTRY_LEVEL = "ENTRY LEVEL";
    const EXPERIENCE_LEVEL_ASSOCIATE = "ASSOCIATE";
    const EXPERIENCE_LEVEL_MID_SENIOR = "MID-SENIOR";
    const EXPERIENCE_LEVEL_DIRECTOR = "DIRECTOR";
    const EXPERIENCE_LEVEL_EXECUTIVE = "EXECUTIVE";

    //Job Locations Constants
    const JOB_LOCATION_REMOTE = "REMOTE";
    const JOB_LOCATION_ON_SITE = "ON-SITE";
    const JOB_LOCATION_HYBRID = "HYBRID";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    private ?string $jobTitle = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $jobDescription = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $skills = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jobType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $experienceLevel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $salaryRange = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $applicationDeadline = null;

    #[ORM\ManyToOne(inversedBy: 'jobs')]
    private ?Countries $country = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $recordHash = null;

    #[ORM\ManyToOne(inversedBy: 'yes')]
    private ?User $jobOwner = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreated = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isDeleted = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateUpdated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): static
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(?string $jobDescription): static
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(?string $skills): static
    {
        $this->skills = $skills;

        return $this;
    }

    public function getJobType(): ?string
    {
        return $this->jobType;
    }

    public function setJobType(?string $jobType): static
    {
        $this->jobType = $jobType;

        return $this;
    }

    public function getExperienceLevel(): ?string
    {
        return $this->experienceLevel;
    }

    public function setExperienceLevel(?string $experienceLevel): static
    {
        $this->experienceLevel = $experienceLevel;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getSalaryRange(): ?string
    {
        return $this->salaryRange;
    }

    public function setSalaryRange(?string $salaryRange): static
    {
        $this->salaryRange = $salaryRange;

        return $this;
    }

    public function getApplicationDeadline(): ?\DateTimeInterface
    {
        return $this->applicationDeadline;
    }

    public function setApplicationDeadline(?\DateTimeInterface $applicationDeadline): static
    {
        $this->applicationDeadline = $applicationDeadline;

        return $this;
    }

    public function getCountry(): ?Countries
    {
        return $this->country;
    }

    public function setCountry(?Countries $country): static
    {
        $this->country = $country;

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

    public function getJobOwner(): ?User
    {
        return $this->jobOwner;
    }

    public function setJobOwner(?User $jobOwner): static
    {
        $this->jobOwner = $jobOwner;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(?\DateTimeInterface $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

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

    public function getDateUpdated(): ?\DateTimeInterface
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(?\DateTimeInterface $dateUpdated): static
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }
}
