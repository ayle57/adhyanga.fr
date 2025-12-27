<?php

namespace App\Entity;

use App\Repository\FormulaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormulaRepository::class)]
class Formula
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(max: 255, maxMessage: "Veuillez entrer un nom de formule de moins de 255 caractères")]
    #[Assert\NotBlank(message: "Veuillez entrer un nom de formule")]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(max: 255, maxMessage: "Veuillez entrer une description de moins de 255 caractères")]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "Veuillez entrer un prix")]
    #[Assert\Type(type: 'numeric', message: "Veuillez entrer un prix qui est un nombre")]
    #[Assert\PositiveOrZero(message: "Veuillez entrer un prix n'étant pas négatif")]
    #[Assert\LessThan(
        value: 100000,
        message: "Veuillez entrer un prix en dessous de 100000 euro"
    )]
    private ?float $price = null;

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
