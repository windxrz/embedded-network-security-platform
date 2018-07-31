wget http://cr.yp.to/ucspi-tcp/ucspi-tcp-0.88.tar.gz
wget http://www.qmail.org/moni.csi.hu/pub/glibc-2.3.1/ucspi-tcp-0.88.errno.patch
wget http://smarden.org/pape/djb/manpages/ucspi-tcp-0.88-man.tar.gz

tar xvzf ucspi-tcp-0.88.tar.gz &&
cd ucspi-tcp-0.88
patch -Np1 -i ../ucspi-tcp-0.88.errno.patch &&
sed 's|/usr/local|/usr|' conf-home > conf-home~ &&
mv -f conf-home~ conf-home &&
make &&
make setup check

cd ..
rm -rf ucspi-tcp-0.88 ucspi-tcp-0.88-man.tar.gz  ucspi-tcp-0.88.errno.patch  ucspi-tcp-0.88.tar.gz
