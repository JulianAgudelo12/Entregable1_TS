# 🚀 AssemblAI - Installation & Setup Guide

Follow these steps to set up the project in your local environment.

---

## 📥 1. Clone the Repository

```bash
git clone https://github.com/JulianAgudelo12/Entregable1_TS.git
cd Entregable1_TS
```

---

## 📦 2. Install PHP Dependencies

Make sure you have Composer installed, then run:

```bash
composer install
```

---

## ⚙️ 3. Environment Configuration

Copy the example environment file and rename it:

```bash
cp .env.example .env
```

Then, edit the `.env` file to match your local database and environment settings.

---

## 🔐 4. Generate Application Key

```bash
php artisan key:generate
```

---

## 🗃️ 5. Run Database Migrations

```bash
php artisan migrate
```

---

## 🌐 6. Remote Repository Setup (Optional)

If the remote repo is not set:

```bash
git remote add origin https://github.com/JulianAgudelo12/Entregable1_TS.git
```

To update it:

```bash
git remote set-url origin https://github.com/JulianAgudelo12/Entregable1_TS.git
```

To verify the remote:

```bash
git remote -v
```

---

## 🧪 7. Start the Development Server

```bash
php artisan serve
```

Visit the app at: [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

---
