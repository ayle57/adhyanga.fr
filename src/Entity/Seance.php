<?php

namespace App\Entity;

use App\Enum\SeanceCategoryEnum;
use App\Repository\SeanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Veuillez entrer un nom pour la séance")]
    #[Assert\Length(max: 255, maxMessage: "Veuillez entrer un nom de séance de moins de 255 caractères")]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(enumType: SeanceCategoryEnum::class)]
    private SeanceCategoryEnum $category;

    /**
     * @var Collection<int, SeanceVariant>
     */
    #[ORM\OneToMany(targetEntity: SeanceVariant::class, mappedBy: 'seance', orphanRemoval: true)]
    private Collection $seanceVariants;

    /**
     * @var Collection<int, SeanceOption>
     */
    #[ORM\OneToMany(targetEntity: SeanceOption::class, mappedBy: 'seance', orphanRemoval: true)]
    private Collection $seanceOptions;

    public function __construct()
    {
        $this->seanceVariants = new ArrayCollection();
        $this->seanceOptions = new ArrayCollection();
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

    public function getCategory(): SeanceCategoryEnum
    {
        return $this->category;
    }

    public function setCategory(SeanceCategoryEnum $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, SeanceVariant>
     */
    public function getSeanceVariants(): Collection
    {
        return $this->seanceVariants;
    }

    public function addSeanceVariant(SeanceVariant $seanceVariant): static
    {
        if (!$this->seanceVariants->contains($seanceVariant)) {
            $this->seanceVariants->add($seanceVariant);
            $seanceVariant->setSeance($this);
        }

        return $this;
    }

    public function removeSeanceVariant(SeanceVariant $seanceVariant): static
    {
        if ($this->seanceVariants->removeElement($seanceVariant)) {
            // set the owning side to null (unless already changed)
            if ($seanceVariant->getSeance() === $this) {
                $seanceVariant->setSeance(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SeanceOption>
     */
    public function getSeanceOptions(): Collection
    {
        return $this->seanceOptions;
    }

    public function addSeanceOption(SeanceOption $seanceOption): static
    {
        if (!$this->seanceOptions->contains($seanceOption)) {
            $this->seanceOptions->add($seanceOption);
            $seanceOption->setSeance($this);
        }

        return $this;
    }

    public function removeSeanceOption(SeanceOption $seanceOption): static
    {
        if ($this->seanceOptions->removeElement($seanceOption)) {
            // set the owning side to null (unless already changed)
            if ($seanceOption->getSeance() === $this) {
                $seanceOption->setSeance(null);
            }
        }

        return $this;
    }
}
