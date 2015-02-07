#!/usr/bin/env perl
use warnings;
use strict;

# run this program from the base of the getsimple distribution, something like:
# perl theme/TLP/fix_links.pl
# it will spit out a bunch of perl commands that you should then run.
# it does *not* actually make the changes, because I'm a wimp

my $source = 'localhost:8888';
my $dest = 'gstest.longwoodplayers.org';

my @files = `grep -rl "$source" *`;

foreach my $f (@files) {
	chomp($f);
	next if ($f =~ m/fix_links\.pl/);
	print "perl -pi -e 's/\Q$source\E/$dest/g' $f\n";
}
