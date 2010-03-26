#!/usr/bin/env python
# -*- coding: utf-8 -*-

cikti = open("cikti.txt", "w")
girdi = open("girdi.txt", "r")

alltext = girdi.read()

i = 0
while i < len(alltext):
	if alltext[i] == '\n':
		if alltext[i - 1] == '.':
			cikti.write("\n")

		if alltext[i - 1] == '?':
			cikti.write("\n")

		if alltext[i - 1] == ':':
			cikti.write("\n")

		if alltext[i - 1] == '!':
			cikti.write("\n")

		if alltext[i - 1] == '"':
			cikti.write("\n")

		if alltext[i - 1] == ';':
			cikti.write("\n")

		if alltext[i - 1] == '.':
			cikti.write("\n")

		if i < len(alltext) - 1 and alltext[i + 1] == '\n':
			cikti.write('\n\n')
			i += 1
		else:
			cikti.write(' ')

	elif alltext[i] == '.' and alltext[i + 1] == '.' and alltext[i + 2] == '.' and alltext[i + 3] == '\n':
		cikti.write("\n")
		i += 3
	elif alltext[i] == '\xe2' and alltext[i + 1] == '\x80' and alltext[i + 2] == '\xba':
		cikti.write("ı")
		i += 2
	elif alltext[i] == '\xe2' and alltext[i + 1] == '\x80' and alltext[i + 2] == '\xb9':
		cikti.write("İ")
		i += 2
	elif alltext[i] == '\xc2' and alltext[i + 1] == '\xa4':
		cikti.write("ğ")
		i += 1
	elif alltext[i] == '\xe2' and alltext[i + 1] == '\x81' and alltext[i + 2] == '\x84':
		cikti.write("Ğ")
		i += 2
	elif alltext[i] == '\xef' and alltext[i + 1] == '\xac' and alltext[i + 2] == '\x82':
		cikti.write("ş")
		i += 2
	elif alltext[i] == '\xef' and alltext[i + 1] == '\xac' and alltext[i + 2] == '\x81':
		cikti.write("Ş")
		i += 2
	elif alltext[i] == '-' and alltext[i + 1] == '\n':
		print "buldu"
		i += 1
	else:
		cikti.write(alltext[i])

	i += 1

girdi.close()
cikti.close()
