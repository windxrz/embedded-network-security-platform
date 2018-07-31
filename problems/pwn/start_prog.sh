#!/bin/sh

touch /var/lock/start_prog

case "$1" in
    start)
        echo "Starting pwn problem..."
        su - root -c 'while true; do nc -l -p 10000 -e /usr/share/apache2/1/run.sh; done' &
        progPID=$!
        echo $progPID
        ;;
    stop)
        kill $progPID
        ;;
    *)
        echo "Usage: start_prog {start/stop}"
        exit 1
        ;;
esac

exit 0