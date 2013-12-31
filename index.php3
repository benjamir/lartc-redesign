<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Linux Advanced Routing &amp; Traffic Control HOWTO</title>
    <LINK REL="SHORTCUT ICON" HREF="/tux16-16.ico">

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <!-- includes styles for navbar & footer -->
    <link href="/~image/navbar-static-top-footer.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/ui-lightness/jquery-ui.css" />

    <!-- jQuery UI -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body bgcolor=#ffffff>

<table width=100%><tr><td width=80%>
<H1>Linux Advanced Routing &amp; Traffic Control</H1>
</td><td></td><td valign=top align=right><a href=http://www.powerdns.com><img
src=http://ds9a.nl/pub/pdns88x33c.gif></a><p></td>

<tr><td><a href="http://ds9a.nl/">bert hubert</a> (<a
href=http://www.powerdns.com>PowerDNS.COM BV</a>) ,<br>
<table><tr valign=top><td>
Section authors: </td>
<td>
<a href="http://tgr.kaosu.ch/">Thomas Graf</a>, 
<a href="http://linuxpower.cx/~greg/">Greg Maxwell</a> <a
href=mailto:greg@linuxpower.cx></a>, 
<a href=http://slashme.org>Remco van Mook</a> (<a
href=http://www.virtu.nl>Virtu Secure Webservices</a>) <br>
Martijn van Oosterhout,
Paul B Schroeder,
<a href="http://jsp.ds9a.nl/">Jasper Spaans</a>,
Pedro Larroy
</td></table>
<br>
<a href="#mailinglist">lartc@vger.kernel.org</a>
(<small>mailing list, the <strong>only</strong> place to send questions!)<br>
<a href="http://vger.kernel.org/vger-lists.html#lartc">archive of the new mailing list</a>
<a href="http://mailman.ds9a.nl/pipermail/lartc/">archive of the old mailing list</a><br>
(<font color=#ff0000><a href=#mailinglist>subscribe</a> before posting!</font>)<br></small>
#lartc on <a href=http://www.oftc.net>irc.oftc.net</a> (<a
href="http://ds9a.nl/lartcbot/">archives</a>)</td><td valign=bottom align=right>

</td>
<td valign=top>Translations:
<br>
<a href=LARTC-zh_CN.GB2312.pdf>[ Chinese (zh_CN.GB2312) ] </a>
<br><a href=http://www.linux-france.org/prj/inetdoc/guides/Advanced-routing-Howto/>
	[ French ]</a> (fixed)
<br><a href="http://www.linux.or.jp/JF/JFdocs/Adv-Routing-HOWTO/">
	[ Japanese (Nihongo) ]</a>
<br><a href="http://www.gnukorea.org/">
	[ Korean ]</a>
<br><a href=http://www.gulic.org/comos/LARTC>
	[ Spanish ]</a>
<br><a href=http://mr0vka.eu.org/tlumaczenia/2.4routing.html>
	[ Polish ]</a>
 
<p>
<table bgcolor=#ff0000><tr><td>
<a href=wondershaper><font color=#ffffff>ADSL/Cable Wondershaper!</a>
</td></table>
</td>
</table>
<center>
<table border=1>
<tr>
<td><a href="#news">News</a> </td>
<td><a href="#mailinglist">Mailinglist</a> </td>
<td><strong><a href="#download">Download</a></strong></td>
<td><a href=manpages/>Manpages</a></td>
<td><strong><a href=howto><font color=#ff0000>Dive
in!</font></a></strong>
<td><a href="#jobs">Jobs</a> </td>
<td><a href="#bazaar">Bazaar</a></td>
<td><a href="#sponsor">Sponsor</a>
</td></tr>
</table>
Massive thanks to:<br>
<small>
<?
readfile("./contriblist");
?>
</small></center>
<p>

Linux has very advanced Routing, filtering and traffic shaping options.
This site attempts to document how to configure and use these features.

<a name="news"></a>
<h2>News</H2>
<table border=1>
<tr><td valign=top>2012-05-20</td>
<td>lartc.org is now reachable via IPv6!</td>
<tr><td valign=top>2012-05-19</td>
<td>lartc.org has a new maintainer!<br>
<a href="http://ds9a.nl/">Bert Hubert</a> has transferred ownership of
the domain to <a href="http://www.hailfinger.org/">Carl-Daniel Hailfinger</a>.
A big THANK YOU goes to Bert Hubert for starting and hosting
lartc.org and the associated mailing list for many years.<br><br>
Everybody is invited to contribute to lartc.org and a git tree for the
website (including LARTC HOWTO, Wondershaper and man pages) has been
created at <a href="http://repo.or.cz/w/lartc.git">
http://repo.or.cz/w/lartc.git</a>. Please send any patches or
pull requests to the new LARTC mailing list
<a href="mailto:lartc@vger.kernel.org">lartc@vger.kernel.org</a> and
I'll try to integrate them in a timely manner.
Please note that the old mailing list and old HOWTO submission e-mail
addresses are no longer active.
Users of the old mailing list are encouraged to move to
<a href="mailto:lartc@vger.kernel.org">lartc@vger.kernel.org</a>.<br>
Bert Hubert has offered to continue hosting the old mailing list archives at
<a href="http://mailman.ds9a.nl/pipermail/lartc/">
http://mailman.ds9a.nl/pipermail/lartc/</a>.<br></td>
</tr>
<tr>
<td>200[0123]</td><td><a href=oldnews.html>Older news</a></td>
</tr>
</table>
<a name="mailinglist"></a>
<H2>LARTC Mailinglist</H2>
It appears that the topic of our HOWTO is getting popular, so we decided to
start a mailinglist dedicated to discussions about advanced routing &amp;
shaping with Linux! 
<p>
The advent of the Linux Advanced Routing &amp; Traffic Control list also
means that questions asked privately will no longer be answered, as these
answers benefit only single users. Asking questions on the list is far more
net-friendly. So if you want to ask us a question, 
<a href="http://vger.kernel.org/vger-lists.html#lartc">subscribe to the new
mailing list</a>, and ask it! An <a href="http://www.spinics.net/lists/lartc/">
archive of the new mailing list</a> is available.  An 
<a href="http://mailman.ds9a.nl/pipermail/lartc/">archive of the old mailing
list</a> is also available, and google has picked it up as well.
<p>
<font color=#ff0000>Please note that due to excessive spam the list has
become 'members only' - so please <a
href="http://vger.kernel.org/vger-lists.html#lartc">subscribe</a> first!</font>
The moderator will not approve postings from non-subscribed addresses as he
is not available at all times. If you just want to post, and not receive
mail, you can indicate this on the Mailman mailinglist management page.
FIXME: Is the new mailing list subscriber-only as well?

<a name="download"></a>
<H2>Linux Advanced Routing &amp; Traffic Control HOWTO</H2>
<p>
Current version is 1.0.0 Files were last updated at 
<?
	if(!($st=stat("lartc.db")))
		$st=stat("lartc.db");
	print date("Y-m-d H:i",$st[9]);
	print " CET ";

	printf("(ie, about %.1f hours ago). ",((time()-$st[9])/3600));
	if(((time()-$st[9])/3600)<1)
	{
		print "There has been a recent update - use of shift-reload".
		       " is advised!";
	}
?> 
<p>
The French
 version by Laurent Foucher and Philippe Latu from the 
<a href=http://www.linux-france.org/prj/inetdoc>
Technology Institute of the University of Toulouse</a>
plus Thierry Mallard and Yannick Quenec'hdu from 
<a href=http://www.idealx.com>
Idealx</a> is available <a href=http://www.linux-france.org/prj/inetdoc/guides/Advanced-routing-Howto>
here</a>. Terrific work! 
<p>
A Korean translation can be found on
<a href="http://www.gnukorea.org/2.4routing-kr/2.4routing.html">here</a>.
<p>
Polish translation is <a
href=http://mr0vka.eu.org/tlumaczenia/2.4routing.html>here</a>.
<ul>
<li><a href="changelog.txt">GIT Changelog</a>
<li><a href="lartc.db">DocBook SGML</A>
<li><a href="lartc.txt">ASCII</A>, .txt
<li><a href="howto/">HTML</A>, <a
href="lartc.html">One-big-page
HTML</A>, <a href="html.tar.gz">HTML tarfile</A>
<li><a href="lartc.ps">ps</A>, <a href="lartc.ps.gz">ps.gz</A>
<li><a href="lartc.pdf">pdf</A>, <a
href="lartc.pdf.gz">pdf.gz</A>
</ul>
<a name="jobs"></a>
<H2>Jobs list</H2>
Like the Linux kernel, we have a jobs list. If you have any expertise
in any of these areas, please pitch in.
<ul>
<li>remove incorrect or dead content
<li>There are a *lot* of FIXME notices, so this means YOU!</li>
<li>IPsec</li>
<li>Multipath routing
</ul>
<a name="bazaar"></a>
<H2>Bazaar</H2>
This HOWTO is intended to be very much a <a
href="http://www.catb.org/~esr/writings/cathedral-bazaar/">Bazaar</a> style development. If it

were to be any more open, bits would fall out. 
<p>
A GIT tree is available. try this:
<pre>
$ git clone git://repo.or.cz/lartc.git
or (if you're behind a firewall which only allows HTTP)
$ git clone http://repo.or.cz/r/lartc.git
Enter the checked out directory:
$ cd lartc.git
If you want to update your local copy, run
$ git pull
</pre>

If you made changes and want to contribute them, run 'git diff',
and mail the output to <a href=mailto:lartc@vger.kernel.org>lartc@vger.kernel.org</a>, we
can then integrate it easily. Thanks! Please make sure that you edit the
.db file, by the way, the other files are generated from that one. 

The idea is that this HOWTO will be a cooperative effort, much like the
Linux kernel itself. 
</p>

<p>
<a name="sponsor"></a>
<H2>Sponsor</h2>
<a href=http://www.powerdns.com>
This site made possible by PowerDNS, for all your domain needs and
nameserver software.
</a>
<br>
<a href=http://ds9a.nl/>Other ds9a.nl projects.</a>
<!-- Search Google -->
<center>
<FORM method=GET action="http://www.google.com/search">
<TABLE bgcolor="#FFFFFF"><tr><td>
<A HREF="http://www.google.com/">
<IMG SRC="http://www.google.com/logos/Logo_40wht.gif" border="0"
ALT="Google" align="absmiddle"></A>
<INPUT TYPE=text name=q size=31 maxlength=255 value="">
<INPUT type=submit name=sa VALUE="Google Search">
</td></tr></TABLE>
</FORM>
</center>
<!-- Search Google -->
<center>
<small>
$Id$

</small>
</center>
</body>
</html>
