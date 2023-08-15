FROM debian:stable

RUN apt-get update && apt-get install -y \
    nginx-extras

ADD conf/nginx.conf /etc/nginx/
ADD conf/app.conf /etc/nginx/conf.d/

RUN ln -s /etc/nginx/sites-available/app.conf /etc/nginx/sites-enabled/app

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 www-data

COPY docker-entrypoint.sh /

RUN chmod 777 /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]
STOPSIGNAL SIGQUIT
CMD ["nginx", "-g", "daemon off;"]

EXPOSE 80
EXPOSE 443
