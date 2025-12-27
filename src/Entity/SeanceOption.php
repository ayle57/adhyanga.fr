<?php

namespace App\Entity;

use App\Repository\SeanceOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeanceOptionRepository::class)]
class SeanceOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'seanceOptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Seance $seance = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Veuillez entrer un nom d'option de séance")]
    #[Assert\Length(max: 255, maxMessage: "Veuillez entrer un nom d'option de séance de moins de 255 caractères")]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Veuillez entrer une durée")]
    private ?int $extraTimeMinutes = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Veuillez entrer un prix")]
    private ?int $extraPrice = null;

    /**
     * @var Collection<int, AppointmentOption>
     */
    #[ORM\OneToMany(targetEntity: AppointmentOption::class, mappedBy: 'seanceOption')]
    private Collection $appointmentOptions;

    public function __construct()
    {
        $this->appointmentOptions = new ArrayCollection();
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

    public function getExtraTimeMinutes(): ?int
    {
        return $this->extraTimeMinutes;
    }

    public function setExtraTimeMinutes(int $extraTimeMinutes): static
    {
        $this->extraTimeMinutes = $extraTimeMinutes;

        return $this;
    }

    public function getExtraPrice(): ?int
    {
        return $this->extraPrice;
    }

    public function setExtraPrice(int $extraPrice): static
    {
        $this->extraPrice = $extraPrice;

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
            $appointmentOption->setSeanceOption($this);
        }

        return $this;
    }

    public function removeAppointmentOption(AppointmentOption $appointmentOption): static
    {
        if ($this->appointmentOptions->removeElement($appointmentOption)) {
            // set the owning side to null (unless already changed)
            if ($appointmentOption->getSeanceOption() === $this) {
                $appointmentOption->setSeanceOption(null);
            }
        }

        return $this;
    }
}
