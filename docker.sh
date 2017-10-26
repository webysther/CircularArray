#!/bin/bash

# Garante que será atualizado
if [ -f "docker-compose.yml" ]; then
  rm docker-compose.yml
fi

if [ ! -f "docker-compose.yml" ]; then
  curl -sSL https://goo.gl/6LWYXL -o docker-compose.yml
  sed -i -- "s/php-7\.0/php-5\.3/g" docker-compose.yml
  sed -i -- "s/php-5\.6/php-5\.3/g" docker-compose.yml
fi

if [ -f "docker-compose.yml" ]; then
    if [ ! "$(docker network ls | grep proxy)" ]; then
      docker network create --driver bridge proxy
    fi

    if [ ! "$(docker ps -q -f name=proxy)" ]; then
        if [ "$(docker ps -aq -f status=exited -f name=proxy)" ]; then
            docker rm proxy
        fi

        # http://blog.florianlopes.io/host-multiple-websites-on-single-host-docker/
        docker run -d -p 80:80 --name proxy --net proxy \
            -v /var/run/docker.sock:/tmp/docker.sock:ro \
            jwilder/nginx-proxy
        sleep 3 # Modo daemon precisa aguardar subir
    fi

    docker-compose run \
      -e LOCAL_USER_ID=`id -u $USER` \
      -e LOCAL_GROUP_ID=`id -g` \
      -e LOCAL_GIT_NAME="`git config user.name`" \
      -e LOCAL_GIT_EMAIL=`git config user.email` \
      -e SSH_AUTH_SOCK=/ssh-agent \
      -e TZ='America/Sao_Paulo' \
      php
fi

