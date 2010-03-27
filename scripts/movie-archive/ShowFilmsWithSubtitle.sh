#!/bin/bash

#version: 0.2
#path is user defined variable
#if there is no parameter, path is /home/kelebek/pinar&me/film-archive

if [ $# -eq 0 ]
then
    archivepath=/home/kelebek/pinar\&me/film-archive
else
    archivepath=$1
fi

cat $archivepath | grep "\[OK\ \] \[OK\ \]"
