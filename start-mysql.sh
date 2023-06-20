#Start the service
service mysql start
#Execute script that adds server user into mysql users base
mysql -u root -proot mysql < create-artisan-user.sql
#mysql -u root -proot mysql < create-server-user.sql
#mysql -u root -proot mysql < create-phpstorm-user.sql
mysql -u root -proot mysql < create-clients-database-table.sql
#Infinite waiting because tty: true is just not good enough for docker to keep container running
sh -c tail -f /dev/null
