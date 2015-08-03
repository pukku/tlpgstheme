#!/usr/bin/env perl
use warnings;
use strict;
use Getopt::Long;


# run this program from the base of the getsimple distribution, something like:
# perl theme/TLP/fix_links.pl
# it will spit out a bunch of perl commands that you should then run.
# it does *not* actually make the changes, because I'm a wimp


my $source;
my $dest;
GetOptions('s|source=s' => \$source, 'd|dest=s' => \$dest)
	or die("error in command line arguments\n");


if (!defined($source) or ($source eq '')) {
	$source = 'localhost:8888';
}
if (!defined($dest) or ($dest eq '')) {
	$dest = 'gstest.longwoodplayers.org';
}

my @files = `grep -rl "$source" *`;

foreach my $f (@files) {
	chomp($f);
	next if ($f =~ m/fix_links\.pl/);
	print "perl -pi -e 's/\Q$source\E/$dest/g' $f\n";
}
