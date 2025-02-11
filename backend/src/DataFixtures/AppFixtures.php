<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Appointment;
use App\Entity\Contact;
use App\Entity\Option;
use App\Entity\Price;
use App\Entity\Seance;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\{Factory, Generator};

class AppFixtures extends Fixture
{
    public Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        $options = [];
        foreach (['Quartz rose', 'Améthyste', 'Abhyanga', 'Abhyanga dynamique', 'Shirotchampi'] as $optionName) {
            $option = (new Option())->setName($optionName);
            $options[] = $option;
            $manager->persist($option);
        }

        $prices = [];
        for ($i = 0; $i < 10; $i++) {
            $price = (new Price())->setAdult($this->faker->randomFloat(2, 50, 100));
            $prices[] = $price;
            $manager->persist($price);
        }

        $users = [];
        for ($i = 0; $i < 20; $i++) {
            $user = (new User())
                ->setFirstname($this->faker->firstName())
                ->setLastname($this->faker->lastName())
                ->setEmail($this->faker->email())
                ->setPhoneNumber($this->faker->phoneNumber())
                ->setTerms(true)
                ->setCaptcha(true)
                ->setCreatedAt(new \DateTimeImmutable());
            $users[] = $user;
            $manager->persist($user);
        }

        $seances = [];
        $seances[] = (new Seance())
            ->setName("Kinésiologie")
            ->setDuration(60)
            ->setPrice($this->faker->randomElement($prices));

        $seances[] = (new Seance())
            ->setName("Ayurvéda")
            ->setDuration(60)
            ->setPrice($this->faker->randomElement($prices))
            ->addOption($options[2])
            ->addOption($options[3]);

        $seances[] = (new Seance())
            ->setName("Lithothérapie")
            ->setDuration(60)
            ->setPrice($this->faker->randomElement($prices))
            ->addOption($options[0])
            ->addOption($options[1]);

        foreach ($seances as $seance) {
            $manager->persist($seance);
        }

        $appointments = [];
        foreach (range(1, 10) as $i) {
            $seance = $this->faker->randomElement($seances);
            $customer = $this->faker->randomElement($users);

            $appointment = (new Appointment())
                ->setPrice($this->faker->randomElement($prices))
                ->setDate($this->faker->dateTimeBetween('now', '+1 month'))
                ->setDuration($this->faker->randomElement([30, 60, 90]))
                ->setSeance($seance)
                ->setCustomer($customer);

            $seance->addAppointment($appointment);
            $appointments[] = $appointment;
            $manager->persist($appointment);
        }

        $contacts = [];

        for ($i = 0;$i<10;$i++) {
            $contact = (new Contact())
                ->setCustomer($this->faker->randomElement($users))
                ->setMessage($this->faker->sentence());
            $contacts[] = $contact;
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
