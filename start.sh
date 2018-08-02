#!/bin/bash
for file in /usr/share/apache2/prob*
do
    echo "staring $file"
    $file/start.sh
    echo ""
done

cd /usr/share/apache2/term_index
touch name
chmod 666 name
