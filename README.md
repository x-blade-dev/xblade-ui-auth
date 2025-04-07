# XBlade UI Auth 🚀

XBlade UI Auth is a simple package that replaces Laravel Breeze's authentication views with a modern and customizable UI built with Tailwind CSS.  
With just one installation step, you can enhance your Laravel authentication experience.

## ✨ Features
- 🎨 **Modern design** with Tailwind CSS  
- 📱 **Fully responsive and minimalist UI**  
- 🔐 Includes **Dashboard, Login, Register, Forgot Password, Reset Password, Confirm Password, and Email Verification** pages  
- 👤 Includes **Profile Management => Edit Profile, Change Password, and Delete Account** pages
- 🔗 Supports **Social Authentication (Google Button)**  

## 🛠 Installation

Run the following command to install the package:

```sh
composer require xblade-auth/xblade-ui-auth
```

Then publish the views to replace all old views from Larave Breeze into xblade-ui-auth:

```sh
php artisan vendor:publish --tag=xblade-auth-views --force
```

If need:

```sh
npm run dev
npm run build
```

This will automatically replace Laravel Breeze's default authentication views with XBlade's UI.

## 🚀 Usage

No extra setup is required! After installation:
- ✅ All authentication pages will be updated automatically.
- 🎨 The UI is built with Tailwind CSS, making it easy to customize.

If you need to make modifications, edit the views in `resources/views/auth/`.

## 🎨 Customization

All authentication views are located in:

```sh
resources/views/auth/
```

To modify styles, edit the Tailwind CSS classes inside the view files.

## ✨ Update

Run the following command to update the package:

```sh
composer update xblade-auth/xblade-ui-auth
```

Then publish the views to replace all old views from Larave Breeze into xblade-ui-auth:

```sh
php artisan vendor:publish --tag=xblade-auth-views --force
```

## ❌ Uninstalling

Then, remove the package:

```sh
composer remove xblade-auth/xblade-ui-auth
```

To restore Laravel Breeze's default UI, run:

```sh
composer require laravel/breeze --dev
```

Then, To install the Breeze UI back:

```sh
php artisan breeze:install
```
```sh
php artisan vendor:publish --tag=breeze-views --force
```

If need:

```sh
npm run dev
npm run build
```

## 📜 License

This package is open-source under the **MIT License**. Feel free to use and modify it as needed.  

---  

XBlade UI Auth - A simple Laravel package to replace Laravel Breeze UI with a customizable Tailwind-based UI. 🚀  