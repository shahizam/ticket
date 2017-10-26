README 

Support Ticketing System
source: https://scotch.io/tutorials/build-a-support-ticket-application-with-laravel-part-1

Application Requirements and Flow

1. An authenticated user can open support tickets
2. Upon opening the tickets, an email will be sent to the user along with the details of the support ticket opened
3. Subsequently, mails will be sent to the user as the customer support staff or admin response to the ticket
4. The user can also respond to the ticket he/she opened by commenting on the ticket
5. The admin or the customer support staff can also mark a ticket as resolved
6. Once a ticket is marked as closed, the user who opened the ticket will be notified by email on the status of the ticket.

1. Create new database app04 and assign previlage to addin mysql user
~ mysql -u root -p <password>
~ create database <dbname>
~ grant all on app04.* to 'user'@'%';
~ grant create on app04 to 'user'@'%';
~ flush privileges;

2. install new laravel app
~ cd <base_dir>
~ laravel new <app>

3. git init and initial commit

4. create new remote repository at github and push source code to remote

5. We need ability for user to register and login to application
~ php artisan make:auth

6. add database parameter to .env

7. add is_admin column to user table
$table->integer('is_admin')->unsigned()->default(0);

8. migrate table
~ php artisan migrate

9. Error: access violation 1071, rectify Schema::defaultStringLength(191) to boot()

10. Create ticket model
~ php artisan make:model Ticket -m

11. Edit tickets migration to add new column and migrate tickets table
~ php artisan migrate

12. Make Category model, create table catagories and migrate
~ php artisan make:model Category -m

13. Manually populate categories table using tinker

14. make TicketsController for opening ticket logic