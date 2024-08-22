** PHP VERSION 8 **
** CMS LARAVEL 9 **
** BD MYSQL **

** first Steps commands local **
1. composer install
2. copy en.example -> .env
3. php artisan key:generate
4. php artisan migrate:fresh --seed
5. npm install
6. npm run dev
7. php artisan serve
8. You need to get two img and save in this route storage\app\public with name
the frst picture name "rootA.jpg" and second "rootB.jpg"
9. The cron runs every Monday at 2AM is no possible because this is localhost however you can see in the route app/commands/CustomTask.php the function handle()



