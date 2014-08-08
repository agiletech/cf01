FROM octohost/php5-apache

ADD . /var/www

RUN apt-get -y install git
RUN /var/www/update.sh

EXPOSE 80

CMD ["/bin/bash", "/start.sh"]
