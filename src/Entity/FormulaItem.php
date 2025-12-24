<?php

namespace App\Entity;

use App\Repository\FormulaItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaItemRepository::class)]
class FormulaItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'formulaItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formula $formula = null;

    #[ORM\ManyToOne(inversedBy: 'formulaItems')]
    private ?SeanceVariant $seanceVariant = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity = null;

    /**
     * @var Collection<int, Appointment>
     */
    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'formulaItem')]
    private Collection $appointments;

    public function __construct()
    {
        $this->appointments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormula(): ?Formula
    {
        return $this->formula;
    }

    public function setFormula(?Formula $formula): static
    {
        $this->formula = $formula;

        return $this;
    }

    public function getSeanceVariant(): ?SeanceVariant
    {
        return $this->seanceVariant;
    }

    public function setSeanceVariant(?SeanceVariant $seanceVariant): static
    {
        $this->seanceVariant = $seanceVariant;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

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
            $appointment->setFormulaItem($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getFormulaItem() === $this) {
                $appointment->setFormulaItem(null);
            }
        }

        return $this;
    }
}
