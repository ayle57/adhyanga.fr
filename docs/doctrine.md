# Entités Doctrine (Symfony)

## User (`User.php`)

```php
#[ORM\Entity]
class User
```

### Champs

* `id` → `int`
* `email` → `string`
* `password` → `string`
* `roles` → `json` ✅ (Doctrine recommande JSON)
* `createdAt` → `\DateTimeImmutable`

### Relations

❌ Aucune (compte technique uniquement)

---

## Customer (`Customer.php`)

```php
#[ORM\Entity]
class Customer
```

### Champs

* `id`
* `firstname`
* `lastname`
* `email`
* `phone`
* `notes`
* `createdAt`

### Relations

```php
#[ORM\OneToMany(mappedBy: 'customer', targetEntity: Appointment::class)]
private Collection $appointments;
```

---

## Seance (`Seance.php`)

```php
#[ORM\Entity]
class Seance
```

### Champs

* `id`
* `name`
* `description`
* `category`

### Relations

```php
#[ORM\OneToMany(mappedBy: 'seance', targetEntity: SeanceVariant::class)]
private Collection $variants;

#[ORM\OneToMany(mappedBy: 'seance', targetEntity: SeanceOption::class)]
private Collection $options;
```

---

## SeanceVariant (`SeanceVariant.php`)

```php
#[ORM\Entity]
class SeanceVariant
```

### Champs

* `id`
* `durationMinutes`
* `basePrice`

### Relations

```php
#[ORM\ManyToOne(inversedBy: 'variants')]
#[ORM\JoinColumn(nullable: false)]
private Seance $seance;

#[ORM\OneToMany(mappedBy: 'seanceVariant', targetEntity: FormulaItem::class)]
private Collection $formulaItems;

#[ORM\OneToMany(mappedBy: 'seanceVariant', targetEntity: Appointment::class)]
private Collection $appointments;
```

---

## SeanceOption (`SeanceOption.php`)

```php
#[ORM\Entity]
class SeanceOption
```

### Champs

* `id`
* `name`
* `description`
* `extraTimeMinutes`
* `extraPrice`

### Relations

```php
#[ORM\ManyToOne(inversedBy: 'options')]
#[ORM\JoinColumn(nullable: false)]
private Seance $seance;

#[ORM\ManyToMany(mappedBy: 'options', targetEntity: Appointment::class)]
private Collection $appointments;
```

---

## Formula (`Formula.php`)

```php
#[ORM\Entity]
class Formula
```

### Champs

* `id`
* `name`
* `description`
* `price`

### Relations

```php
#[ORM\OneToMany(mappedBy: 'formula', targetEntity: FormulaItem::class, cascade: ['persist', 'remove'])]
private Collection $items;
```

👉 `cascade` utile ici (les items n’existent pas sans la formule)

---

## FormulaItem (`FormulaItem.php`)

```php
#[ORM\Entity]
class FormulaItem
```

### Champs

* `id`
* `quantity`

### Relations

```php
#[ORM\ManyToOne(inversedBy: 'items')]
#[ORM\JoinColumn(nullable: false)]
private Formula $formula;

#[ORM\ManyToOne]
#[ORM\JoinColumn(nullable: false)]
private SeanceVariant $seanceVariant;

#[ORM\OneToMany(mappedBy: 'formulaItem', targetEntity: Appointment::class)]
private Collection $appointments;
```

---

## Appointment (`Appointment.php`)

```php
#[ORM\Entity]
class Appointment
```

### Champs

* `id`
* `startTime`
* `endTime`
* `status`
* `notes`

### Relations

```php
#[ORM\ManyToOne(inversedBy: 'appointments')]
#[ORM\JoinColumn(nullable: false)]
private Customer $customer;

#[ORM\ManyToOne(inversedBy: 'appointments')]
#[ORM\JoinColumn(nullable: false)]
private SeanceVariant $seanceVariant;

#[ORM\ManyToOne]
#[ORM\JoinColumn(nullable: true)]
private ?FormulaItem $formulaItem = null;

#[ORM\ManyToMany(targetEntity: SeanceOption::class, inversedBy: 'appointments')]
#[ORM\JoinTable(name: 'appointment_options')]
private Collection $options;
```

---

# Enums recommandés (PHP 8.1+)

## AppointmentStatus (`AppointmentStatus.php`)

```php
enum AppointmentStatus: string
{
    case Scheduled = 'scheduled';
    case Canceled  = 'canceled';
    case Done      = 'done';
}
```

Dans l’entité :

```php
#[ORM\Column(enumType: AppointmentStatus::class)]
private AppointmentStatus $status;
```

---

## (Optionnel) SeanceCategory

Si tu veux éviter les strings libres :

```php
enum SeanceCategory: string
{
    case Energy = 'energy';
    case Massage = 'massage';
    case Therapy = 'therapy';
}
```

---

# Choix techniques Doctrine (recommandés)

### `roles`

```php
#[ORM\Column(type: 'json')]
private array $roles = [];
```

### Dates

Toujours préférer :

```php
\DateTimeImmutable
```

---

# Résumé rapide des relations

| Entité        | Relation                           |
| ------------- | ---------------------------------- |
| Customer      | OneToMany → Appointment            |
| Seance        | OneToMany → SeanceVariant          |
| Seance        | OneToMany → SeanceOption           |
| SeanceVariant | ManyToOne → Seance                 |
| Formula       | OneToMany → FormulaItem            |
| FormulaItem   | ManyToOne → Formula                |
| Appointment   | ManyToOne → Customer               |
| Appointment   | ManyToOne → SeanceVariant          |
| Appointment   | ManyToOne → FormulaItem (nullable) |
| Appointment   | ManyToMany → SeanceOption          |
