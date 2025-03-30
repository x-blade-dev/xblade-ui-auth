XBlade UI Auth is a package that replaces Laravel Breeze's authentication views with a modern and
customizable UI built with Tailwind CSS.
With just one installation step, you can enhance your Laravel authentication experience.


##Features:
- Modern design with Tailwind CSS
- Automatic dark mode support
- Fully responsive and minimalist UI
- Includes Login, Register, Forgot Password, Reset Password, Confirm Password, and Email Verification pages
- Supports Social Authentication (Google, etc.)


##Installation:
Run the following command to install the package:
$ composer require xblade-ui-auth

##Then, install the UI with:
$ php artisan xblade-ui-auth:install

This will automatically replace Laravel Breeze's default authentication views with XBlade's UI.
Usage:

No extra setup is required! After installation:
- All authentication pages will be updated automatically.
- The UI is built with Tailwind CSS, making it easy to customize.
If you need to make modifications, edit the views in resources/views/auth/.

##Customization

All authentication views are located in:

resources/views/auth/

To modify styles, edit the Tailwind CSS classes inside the view files.

##Uninstalling:

To restore Laravel Breeze's default UI, run:
$ php artisan xblade-ui-auth:remove

##Then, remove the package:

$ composer remove xblade-ui-auth

License:
This package is open-source under the MIT License. Feel free to use and modify it as needed.

XBlade UI Auth - A Modern Authentication UI for Laravel Breeze!