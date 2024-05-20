<p align="center">
<img src="https://github.com/ijpatricio/mingle/raw/main/docs/logo-cover.png" alt="MingleJS Logo" style="width: 500px; border-radius: 12px; margin: 20px; box-shadow: 5px 5px 20px rgb(45 114 253);" >
</p>

# MingleJS Demo

This is the repository with the generated code for the MingleJS demo.  It is a simple web application that showcases the capabilities of MingleJS.

Please check the [MingleJS documentation](https://minglejs.unitedbycode.com) for more information.

Click [here](https://minglejs-demo.unitedbycode.com) to visit the live demo.

The original source code is available at [ijpatricio/mingle](https://github.com/ijpatricio/mingle)

Thank you, and happy Mingling!

# Up and running

Clone the repository, then:

```
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve
# In another terminal
npm ci
npm run dev
```
