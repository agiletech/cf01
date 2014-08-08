FROM tutum/apache-php:latest

RUN cd /app && ls -l

RUN apt-get -y install php5 git php5-curl
RUN cd /app && curl -sS https://getcomposer.org/installer | php
RUN cd /app && composer install
RUN cd /app && ./update.sh

EXPOSE 80
CMD ["/run.sh"]
