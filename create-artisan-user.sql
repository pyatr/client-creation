CREATE USER IF NOT EXISTS 'artisan-user'@'%' IDENTIFIED BY 'abkldf3824';
GRANT ALL PRIVILEGES ON *.* TO 'artisan-user'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
