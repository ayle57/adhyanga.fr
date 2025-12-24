<?php

namespace App\Entity;

use App\Enum\AppointmentStatusEnum;
use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Customer $customer = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?SeanceVariant $seanceVariant = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?FormulaItem $formulaItem = null;

    #[ORM\Column]
    private ?\DateTime $startTime = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $endTime = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(enumType: AppointmentStatusEnum::class)]
    private AppointmentStatusEnum $status;

    /**
     * @var Collection<int, AppointmentOption>
     */
    #[ORM\OneToMany(targetEntity: AppointmentOption::class, mappedBy: 'appointment')]
    private Collection $appointmentOptions;

    public function __construct()
    {
        $this->appointmentOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;

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

    public function getFormulaItem(): ?FormulaItem
    {
        return $this->formulaItem;
    }

    public function setFormulaItem(?FormulaItem $formulaItem): static
    {
        $this->formulaItem = $formulaItem;

        return $this;
    }

    public function getStartTime(): ?\DateTime
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTime $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTime
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTime $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getStatus(): AppointmentStatusEnum
    {
        return $this->status;
    }

    public function setStatus(AppointmentStatusEnum $status): Appointment
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Collection<int, AppointmentOption>
     */
    public function getAppointmentOptions(): Collection
    {
        return $this->appointmentOptions;
    }

    public function addAppointmentOption(AppointmentOption $appointmentOption): static
    {
        if (!$this->appointmentOptions->contains($appointmentOption)) {
            $this->appointmentOptions->add($appointmentOption);
            $appointmentOption->setAppointment($this);
        }

        return $this;
    }

    public function removeAppointmentOption(AppointmentOption $appointmentOption): static
    {
        if ($this->appointmentOptions->removeElement($appointmentOption)) {
            // set the owning side to null (unless already changed)
            if ($appointmentOption->getAppointment() === $this) {
                $appointmentOption->setAppointment(null);
            }
        }

        return $this;
    }
}
