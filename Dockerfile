FROM debian:buster

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

COPY ./srcs/default etc/nginx/sites-available/
COPY ./srcs/config.inc.php /var/www/html/phpmyadmin/
COPY ./srcs/wp-config.php /var/www/html/wordpress/
COPY ./srcs/index.nginx-debian.html /var/www/html/
COPY ./srcs/mysql_run.sh /
COPY ./srcs/mysql_create_admin /
COPY ./srcs/nginx-selfsigned.crt /etc/ssl/certs/
COPY ./srcs/nginx-selfsigned.key /etc/ssl/private/
COPY ./srcs/dhparam.pem /etc/ssl/certs/
COPY ./srcs/self-signed.conf /etc/nginx/snippets/
COPY ./srcs/ssl-params.conf /etc/nginx/snippets/

RUN	chown -R www-data:www-data /var/www/html/phpmyadmin

ENTRYPOINT service mysql start && ./mysql_run.sh && service nginx start && service php7.3-fpm start && /bin/bash
