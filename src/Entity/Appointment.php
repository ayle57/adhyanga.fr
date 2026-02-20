<?php

namespace App\Entity;

use App\Enum\AppointmentStatusEnum;
use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("appointment_table")]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("appointment_table")]
    private ?Customer $customer = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?SeanceVariant $seanceVariant = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?FormulaItem $formulaItem = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Veuillez entrer une date et une heure de départ")]
    #[Assert\DateTime(message: "Veuillez entrer une date et une heure")]
    #[Groups("appointment_table")]
    private ?\DateTime $startTime = null;

    #[ORM\Column(nullable: true)]
    #[Assert\DateTime]
    private ?\DateTime $endTime = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(enumType: AppointmentStatusEnum::class)]
    #[Groups("appointment_table")]
    private AppointmentStatusEnum $status;

    /**
     * @var Collection<int, AppointmentOption>
     */
    #[ORM\OneToMany(targetEntity: AppointmentOption::class, mappedBy: 'appointment')]
    private Collection $appointmentOptions;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Veuillez entrer une date de création")]
    #[Groups("appointment_table")]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Veuillez entrer une date de création")]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->setUpdatedAt(new \DateTimeImmutable());
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
