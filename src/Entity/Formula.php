<?php

namespace App\Entity;

use App\Repository\FormulaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaRepository::class)]
class Formula
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $price = null;

    /**
     * @var Collection<int, FormulaItem>
     */
    #[ORM\OneToMany(targetEntity: FormulaItem::class, mappedBy: 'formula', orphanRemoval: true)]
    private Collection $formulaItems;

    public function __construct()
    {
        $this->formulaItems = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, FormulaItem>
     */
    public function getFormulaItems(): Collection
    {
        return $this->formulaItems;
    }

    public function addFormulaItem(FormulaItem $formulaItem): static
    {
        if (!$this->formulaItems->contains($formulaItem)) {
            $this->formulaItems->add($formulaItem);
            $formulaItem->setFormula($this);
        }

        return $this;
    }

    public function removeFormulaItem(FormulaItem $formulaItem): static
    {
        if ($this->formulaItems->removeElement($formulaItem)) {
            // set the owning side to null (unless already changed)
            if ($formulaItem->getFormula() === $this) {
                $formulaItem->setFormula(null);
            }
        }

        return $this;
    }
}
