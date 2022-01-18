FROM redis

EXPOSE 26379
ADD sentinel.conf /etc/redis/sentinel-template.conf
RUN chown redis:redis /etc/redis/sentinel-template.conf
COPY sentinel-entrypoint.sh /usr/local/bin/
RUN ["chmod", "755", "/usr/local/bin/sentinel-entrypoint.sh"]
ENTRYPOINT ["/usr/local/bin/sentinel-entrypoint.sh"]