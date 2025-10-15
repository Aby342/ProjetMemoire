 ProjetMémoire – Backend Laravel pour Téléconsultation Médicale

Ce projet est le backend d’une plateforme de téléconsultation médicale développé avec Laravel. Il gère les utilisateurs, les rôles, les rendez-vous, les prescriptions et les relations entre patients et médecins.

---

## 🚀 Technologies utilisées

- **Laravel 11**
- **PHP**
- **PostgreSQL**
- **Sanctum** (authentification API)
- **Postman** (tests API)

---

## 📁 Structure du dépôt


ProjetMemoire/ ├── backend/ │ ├── app/ │ │ ├── Http/ │ │ │ ├── Controllers/ │ │ │ │ ├── AuthController.php │ │ │ │ ├── DoctorController.php │ │ │ │ ├── PatientController.php │ │ │ │ ├── AppointmentController.php │ │ │ │ ├── PrescriptionController.php │ │ │ │ └── AdminController.php │ │ │ ├── Middleware/ │ │ │ │ └── RoleMiddleware.php │ │ ├── Models/ │ │ │ ├── User.php │ │ │ ├── Doctor.php │ │ │ ├── Patient.php │ │ │ ├── Appointment.php │ │ │ └── Prescription.php │ ├── database/ │ │ ├── migrations/ │ │ │ ├── create_users_table.php │ │ │ ├── create_specialites_table.php │ │ │ ├── create_doctors_table.php │ │ │ ├── create_patients_table.php │ │ │ ├── create_appointments_table.php │ │ │ ├── create_prescriptions_table.php │ │ │ └── autres migrations │ │ ├── seeders/ │ │ │ └── DatabaseSeeder.php │ ├── routes/ │ │ └── api.php │ ├── .env │ ├── composer.json │ └── README.md 
---

## 🔐 Authentification

- Utilisation de **Sanctum** pour sécuriser les routes API
- Middleware personnalisé `role:{role}` pour filtrer les accès selon le rôle (`admin`, `doctor`, `patient`)

---

## 📚 Endpoints disponibles (backend uniquement)

### 👤 Utilisateurs

- `POST /api/register` – Inscription
- `POST /api/login` – Connexion
- `GET /api/user` – Infos utilisateur connecté

### 🧑‍⚕️ Médecins

- `POST /api/doctors` – Ajouter un médecin
- `GET /api/doctors` – Liste des médecins

### 🧑‍🤝‍🧑 Patients

- `POST /api/patients` – Ajouter un patient
- `GET /api/patients` – Liste des patients

### 📅 Rendez-vous

- `POST /api/appointments` – Créer un rendez-vous
- `GET /api/appointments` – Liste des rendez-vous

### 💊 Prescriptions

- `POST /api/prescriptions` – Créer une prescription
- `GET /api/prescriptions` – Liste des prescriptions

---

## 🧪 Tests API

- Tests réalisés via **Postman**
- Organisation des collections par rôle (`admin`, `doctor`, `patient`)
- Vérification des accès et des erreurs (`401`, `403`, `422`, `500`)
