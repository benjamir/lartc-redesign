# $Id$ 

HOWTODOCS := howto/ html.tar.gz lartc.txt lartc.dvi lartc.pdf lartc.pdf.gz lartc.ps lartc.ps.gz lartc.html lartc.epub

all: $(HOWTODOCS) contriblist changelog.txt

clean:
	rm -rf $(HOWTODOCS) contriblist lartc.aux lartc.log lartc.out

%.pdf.gz: %.pdf
	gzip < $<  > $@

%.ps.gz: %.ps
	gzip < $<  > $@

howto/: lartc.db
	docbook2html -V "%use-id-as-filename%" -o howto/ lartc.db

html.tar.gz: howto/
	tar czf html.tar.gz howto/

%.txt: %.db
	docbook2txt $<

%.pdf: %.db
	docbook2pdf -p /usr/bin/openjade $<

%.ps: %.db
	docbook2ps $<

%.dvi: %.db
	docbook2dvi $<

%.epub: %.db
	# Tack URL onto end of first line to make it pass XML criteria
	sed -e '1s#># "http://www.oasis-open.org/docbook/xml/4.1/docbookx.dtd" > #' $< >/tmp/lartc.db 
	xmlto epub /tmp/lartc.db > lartc.epub

lartc.html: lartc.db
	docbook2html --nochunks lartc.db

contriblist: lartc.txt
	./makecontriblist > contriblist

changelog.txt:
	git log >changelog.txt

publish:
	# Print a list of files which should be synced.
	# Note that autoloadbalance.html, index.php3 and manpages/index.php3
	# are not in this list because they are not rebuilt by this Makefile.
	echo $(HOWTODOCS) contriblist changelog.txt LARTC-zh_CN.GB2312.pdf wondershaper/ autoloadbalance.html index.php3 manpages/
