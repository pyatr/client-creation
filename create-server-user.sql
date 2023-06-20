CREATE USER IF NOT EXISTS 'server-user'@'client-service.client-net' IDENTIFIED BY 'abkldf3824';
GRANT ALL PRIVILEGES ON *.* TO 'server-user'@'client-service.client-net' WITH GRANT OPTION;
FLUSH PRIVILEGES;
