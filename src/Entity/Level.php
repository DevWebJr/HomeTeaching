<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LevelRepository::class)
 */
class Level
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
    private $grade;

    /**
     * @ORM\OneToMany(targetEntity=SchoolClass::class, mappedBy="level", orphanRemoval=true)
     */
    private $schoolClasses;

    /**
     * @ORM\OneToMany(targetEntity=TextBook::class, mappedBy="level")
     */
    private $textBooks;

    public function __construct()
    {
        $this->schoolClasses = new ArrayCollection();
        $this->textBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return Collection|SchoolClass[]
     */
    public function getSchoolClasses(): Collection
    {
        return $this->schoolClasses;
    }

    public function addSchoolClass(SchoolClass $schoolClass): self
    {
        if (!$this->schoolClasses->contains($schoolClass)) {
            $this->schoolClasses[] = $schoolClass;
            $schoolClass->setLevel($this);
        }

        return $this;
    }

    public function removeSchoolClass(SchoolClass $schoolClass): self
    {
        if ($this->schoolClasses->removeElement($schoolClass)) {
            // set the owning side to null (unless already changed)
            if ($schoolClass->getLevel() === $this) {
                $schoolClass->setLevel(null);
            }
        }

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
            $textBook->setLevel($this);
        }

        return $this;
    }

    public function removeTextBook(TextBook $textBook): self
    {
        if ($this->textBooks->removeElement($textBook)) {
            // set the owning side to null (unless already changed)
            if ($textBook->getLevel() === $this) {
                $textBook->setLevel(null);
            }
        }

        return $this;
    }
}
