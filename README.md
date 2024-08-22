** PHP VERSION 8 **
** CMS LARAVEL 9 **
** BD MYSQL **
Please Download XAMPP 2021  

** first Steps commands local **
1. composer install
2. copy en.example -> .env // you need to create the database in mysql and put the name and the password 
3. php artisan key:generate
4. php artisan migrate:fresh --seed
5. npm install
6. npm run dev
7. php artisan storage:link
8. php artisan serve
9. The cron runs every Monday at 2AM is no possible because this is localhost however you can see in the route app/commands/CustomTask.php the function handle() and configure kernel.php the time



