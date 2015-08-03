# Longwood Players GetSimple web site documentation

## Overview

The new Longwood Players website is based on [GetSimple CMS][gs]. We use three
plugins to provide functionality beyond that available in the base system and
the theme. The [multi-user][mu] plugin allows us to have multiple user accounts.
The [I18N Special Pages][sp] plugin lets us create pages with extra fields for
entering data, and the [I18N Special Pages extras][ex] plugin adds a few more
options to the extra fields provided by I18N Special Pages.

[gs]: http://get-simple.info
[mu]: http://get-simple.info/extend/plugin/multi-user/133/
[sp]: http://get-simple.info/extend/plugin/i18n-special-pages/319/
[ex]: http://get-simple.info/extend/plugin/i18n-special-pages-extras/768/

GetSimple CMS provides a WYSIWYG editor, so for most tasks you don't need to
know HTML, but your life may be easier if you have a rudimentary understanding
of HTML and CSS.

Most of the complexity of the TLP site happens in the theme layer. The theme
was developed by [Ricky Morse][rm], so if you have any questions, aim them at him.

[rm]: mailto:pukku@mac.com

## Common tasks

Following are the instructions for a number of common tasks that might need to be
done with the website. They should be independent with regard to each other, but
some things may get explained better in one walk-through than another.

## Theme reference

This is a most of the files in the theme, and notes associated with each one. Ideally,
all possible behaviours that might exist should be documented somewhere in here.
