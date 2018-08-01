#!/bin/sh
cd /usr/share/apache2/prob3/website
make
tmux new-session -d -s "WebServer" ./server.py
