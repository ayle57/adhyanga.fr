<?php

namespace App\Entity;

use App\Enum\PaymentMethodEnum;
use App\Enum\PaymentStatusEnum;
use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $paidAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\OneToOne(inversedBy: 'payment', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?GiftCard $giftCard = null;

    #[ORM\Column(enumType: PaymentMethodEnum::class)]
    private PaymentMethodEnum $method;

    #[ORM\Column(enumType: PaymentStatusEnum::class)]
    private PaymentStatusEnum $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaidAt(): ?\DateTime
    {
        return $this->paidAt;
    }

    public function setPaidAt(?\DateTime $paidAt): static
    {
        $this->paidAt = $paidAt;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getGiftCard(): ?GiftCard
    {
        return $this->giftCard;
    }

    public function setGiftCard(GiftCard $giftCard): static
    {
        $this->giftCard = $giftCard;

        if ($giftCard->getPayment() !== $this) {
            $giftCard->setPayment($this);
        }

        return $this;
    }

    public function getMethod(): PaymentMethodEnum
    {
        return $this->method;
    }

    public function setMethod(PaymentMethodEnum $method): static
    {
        $this->method = $method;

        return $this;
    }

    public function getStatus(): PaymentStatusEnum
    {
        return $this->status;
    }

    public function setStatus(PaymentStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }
}
