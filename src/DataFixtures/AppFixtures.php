<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Appointment;
use App\Entity\AppointmentOption;
use App\Entity\Formula;
use App\Entity\FormulaItem;
use App\Entity\Seance;
use App\Entity\SeanceOption;
use App\Entity\SeanceVariant;
use App\Entity\Customer;
use App\Entity\GiftCard;
use App\Entity\Payment;
use App\Enum\AppointmentStatusEnum;
use App\Enum\PaymentMethodEnum;
use App\Enum\PaymentStatusEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // -----------------------
        // 1. Customers
        // -----------------------
        $customers = [];
        foreach (range(1, 60) as $i) {
            $customer = new Customer();
            $customer
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setEmail($faker->unique()->safeEmail)
                ->setPhone($faker->phoneNumber)
                ->setNotes($faker->boolean(30) ? $faker->sentence : null)
                ->setCreatedAt(\DateTimeImmutable::createFromMutable(
                    $faker->dateTimeBetween('-2 years', 'now')
                ));
            $manager->persist($customer);
            $customers[] = $customer;
            $this->addReference('customer_'.$i, $customer);
        }

        // -----------------------
        // 2. Seances + Variants + Options
        // -----------------------
        $variants = [];
        $options  = [];
        foreach (range(1, 10) as $i) {
            $seance = new Seance();
            $seance
                ->setName($faker->words(3, true))
                ->setDescription($faker->paragraph())
                ->setCategory($faker->randomElement(\App\Enum\SeanceCategoryEnum::cases()));

            $manager->persist($seance);

            foreach ([30, 60, 90] as $index => $duration) {
                $variant = new SeanceVariant();
                $variant
                    ->setSeance($seance)
                    ->setDurationMinutes($duration)
                    ->setBasePrice($faker->numberBetween(60, 120));
                $manager->persist($variant);
                $variants[] = $variant;
            }

            foreach (range(1, $faker->numberBetween(1, 4)) as $j) {
                $option = new SeanceOption();
                $option
                    ->setName($faker->words(2, true))
                    ->setDescription($faker->paragraph())
                    ->setExtraTimeMinutes($faker->randomElement([0, 10, 15, 20]))
                    ->setExtraPrice($faker->numberBetween(5, 25))
                    ->setSeance($seance);
                $manager->persist($option);
                $options[] = $option;
            }
        }

        // -----------------------
        // 3. Formulas
        // -----------------------
        $formulas = [];
        foreach (range(1, 20) as $i) {
            $formula = new Formula();
            $formula
                ->setName($faker->words(2, true))
                ->setPrice($faker->numberBetween(10, 100));
            $manager->persist($formula);
            $formulas[] = $formula;
        }

        $manager->flush();

        // -----------------------
        // 4. Appointments + AppointmentOptions + FormulaItems
        // -----------------------
        foreach (range(1, 50) as $i) {
            $customer = $faker->randomElement($customers);
            $variant  = $faker->randomElement($variants);
            $start = $faker->dateTimeBetween('-1 month', '+1 month');

            $appointment = new Appointment();
            $appointment
                ->setCustomer($customer)
                ->setSeanceVariant($variant)
                ->setStartTime($start)
                ->setEndTime((clone $start)->modify("+{$variant->getDurationMinutes()} minutes"))
                ->setNotes($faker->boolean(30) ? $faker->sentence : null)
                ->setStatus($faker->randomElement(AppointmentStatusEnum::cases()));

            $manager->persist($appointment);

            foreach ($faker->randomElements($options, $faker->numberBetween(0, 3)) as $option) {
                $ao = new AppointmentOption();
                $ao->setAppointment($appointment)
                    ->setSeanceOption($option);
                $manager->persist($ao);
            }

            foreach ($faker->randomElements($formulas, $faker->numberBetween(0, 2)) as $formula) {
                $fi = new FormulaItem();
                $fi->addAppointment($appointment)
                    ->setFormula($formula)
                    ->setQuantity($faker->numberBetween(1, 3));
                $manager->persist($fi);
            }
        }

        // -----------------------
        // 5. GiftCards + Payments
        // -----------------------
        foreach (range(1, 20) as $i) {
            $customer = $faker->randomElement($customers);

            $giftCard = new GiftCard();
            $giftCard
                ->setPurchaser($customer)
                ->setRecipientName($faker->name)
                ->setAmount($faker->numberBetween(50, 200))
                ->setMessage($faker->boolean(50) ? $faker->sentence : null)
                ->setIsUsed($faker->boolean(20))
                ->setExpiresAt($faker->dateTimeBetween('+1 month', '+1 year'))
                ->setCode(strtoupper($faker->bothify('GC-####-???')));

            $manager->persist($giftCard);

            // Payment pour la GiftCard
            $payment = new Payment();
            $payment
                ->setGiftCard($giftCard)
                ->setAmount($giftCard->getAmount())
                ->setMethod($faker->randomElement(PaymentMethodEnum::cases()))
                ->setStatus($faker->randomElement(PaymentStatusEnum::cases()))
                ->setPaidAt($faker->boolean(80) ? $faker->dateTimeBetween('-1 month', 'now') : null)
                ->setReference(strtoupper($faker->bothify('PAY-#####')));

            $manager->persist($payment);
            $giftCard->setPayment($payment);
        }

        $manager->flush();
    }
}
