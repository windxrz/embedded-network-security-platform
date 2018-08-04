#!/bin/bash
for file in /usr/share/apache2/prob*
do
    echo "starting $file"
    cd $file/index
    touch ans.txt
    chmod 666 ans.txt
    if [ -f $file/start.sh ]; then
        echo "$file"
        $file/start.sh
    fi
    echo ""
done

cd /usr/share/apache2/term_index
touch name
chmod 666 name

tmux new-session -d -s "Heartbeat" /usr/share/apache2/update_ip.py
