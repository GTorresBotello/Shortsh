
# 〜 ShortSh

ShortSh is a lightweight, minimalist URL shortener built with PHP. It allows users to transform long, cumbersome links into tidy, custom-slugged URLs. Whether you are a guest or a registered user, ShortSh provides an easy way to manage and share your digital footprint.

---

## 🚀 Features

- **Custom Slugs:** Create meaningful short links instead of random strings by defining your own slugs.
- **User Accounts:** Register and log in to manage your personal collection of links.
- **Public vs. Private Links:**
  - *Guests:* Can view and create public links that appear on the global feed.
  - *Users:* Have a private dashboard to track their specific shortened URLs.
- **Mobile Responsive:** The interface is built with Bootstrap 5 and is optimized for desktops, tablets, and smartphones.
- **One-Click Copy:** Integrated clipboard functionality allows for quick sharing directly from the dashboard.
- **SQLite Backend:** Uses a self-contained SQLite database for zero-configuration setup.

---

## 🛠️ Tech Stack

| Layer     | Technology               |
|-----------|--------------------------|
| Backend   | PHP 8.x                  |
| Database  | SQLite                   |
| Frontend  | Bootstrap 5.3.8 + Vanilla JS |
| Routing   | Custom `.htaccess` front-controller |

---

## 📁 Project Structure

The project follows a clean separation of concerns:

```
├── controllers/      # Logic for Auth, URLs, and Redirections
├── models/           # Database interaction and Schema initialization
├── views/            # PHP templates and UI components
├── public/           # Web entry point (index.php) and assets
└── .github/          # Workflow configurations
```

---

## ⚙️ Installation & Setup

### Prerequisites

- PHP 8.0 or higher
- SQLite3 PHP Extension
- Apache with `mod_rewrite` enabled

### Local Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/gtorresbotello/shortsh.git
   cd shortsh
   ```

2. **Configure your Web Server:**
   Point your document root to the `public/` directory.

3. **Permissions:**
   Ensure the directory is writeable by the web server so the SQLite database file (`shortsh.db`) can be created in the `database/` folder.

4. **Launch:**
   Open your browser and navigate to your local host. The application will automatically initialize the database tables on the first load.

---

## 📋 Usage

- **Shorten a Link:** Click on **+ New Link**, paste your long URL, and choose a custom slug.
- **Redirection:** Accessing the short URL (e.g., `/my-link`) will trigger the `RedirectController` to find and forward you to the original destination.
- **Authentication:** Register an account to ensure your links are associated with your user ID and kept separate from guest links.

---

## 📄 License

This project is open-source and hosted on GitHub.

> Created by **ShortSh**.
