#!/bin/bash
#
# Copyright (C) 2009, Aşkın Yollu <askin@askin.ws>
#
# This program is free software; you can redistribute it and/or modify it under
# the terms of the GNU General Public License as published by the Free
# Software Foundation; either version 2 of the License, or (at your option)
# any later version.
#

# resmi indiriyoruz
# resim url
url=http://img27.imageshack.us/img27/7531/greeneyerk3.png
if [[ ! -a /tmp/greeneyerk3.png ]]
then
    wget $url -P /tmp >& /dev/null
fi

image="/tmp/greeneyerk3.png"

# uyarı başlığı
title="Mola Zamanı"

# Uyarı
text="Hoop Biladar 20 dakkadır bigisayarın başındasın kalk azıcık gözünü dinlendir"
# sonsuz döngü yaratıyoruz
while true;
do
    sleep 2 # 20 dakka dinlenme
    notify-send -t 10000 "$title" "$text" -i $image
done
