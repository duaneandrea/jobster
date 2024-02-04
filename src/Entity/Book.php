<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $bookName = null;

    #[ORM\Column(nullable: true)]
    private ?int $numPages = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $bookURL = null;

    #[ORM\Column(length: 1024)]
    private ?string $coverURL = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookName(): ?string
    {
        return $this->bookName;
    }

    public function setBookName(?string $bookName): static
    {
        $this->bookName = $bookName;

        return $this;
    }

    public function getNumPages(): ?int
    {
        return $this->numPages;
    }

    public function setNumPages(?int $numPages): static
    {
        $this->numPages = $numPages;

        return $this;
    }

    public function getBookURL(): ?string
    {
        return $this->bookURL;
    }

    public function setBookURL(?string $bookURL): static
    {
        $this->bookURL = $bookURL;

        return $this;
    }

    public function getCoverURL(): ?string
    {
        return $this->coverURL;
    }

    public function setCoverURL(string $coverURL): static
    {
        $this->coverURL = $coverURL;

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
}
