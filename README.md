 
## About Proect
IT is APIs that handle advertise with its users , tags and actegories

## How to Run Project

1-php artisan composer install

2-php artisan migrate:seed

API Collection in :"json Collection.json" file

reminder of advertise will be run every day at 08:00 Am

## to run reminder job on server 

sudo apt-get install supervisor;

sudo nano /etc/supervisor/conf.d/laravel-worker.conf;
 
process_name=%(program_name)s_%(process_num)02d

command=php /var/www/html/artisan queue:work --timeout=0 

autostart=true


-----------------------------------

sudo supervisorctl reread;

sudo supervisorctl update;

sudo supervisorctl start laravel-worker:*;

sudo supervisorctl stop laravel-worker:*

sudo supervisorctl restart laravel-worker:*

sudo supervisorctl status laravel-worker:*
 