# SCHÉMA FINAL — BASE DE DONNÉES
## 👤 `users`

**Comptes techniques (admin / praticienne)**

| Champ      | Type         | Description                        |
| ---------- | ------------ | ---------------------------------- |
| id         | int (PK)     | Identifiant                        |
| email      | varchar(255) | Email de connexion                 |
| password   | text         | Mot de passe hashé                 |
| roles      | json         | Rôles Symfony (`ROLE_ADMIN`, etc.) |
| created_at | timestamp    | Date de création                   |

### Relations

* ❌ Aucune

---

## 👥 `customers`

**Clients (sans authentification)**

| Champ      | Type         | Description    |
| ---------- | ------------ | -------------- |
| id         | int (PK)     | Identifiant    |
| firstname  | varchar(255) | Prénom         |
| lastname   | varchar(255) | Nom            |
| email      | varchar(255) | Email          |
| phone      | varchar(50)  | Téléphone      |
| notes      | text         | Notes internes |
| created_at | timestamp    | Création       |

### Relations

* **OneToMany** → `appointments`

---

## 💆 `seances`

**Type de soin (concept métier)**

| Champ       | Type         | Description                        |
| ----------- | ------------ | ---------------------------------- |
| id          | int (PK)     | Identifiant                        |
| name        | varchar(255) | Nom                                |
| description | text         | Description                        |
| category    | varchar(100) | Catégorie (massage, énergie, etc.) |

### Relations

* **OneToMany** → `seance_variants`
* **OneToMany** → `seance_options`

---

## ⏱️ `seance_variants`

**Durée + prix d’une séance**

| Champ            | Type     | Description |
| ---------------- | -------- | ----------- |
| id               | int (PK) | Identifiant |
| seance_id        | int (FK) | Séance      |
| duration_minutes | int      | Durée       |
| base_price       | int      | Prix        |

### Relations

* **ManyToOne** → `seances`
* **OneToMany** → `formula_items`
* **OneToMany** → `appointments`

---

## ➕ `seance_options`

**Options ajoutables à une séance**

| Champ              | Type         | Description      |
| ------------------ | ------------ | ---------------- |
| id                 | int (PK)     | Identifiant      |
| seance_id          | int (FK)     | Séance concernée |
| name               | varchar(255) | Nom              |
| description        | text         | Description      |
| extra_time_minutes | int          | Temps ajouté     |
| extra_price        | int          | Prix ajouté      |

### Relations

* **ManyToOne** → `seances`
* **ManyToMany** ↔ `appointments` (via `appointment_options`)

---

## 📦 `formulas`

**Forfaits / packs**

| Champ       | Type         | Description |
| ----------- | ------------ | ----------- |
| id          | int (PK)     | Identifiant |
| name        | varchar(255) | Nom         |
| description | text         | Description |
| price       | int          | Prix global |

### Relations

* **OneToMany** → `formula_items`

---

## 🔗 `formula_items`

**Contenu d’une formule**

| Champ             | Type     | Description       |
| ----------------- | -------- | ----------------- |
| id                | int (PK) | Identifiant       |
| formula_id        | int (FK) | Formule           |
| seance_variant_id | int (FK) | Séance incluse    |
| quantity          | int      | Nombre de séances |

### Relations

* **ManyToOne** → `formulas`
* **ManyToOne** → `seance_variants`
* **OneToMany** → `appointments`

---

## 📅 `appointments`

**Rendez-vous**

| Champ             | Type               | Description         |
| ----------------- | ------------------ | ------------------- |
| id                | int (PK)           | Identifiant         |
| customer_id       | int (FK)           | Client              |
| seance_variant_id | int (FK)           | Séance              |
| formula_item_id   | int (FK, nullable) | Issue d’une formule |
| start_time        | timestamp          | Début               |
| end_time          | timestamp          | Fin                 |
| status            | varchar(50) / enum | État                |
| notes             | text               | Notes               |

### Relations

* **ManyToOne** → `customers`
* **ManyToOne** → `seance_variants`
* **ManyToOne (nullable)** → `formula_items`
* **ManyToMany** ↔ `seance_options` (via `appointment_options`)

---

## 🎯 `appointment_options`

**Table de liaison RDV ↔ options**

| Champ            | Type     | Description |
| ---------------- | -------- | ----------- |
| id               | int (PK) | Identifiant |
| appointment_id   | int (FK) | Rendez-vous |
| seance_option_id | int (FK) | Option      |

### Relations

* **ManyToOne** → `appointments`
* **ManyToOne** → `seance_options`

---

# 🔗 RÉCAPITULATIF DES RELATIONS

| Entité        | Relation             | Cible         |
| ------------- | -------------------- | ------------- |
| Customer      | OneToMany            | Appointment   |
| Seance        | OneToMany            | SeanceVariant |
| Seance        | OneToMany            | SeanceOption  |
| SeanceVariant | ManyToOne            | Seance        |
| Formula       | OneToMany            | FormulaItem   |
| FormulaItem   | ManyToOne            | Formula       |
| FormulaItem   | ManyToOne            | SeanceVariant |
| Appointment   | ManyToOne            | Customer      |
| Appointment   | ManyToOne            | SeanceVariant |
| Appointment   | ManyToOne (nullable) | FormulaItem   |
| Appointment   | ManyToMany           | SeanceOption  |

---

# 🧠 STATUTS & ENUMS

## `AppointmentStatus`

```php
enum AppointmentStatus: string
{
    case Scheduled = 'scheduled';
    case Canceled  = 'canceled';
    case Done      = 'done';
}
```
