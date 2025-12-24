<?php

namespace App\Entity;

use App\Repository\AppointmentOptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentOptionRepository::class)]
class AppointmentOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'appointmentOptions')]
    private ?Appointment $appointment = null;

    #[ORM\ManyToOne(inversedBy: 'appointmentOptions')]
    private ?SeanceOption $seanceOption = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppointment(): ?Appointment
    {
        return $this->appointment;
    }

    public function setAppointment(?Appointment $appointment): static
    {
        $this->appointment = $appointment;

        return $this;
    }

    public function getSeanceOption(): ?SeanceOption
    {
        return $this->seanceOption;
    }

    public function setSeanceOption(?SeanceOption $seanceOption): static
    {
        $this->seanceOption = $seanceOption;

        return $this;
    }
}
