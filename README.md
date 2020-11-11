# ecommerceBIS Installition!
 - Edit .env and set your database connection details
  
```sh
composer install
php artisan key:generate
npm install 
npm run watch 
php artisan migrate --seed
php artisan storage:link
php artisan serve
```
 - EMAIL 
    admin@admin.com
  - PASSWORD 000000  
  
# IF error appears while migrate 

- You can use database file from link
``` https://drive.google.com/file/d/1DQPjHipUBvxELckx51vv2uyW73QAbobX/view?usp=sharing ```
- And ignore  ```php artisan migrate --seed```
