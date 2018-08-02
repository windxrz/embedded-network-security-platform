#!/bin/sh
cd /usr/share/apache2/prob1/index
touch ans.txt
chmod 666 ans.txt
cd /
tmux new-session -d -s "PWNServer" /usr/share/apache2/prob1/program/start.sh
