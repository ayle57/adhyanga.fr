<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("customer_table")]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(max: 255, maxMessage: "Veuillez entrer un prénom de moins de 255 caractères")]
    #[Groups("customer_table")]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(max: 255, maxMessage: "Veuillez entrer un nom de famille de moins de 255 caractères")]
    #[Assert\NotBlank(message: "Veuillez entrer un nom de famille")]
    #[Groups("customer_table")]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(max: 255, maxMessage: "Veuillez entrer une adresse email de moins de 255 caractères")]
    #[Assert\NotBlank(message: "Veuillez entrer une adresse email")]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(max: 50, maxMessage: "Veuillez entrer un numéro de téléphone de moins de 50 caractères")]
    #[Assert\NotBlank(message: "Veuillez entrer un numéro de téléphone")]
    #[Assert\Regex(
        pattern: "/^(?:\+33|0)[1-9](?:[\s\.]?\d{2}){4}$/",
        message: "Numéro de téléphone français invalide"
    )]
    private ?string $phone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    #[Assert\NotBlank(message: "Veuillez entrer une date de création")]
    #[Groups("customer_table")]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, Appointment>
     */
    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'customer')]
    #[ORM\OrderBy(["startTime" => "DESC"])]
    private Collection $appointments;

    /**
     * @var Collection<int, GiftCard>
     */
    #[ORM\OneToMany(targetEntity: GiftCard::class, mappedBy: 'purchaser', orphanRemoval: true)]
    private Collection $giftCards;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->setUpdatedAt(new \DateTimeImmutable());
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->appointments = new ArrayCollection();
        $this->giftCards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

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
            $appointment->setCustomer($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getCustomer() === $this) {
                $appointment->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GiftCard>
     */
    public function getGiftCards(): Collection
    {
        return $this->giftCards;
    }

    public function addGiftCard(GiftCard $giftCard): static
    {
        if (!$this->giftCards->contains($giftCard)) {
            $this->giftCards->add($giftCard);
            $giftCard->setPurchaser($this);
        }

        return $this;
    }

    public function removeGiftCard(GiftCard $giftCard): static
    {
        if ($this->giftCards->removeElement($giftCard)) {
            // set the owning side to null (unless already changed)
            if ($giftCard->getPurchaser() === $this) {
                $giftCard->setPurchaser(null);
            }
        }

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
