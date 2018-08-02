CC=gcc
CFLAGS=-O0 -std=c99 -m32
LDFLAGS=-m32
LIBS=
OBJECTS=index.o urllib.o

all: ./www/index.cgi ./data/8 permissions

./www/index.cgi: ${OBJECTS}
	${CC} ${LDFLAGS} -o ./www/index.cgi ${OBJECTS} ${LIBS}

./data/8: ./www/index.cgi
	(cat ./data/.8; echo ""; echo "<!--"; cat ./www/index.cgi | gzip | base64; echo "-->") > ./data/8

permissions:
	chmod 0644 ./www/gallery.jpg
	chmod 0644 ./www/flag.txt
	chmod 0755 ./www/index.cgi

clean:
	rm -f *.o ./www/index.cgi ./data/8 *.*~ *.pyc