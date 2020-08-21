FROM git.heyday.net.nz:4567/heyday/docker/ubuntu18-nginx-php74:latest

RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 100M/g' /etc/php/7.4/fpm/php.ini
RUN sed -i 's/post_max_size = 8M/post_max_size = 100M/g' /etc/php/7.4/fpm/php.ini

RUN sed -i 's/website.local/ss4-research.local/g' /etc/nginx/sites-available/default

CMD "/usr/bin/supervisord"
