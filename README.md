# 📂 PHP Admin Panel

This project is a **PHP-based web application** 🖥️ developed by **Iqbolshoh Ilhomjonov** 👨‍💻. The application includes various features such as **user alerts**, **data tables**, **a dynamic navigation menu**, and a **customizable admin panel with a banner** 🏆🎯.  

![Banner](./src/images/banner.png)  

---

## ⚙️ Installation 🏗️  

To run this project locally, follow these steps:  

1️⃣ **Clone the repository** 📂:  
   ```bash
   git clone https://github.com/iqbolshoh/php-admin-panel.git
   ```  
2️⃣ **Navigate to the project directory** 📁:  
   ```bash
   cd php-admin-panel
   ```  
3️⃣ **Set up a local server** 🌍 (e.g., **XAMPP, WAMP, MAMP**) and place the project files in the server's root directory **(htdocs/www)**.  

---

## 🚀 Usage 🎯  

To use the application, open your **browser** 🌐 and navigate to:  

🔗 `http://localhost/php-admin-panel`  

This will load the **main page** of the application. 🎉  

---

## 📌 Adding Sidebar Menu Items 🏗️  

The **`$menuItems`** array defines the **sidebar menu** 📜. Each item includes:  

✅ **`menuTitle`** – The section name 🏷️ (e.g., `"Menu"`).  
✅ **`icon`** – The section icon 🎨 (e.g., `"fas fa-home"`).  
✅ **`pages`** – Subpages with `"title"` (name) and `"url"` (link) 🔗.  

### 📝 Example: Adding/Updating Menu Items  

```php
$menuItems = [
    [
        "menuTitle" => "🏠 Menu",
        "icon" => "fas fa-home",
        "pages" => [
            ["title" => "🏡 Home", "url" => "index.php"]
        ],
    ],
    [
        "menuTitle" => "⚙️ Settings",
        "icon" => "fas fa-cogs",
        "pages" => [
            ["title" => "👤 Profile", "url" => "profile.php"],
        ]
    ]
];
```

## 🖥 Technologies Used
<div style="display: flex; flex-wrap: wrap; gap: 5px;">
    <img src="https://img.shields.io/badge/HTML-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white" alt="HTML">
    <img src="https://img.shields.io/badge/CSS-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white" alt="CSS">
    <img src="https://img.shields.io/badge/Bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
    <img src="https://img.shields.io/badge/JavaScript-%23F7DF1C.svg?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
    <img src="https://img.shields.io/badge/jQuery-%230e76a8.svg?style=for-the-badge&logo=jquery&logoColor=white" alt="jQuery">
    <img src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-%234479A1.svg?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</div>

---

## 🤝 Contributing  

🎯 Contributions are welcome! If you have suggestions or want to enhance the project, feel free to fork the repository and submit a pull request.

## 📬 Connect with Me  

💬 I love meeting new people and discussing tech, business, and creative ideas. Let’s connect! You can reach me on these platforms:

<div align="center">
    <table>
        <tr>
            <td>
                <a href="https://github.com/iqbolshoh">
                    <img src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/github.svg"
                        height="40" width="40" alt="GitHub" />
                </a>
            </td>
            <td>
                <a href="https://t.me/iqbolshoh_777">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/telegram.svg"
                        height="40" width="40" alt="Telegram" />
                </a>
            </td>
            <td>
                <a href="https://www.linkedin.com/in/iiqbolshoh/">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/linkedin.svg"
                        height="40" width="40" alt="LinkedIn" />
                </a>
            </td>
            <td>
                <a href="https://instagram.com/iqbolshoh_777" target="blank">
                    <img src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/instagram.svg"
                        alt="Instagram" height="40" width="40" />
                </a>
            </td>
            <td>
                <a href="https://wa.me/qr/22PVFQSMQQX4F1">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/whatsapp.svg"
                        height="40" width="40" alt="WhatsApp" />
                </a>
            </td>
            <td>
                <a href="https://x.com/iqbolshoh_777">
                    <img src="https://img.shields.io/badge/X-000000?style=for-the-badge&logo=x&logoColor=white" height="40"
                        width="40" alt="Twitter" />
                </a>
            </td>
            <td>
                <a href="mailto:iilhomjonov777@gmail.com">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/gmail.svg"
                        height="40" width="40" alt="Email" />
                </a>
            </td>
        </tr>
    </table>
</div>
