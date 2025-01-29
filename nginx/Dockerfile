FROM nginx:alpine

# Installer Certbot et le plugin Nginx
RUN apk --no-cache add certbot certbot-nginx

# Copier ta configuration nginx
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./nginx/certbot/conf /etc/letsencrypt
COPY ./nginx/certbot/www /var/www/certbot
