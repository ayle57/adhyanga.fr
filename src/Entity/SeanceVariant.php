<?php

namespace App\Entity;

use App\Repository\SeanceVariantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeanceVariantRepository::class)]
class SeanceVariant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'seanceVariants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Seance $seance = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Veuillez entrer une durée en minutes")]
    private ?int $durationMinutes = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Veuillez entrer un prix de base")]
    private ?int $base_price = null;

    /**
     * @var Collection<int, FormulaItem>
     */
    #[ORM\OneToMany(targetEntity: FormulaItem::class, mappedBy: 'seanceVariant')]
    private Collection $formulaItems;

    /**
     * @var Collection<int, Appointment>
     */
    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'seanceVariant')]
    private Collection $appointments;

    public function __construct()
    {
        $this->formulaItems = new ArrayCollection();
        $this->appointments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeance(): ?Seance
    {
        return $this->seance;
    }

    public function setSeance(?Seance $seance): static
    {
        $this->seance = $seance;

        return $this;
    }

    public function getDurationMinutes(): ?int
    {
        return $this->durationMinutes;
    }

    public function setDurationMinutes(int $durationMinutes): static
    {
        $this->durationMinutes = $durationMinutes;

        return $this;
    }

    public function getBasePrice(): ?int
    {
        return $this->base_price;
    }

    public function setBasePrice(int $base_price): static
    {
        $this->base_price = $base_price;

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
            $formulaItem->setSeanceVariant($this);
        }

        return $this;
    }

    public function removeFormulaItem(FormulaItem $formulaItem): static
    {
        if ($this->formulaItems->removeElement($formulaItem)) {
            // set the owning side to null (unless already changed)
            if ($formulaItem->getSeanceVariant() === $this) {
                $formulaItem->setSeanceVariant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointments(): Collection
    {
        return $this->appointments;
    }

    public function addAppointment(Appointment $appointment): static
    {
        if (!$this->appointments->contains($appointment)) {
            $this->appointments->add($appointment);
            $appointment->setSeanceVariant($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getSeanceVariant() === $this) {
                $appointment->setSeanceVariant(null);
            }
        }

        return $this;
    }
}
