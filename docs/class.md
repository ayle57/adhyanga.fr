# Schéma de base de données

## 👤 users
> Comptes techniques (admin / praticienne)

| Champ | Type |
|-----|-----|
| id | int (PK) |
| email | varchar(255) |
| password | text |
| roles | array[text] |
| created_at | timestamp |

---

## 👥 customers
> Clients

| Champ | Type |
|-----|-----|
| id | int (PK) |
| firstname | varchar(255) |
| lastname | varchar(255) |
| email | varchar(255) |
| phone | varchar(50) |
| notes | text |
| created_at | timestamp |

---

## 💆 seances
> Type de soin (sans durée ni prix)

| Champ | Type |
|-----|-----|
| id | int (PK) |
| name | varchar(255) |
| description | text |
| category | varchar(100) |

Exemples :
- Kinésiologie
- Massage ayurvédique
- Lithothérapie

---

## ⏱️ seance_variants
> Durée + prix de base d’une séance

| Champ | Type |
|-----|-----|
| id | int (PK) |
| seance_id | int (FK → seances.id) |
| duration_minutes | int |
| base_price | int |

---

## ➕ seance_options
> Options possibles pour une séance

| Champ | Type |
|-----|-----|
| id | int (PK) |
| seance_id | int (FK → seances.id) |
| name | varchar(255) |
| description | text |
| extra_time_minutes | int |
| extra_price | int |

---

## 📦 formulas
> Forfaits

| Champ | Type |
|-----|-----|
| id | int (PK) |
| name | varchar(255) |
| description | text |
| price | int |

---

## 🔗 formula_items
> Contenu d’une formule

| Champ | Type |
|-----|-----|
| id | int (PK) |
| formula_id | int (FK → formulas.id) |
| seance_variant_id | int (FK → seance_variants.id) |
| quantity | int |

---

## 📅 appointments
> Rendez-vous

| Champ | Type |
|-----|-----|
| id | int (PK) |
| customer_id | int (FK → customers.id) |
| seance_variant_id | int (FK → seance_variants.id) |
| formula_item_id | int (nullable, FK → formula_items.id) |
| start_time | timestamp |
| end_time | timestamp |
| status | varchar(50) |
| notes | text |

Statuts possibles :
- scheduled
- canceled
- done

---

## 🎯 appointment_options
> Options choisies lors d’un rendez-vous

| Champ | Type |
|-----|-----|
| id | int (PK) |
| appointment_id | int (FK → appointments.id) |
| seance_option_id | int (FK → seance_options.id) |

---

# 🔗 Relations principales

- **Customer** → 1..N Appointments
- **Seance** → 1..N SeanceVariants
- **Seance** → 1..N SeanceOptions
- **Formula** → 1..N FormulaItems
- **SeanceVariant** → N..N Formulas (via formula_items)
- **Appointment** → N..N SeanceOptions (via appointment_options)

---

# 📌 EXEMPLES CONCRETS

## Exemple 1 — Séances & variantes

### seances
- Kinésiologie
- Massage ayurvédique

### seance_variants
| Séance | Durée | Prix |
|------|------|------|
| Kinésiologie | 60 min | 70€ |
| Kinésiologie | 90 min | 95€ |
| Massage ayurvédique | 60 min | 75€ |
| Massage ayurvédique | 90 min | 100€ |

---

## Exemple 2 — Options de séance (Ayurveda)

### seance_options (liées à Massage ayurvédique)
| Option | Temps + | Prix + |
|------|--------|--------|
| Bol Kansu | +15 min | +20€ |
| Huiles spécifiques | +10 min | +15€ |
| Rituel pieds | +20 min | +25€ |

---

## Exemple 3 — Formule « Découverte »

### formulas
**Découverte**
> Découvrir deux pratiques complémentaires

### formula_items
| Séance | Durée | Quantité |
|------|------|----------|
| Kinésiologie | 60 min | 1 |
| Massage ayurvédique | 60 min | 1 |

---

## Exemple 4 — Rendez-vous issu de la formule

Client : **Marie Dupont**

- Séance : Massage ayurvédique – 60 min
- Option ajoutée : Bol Kansu
- Temps total : **75 min**
- Prix :
    - Base : inclus dans la formule
    - Option : +20€

---

## Exemple 5 — Rendez-vous hors formule

Client : **Paul Martin**

- Séance : Kinésiologie – 90 min
- Options : aucune
- Prix total : **95€**
