# 适用于dev-sfo-laravel项目(很多项目在共用这个文件，请谨慎修改)
FROM registry.cn-hangzhou.aliyuncs.com/sfo-base/nginx-fpm:v19101508_heartbeat_v26

ADD . /data/www
ADD jenkins_scripts/defaults.conf /etc/nginx/conf.d/
ADD jenkins_scripts/supervisor/ /etc/supervisor/conf.d/

RUN chown -R www-data:www-data /data/www && rm -rf /data/www/.git*
RUN chmod +x jenkins_scripts/init.sh