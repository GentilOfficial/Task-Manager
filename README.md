# 🚀 Task Manager

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![Vue](https://img.shields.io/badge/Vue-3-42b883?logo=vue.js)
![Inertia](https://img.shields.io/badge/Inertia.js-2-blueviolet?logo=inertia)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3-38bdf8?logo=tailwindcss)
![License](https://img.shields.io/badge/license-MIT-green)

## 🧭 Overview

**Task Manager** is a Laravel-based web application that helps teams and individuals organize and manage their project tasks in a modern, efficient way. It runs on **Laravel 12**, **Vue 3**, and **Inertia.js 2**.

With this app, you can create groups, start projects, assign tasks to people or teams, and track progress — all through responsive interface built using **Tailwind CSS** and **shadcn-vue** components.

---

## ✨ What You Can Do

* 🔐 Log in and manage your account
* 👥 Create groups and manage members
* 📁 Create new projects
* 🔗 Link projects to specific users or entire groups
* ✅ Add tasks to projects
* 👨‍👩‍👧‍👦 Assign tasks to individual users
* 🧾 View a personal list of tasks assigned to you

---

## ⚙️ What You Need to Run It

| Component | Minimum Version              |
| --------- | ---------------------------- |
| PHP       | 8.2                          |
| Composer  | Latest                       |
| Node.js   | 18.x                         |
| NPM/Yarn  | Latest                       |
| Database  | SQLite, MySQL, or PostgreSQL |

---

## 🛠 How to Install It

### 1. 📂 Download the Project

```bash
git clone https://github.com/GentilOfficial/Task-Manager.git
cd Task-Manager
```

### 2. 📦 Install Backend Dependencies

```bash
composer install
```

### 3. 💻 Install Frontend Dependencies

```bash
npm install
```

### 4. ⚙️ Set Up Environment Variables

```bash
cp .env.example .env
php artisan key:generate
```

Open the `.env` file and configure your database settings.

### 5. 🧱 Run Migrations (and Optional Seeders)

```bash
php artisan migrate --seed
```

### 6. 🔧 Start Laravel’s and Fronted Development Server

```bash
composer run dev
```

➡️ Now open `http://localhost:8000` in your browser to explore the app.

---

## 🧩 How It Works

### 🔐 Authentication

* Login and register your user

### 👥 Groups

* Create and manage groups
* Add users to groups

### 📁 Projects

* Create projects
* Assign them to users or groups

### ✅ Tasks

* Add tasks inside each project
* Assign tasks to specific users
* Track task status and progress

### 📋 Assigned Tasks

* View all tasks currently assigned to you

---

## 🧰 Technologies Used

| 🧠 Technology    | 💼 What It's For                    |
| ---------------- | ----------------------------------- |
| **Laravel 12**   | Backend logic and API               |
| **Vue 3**        | Interactive frontend interface      |
| **Inertia.js 2** | Connects Laravel and Vue            |
| **Tailwind CSS** | Fast and clean UI design            |
| **shadcn-vue**   | UI components for Vue with Tailwind |

---

## 🔗 Useful Links

* [📕 Laravel 12](https://laravel.com/docs/12.x)
* [📗 Vue 3](https://vuejs.org/)
* [📘 Inertia.js](https://inertiajs.com/)
* [📒 shadcn-vue](https://www.shadcn-vue.com/)

---

## 🤝 Want to Help?

You can contribute! If you find a bug or want to suggest something, open an issue or send a pull request.

---

## 📄 License

This app is open-source and released under the **MIT License**.
