<?php

namespace App\Entity;

use App\Repository\MatterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatterRepository::class)
 */
class Matter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=TextBook::class, mappedBy="matter", orphanRemoval=true)
     */
    private $textBooks;

    public function __construct()
    {
        $this->textBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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
     * @return Collection|TextBook[]
     */
    public function getTextBooks(): Collection
    {
        return $this->textBooks;
    }

    public function addTextBook(TextBook $textBook): self
    {
        if (!$this->textBooks->contains($textBook)) {
            $this->textBooks[] = $textBook;
            $textBook->setMatter($this);
        }

        return $this;
    }

    public function removeTextBook(TextBook $textBook): self
    {
        if ($this->textBooks->removeElement($textBook)) {
            // set the owning side to null (unless already changed)
            if ($textBook->getMatter() === $this) {
                $textBook->setMatter(null);
            }
        }

        return $this;
    }
}
