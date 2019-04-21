#!/bin/bash
echo "cd"
cd /var/www/html

echo "git pull"
/usr/bin/git pull origin master

echo "composer install"
/root/bin/composer install

echo "set env"
INSTANCE_ID=$(curl 169.254.169.254/latest/meta-data/instance-id)
ZONE=$(curl 169.254.169.254/latest/meta-data/placement/availability-zone)
REGION=$(echo ${ZONE/%?/})
APP_ENV=$(aws --region ${REGION} ec2 describe-instances --instance-ids ${INSTANCE_ID} --query "Reservations[0].Instances[0].Tags[?Key=='Env'].Value" --output text)

# 以下で環境変数をセットする
cp /dev/null ./scripts/actions/.env

echo "DB_HOST=\"$(aws --region ${REGION} ssm get-parameters --name ${APP_ENV}.db_host --query "Parameters[0].Value" --output text)\"" >> ./scripts/actions/.env
echo "DB_USER=\"$(aws --region ${REGION} ssm get-parameters --name ${APP_ENV}.db_user --query "Parameters[0].Value" --output text)\"" >> ./scripts/actions/.env
echo "DB_PASS=\"$(aws --region ${REGION} ssm get-parameters --name ${APP_ENV}.db_pass --query "Parameters[0].Value" --output text)\"" >> ./scripts/actions/.env
echo "DB_NAME=\"$(aws --region ${REGION} ssm get-parameters --name ${APP_ENV}.db_name --query "Parameters[0].Value" --output text)\"" >> ./scripts/actions/.env
echo "DB_PORT=\"$(aws --region ${REGION} ssm get-parameters --name ${APP_ENV}.db_port --query "Parameters[0].Value" --output text)\"" >> ./scripts/actions/.env

echo "DB_TEST=\"test\"" >> ./scripts/actions/.env

cp ./scripts/actions/.env ./.env

echo "systemctl reload httpd"
systemctl reload httpd

