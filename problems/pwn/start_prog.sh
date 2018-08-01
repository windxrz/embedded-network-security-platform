#!/bin/sh
cd /
tmux new-session -d -s "PWNServer" /usr/share/apache2/pwn/program/start.sh
