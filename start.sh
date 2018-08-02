#!/bin/bash
for file in /usr/share/apache2/prob*
do
    echo "staring $file"
    $file/start.sh
    echo ""
done