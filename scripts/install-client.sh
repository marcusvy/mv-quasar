#!/bin/bash
cd ../root
# Install Angular
ng set --global packageManager=yarn
ng new --prefix="mv" --routing=true --style="scss" --directory="client" mv-quasar

