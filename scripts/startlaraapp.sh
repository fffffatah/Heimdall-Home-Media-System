#!/bin/env /bin/bash

# Author : A.F.M. NOORULLAH

MYIP=$(hostname --ip-address | grep -o '^\S*')

cd /home/ubuntu/system_a/Heimdall-Home-Media-System/src && sudo php artisan serve --host $MYIP --port 8000