#Image de base
FROM debian:buster

#ARG DEBIAN_FRONTEND=noninteractive

# MAJ, install Nginx, MySQL, Phpmyadmin, Wordpress
RUN apt-get update \
	&& apt-get upgrade -y \
	&& apt-get install nginx -y \
	&& apt-get install mariadb-server -y \
	&& apt-get install wget -y \
	&& apt-get install unzip -y \
	&& apt-get install php-fpm php-mysql -y \
	&& apt-get install php-mbstring php-zip php-gd php-xml php-pear php-gettext php-cgi -y \
	&& wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-english.tar.gz \
	&& wget https://fr.wordpress.org/latest-fr_FR.tar.gz \
	&& mkdir /var/www/html/phpmyadmin \
	&& mkdir /var/www/html/wordpress \
	&& tar xzf phpMyAdmin-4.9.0.1-english.tar.gz --strip-components=1 -C /var/www/html/phpmyadmin \
	&& tar xzf latest-fr_FR.tar.gz --strip-components=1 -C /var/www/html/wordpress 

#	&& cp /var/www/html/phpmyadmin/config.sample.inc.php /var/www/html/phpmyadmin/config.inc.php \
#	&& chmod 660 /var/www/html/phpmyadmin/config.inc.php \
#	&& chown -R www-data:www-data /var/www/html/phpmyadmin

#COPY ./srcs/etc/nginx/sites-available/default /etc/nginx/sites-available/
COPY ./srcs/etc/nginx/sites-enabled/default etc/nginx/sites-enabled/
COPY ./srcs/config.inc.php /var/www/html/phpmyadmin/
COPY ./srcs/wp-config.php /var/www/html/wordpress/
COPY ./srcs/mysql_run.sh /
COPY ./srcs/mysql_create_admin /

RUN	chown -R www-data:www-data /var/www/html/phpmyadmin

#COPY ./srcs/run_services.sh /
#RUN service nginx start \
#	&& service php7.3-fpm start \
#	&& service mysql start

#ADD . /app/

#Installation de Wordpress

#COPY . /app
#RUN make /app

ENTRYPOINT service mysql start && ./mysql_run.sh && service nginx start && service php7.3-fpm start && /bin/bash

#CMD /run_services.sh
