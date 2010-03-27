#!/bin/bash
# version 0.1

# variables
scriptpath=/home/kelebek/scripts
archivepath=/home/kelebek/pinar\&me/film-archive

# warning
if [ $# -eq 0 ]
then
    echo "There is no parameters"
    echo "please give"
    echo " -d for downloading"
    echo " -s for show films which have subtitle"
    echo " -n for show films which have't subtitle"
fi

# main
case $1 in
    -d) $scriptpath/ShowDownloadingFilms.sh $archivepath ;;
    -s) $scriptpath/ShowFilmsWithSubtitle.sh $archivepath ;;
    -n) $scriptpath/ShowFilmsWithoutSubtitle.sh $archivepath ;;
    *)  echo " wrong parameters!!"
esac