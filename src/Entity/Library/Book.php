<?php

namespace App\Entity\Library;

use App\Repository\Library\BookRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTime $create_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $start_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $end_at = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    #[ORM\Column(nullable: true, length: 255)]
    private ?string $source = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    public function __construct(string $name, string $status, DateTime $start_at = null, DateTime $end_at = null)
    {
        $this->name = $name;
        $this->status = $status;
        $this->create_at = new DateTime();
        $this->start_at = $start_at;
        $this->end_at = $end_at;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStartAt(): ?\DateTime
    {
        return $this->start_at;
    }

    public function setStartAt(\DateTime $start_at): static
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getEndAt(): ?\DateTime
    {
        return $this->end_at;
    }

    public function setEndAt(\DateTime $end_at): static
    {
        $this->end_at = $end_at;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getCreateAt(): ?\DateTime
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTime $create_at): static
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }
    
}
