#!/usr/bin/python
# -*- coding: utf-8 -*-
#
# Licensed under GPL v2
# Copyright 2009, Aşkın Yollu <askin@askin.ws>
#
# This program is free software; you can redistribute it and/or modify it under
# the terms of the GNU General Public License as published by the Free
# Software Foundation; either version 2 of the License, or (at your option)
# any later version.
#
# Please read the COPYING file.
#

import sys
# set locale
import locale
locale.setlocale(locale.LC_ALL, "")

# except words
except_words = [u'mı', u'mi' ,u'mı,', u'mi,', u'mı?', u'mi?', u've', u'veya', u'de', u'da']

'''
return: [[word1, word2 ...], [word3, word4 ...], ...]
'''
filename = sys.argv[1]
fl = open(filename)

flo = open(filename + '.out', 'w')
for line in fl:
    # to unicode
    uline = u'%s' % line
    linearray = uline.split()
    tmpline = ""

    for i in linearray:
        if i in except_words:
            tmpline = u'%s %s' % (tmpline, i)
        else:
            tmpline = u'%s %s' % (tmpline, i.capitalize())

    flo.write(tmpline[1:] + '\n')
