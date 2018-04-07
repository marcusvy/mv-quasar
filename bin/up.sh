#!/bin/sh
docker-compose up -d
code .
cd quasar/client
yarn start -o
