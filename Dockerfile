FROM tutum/apache-php:latest

RUN cd /app && ls -l

RUN apt-get -y install php5 git php5-curl
RUN cd /app/html && curl -sS https://getcomposer.org/installer | php
RUN cd /app/html && composer install
RUN cd /app/html && ./update.sh

EXPOSE 80
CMD ["cd /app; ./bin/run.sh"]
