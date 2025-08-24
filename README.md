# 🎉 WP ExtendPro

[![WordPress Plugin](https://img.shields.io/badge/WordPress-6.0+-blue)](https://wordpress.org/) &nbsp;
[![PHP Version](https://img.shields.io/badge/PHP-7.4+-orange)](https://www.php.net/) &nbsp;
[![License](https://img.shields.io/badge/License-GPLv2+-green)](https://www.gnu.org/licenses/gpl-2.0.html)
 
**Contributors:** MahbubShaki  
**Tags:** wordpress, plugin, footer, auto mode, settings, admin  
**Requires at least:** 6.0  
**Tested up to:** 6.5  
**Stable tag:** 1.0.0  
**License:** GPLv2 or later

---

## 📌 Description

WP ExtendPro is a lightweight, plug-and-play WordPress plugin that adds a **dynamic footer** with:

- Hotline  
- Email  
- Banner text  

✨ **Key Features:**
- ⚡ **Auto Mode** → Default values show instantly after plugin activation  
- 🛠️ **Dashboard Settings** → Admin can update content easily  
- 🎨 Clean, lightweight code with minimal inline CSS  
- 📱 Fully responsive footer design  
- 📝 Ready for templates and further customization

---

## 📹 Live Demo

Watch WP ExtendPro in action: [Live Demo](assets/demo/demo-video.mp4)  
*(Click the link to see Auto Mode + Dashboard Settings working live)*

---

## 🖼️ Screenshots

### 1️⃣ Admin Settings Page
Shows the Dashboard UI where you can update Hotline, Email, and Banner text.  
![Admin Settings - Dashboard UI](assets/images/admin-settings.png)

### 2️⃣ Auto Footer Preview
Shows the default Auto Mode footer.  
![Auto Footer](assets/images/auto-footer.png)

### 3️⃣ Custom Footer Example
Example of a customized footer.  
![Customization Example](assets/images/custom-footer.png)

---

## 📂 Plugin File Structure

```text
wp-extendpro/                          # Main plugin folder
│
├─ assets/                             # Frontend static files (CSS, JS, Images, Demo)
│   ├─ css/
│   │   ├─ admin-style.css             # Admin dashboard stylesheet
│   │   └─ frontend-style.css          # Plugin frontend stylesheet
│   │
│   ├─ js/
│   │   └─ admin-script.js             # Plugin frontend JavaScript
│   │
│   ├─ images/                         # Screenshots / Preview Images
│   │   ├─ admin-settings.png          # Screenshot of Admin Settings Page (Dashboard UI)
│   │   ├─ auto-footer.png             # Preview of Auto Footer mode
│   │   └─ custom-footer.png           # Preview of Custom Footer mode
│   │
│   └─ demo/
│       └─ demo-video.mp4              # Demo video showcasing the plugin functionality
│
├─ includes/
│   ├─ class-admin.php                 # Admin Dashboard logic
│   ├─ class-front.php                 # Frontend Auto Footer logic (Lite/Basic)
│   ├─ class-extendpro-front.php       # Frontend Auto Footer logic (Full/Pro)
│   └─ functions.php                   # Additional helper functions
│
├─ languages/
│   └─ wp-extendpro.pot                # Translation template file (i18n/l10n)
│
├─ templates/
│   └─ my-template.php                 # Frontend template for features shortcode/section
│
├─ wp-extendpro.php                     # Main plugin bootstrap file (loads classes & hooks)
├─ uninstall.php                        # Uninstall script (cleans up plugin data)
└─ README.md                            # Plugin documentation (GitHub/WordPress.org details)
```
---

## 🚀 Installation

1. Upload the `wp-extendpro` folder to `/wp-content/plugins/`  
2. Activate the plugin via the **WordPress Plugins** menu  
3. (Optional) Customize settings via **Dashboard → ExtendPro Settings**  
4. Visit your website footer to see it in action ✅

---

## ❓ Frequently Asked Questions (FAQ)

**Q:** Will this plugin work without configuring anything?  
**A:** Yes! Auto Mode shows default values immediately after activation. 👍

**Q:** Can I change the content later?  
**A:** Absolutely. Go to **Settings → ExtendPro Settings** in the dashboard. ✏️

**Q:** Is it lightweight?  
**A:** Yes. Minimal CSS/JS ensures fast loading. 🚀

---

## 📜 Changelog

### 1.0.0
* Initial release with Auto Mode + Dashboard Settings  
* Default values for Hotline, Email, Banner  
* Fully responsive footer with hover effects  

---

## ⚠️ Upgrade Notice

Initial release. Test on a staging site before activating on production.

---

## 🧑‍💻 Developer

**MahbubShaki**  
Upwork: [Profile](https://upwork.com/freelancers/~015df70a23d7f58180)  
Email: mahbubshaki64@gmail.com
