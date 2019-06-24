# forgotten-work
First of all follow these steps.

git clone https://github.com/paulius3881/forgotten-work

composer install

php bin/console doctrine:database:create

php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load

php bin/console server:run

Now you can open this web and see all data from .csv files and find jobs which are forgotten

