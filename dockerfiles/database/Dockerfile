FROM ubuntu:latest
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y --fix-missing
RUN apt-get upgrade -y
RUN apt-get install -y nano
RUN apt-get install -y lsof
RUN apt-get install -y mysql-client
RUN apt-get install -y mysql-server

RUN usermod -d /var/lib/mysql/ mysql
#Replace with config that has bind-address = 0.0.0.0
#Can possibly be changed with mysql commands instead
COPY mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
COPY create-clients-database-table.sql /
COPY create-phpstorm-user.sql /
COPY create-server-user.sql /
COPY create-artisan-user.sql /
COPY start-mysql.sh /

EXPOSE 3306
