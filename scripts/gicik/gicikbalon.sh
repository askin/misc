#!/bin/bash

#buraya yazı dosyasının yolunu girin, her satırı bir alıntı sayılacak
alintidosyasi="/home/kelebek/gicik/gicik"
#ufak olsun resim, yoksa uyarı da büyüyor :)
resim="/home/kelebek/gicik/carla.png"

#rastgele fonksiyonumuz
yumul(){
    zaman=0
    TABAN=0
    while [[ "$zaman" -le $TABAN ]]
    do
	zaman=$RANDOM
	let "zaman %= $TAVAN" 
    done
}

#hiç bitmeyen bir döngü açalım
while true; 
do
    TAVAN=$((`cat $alintidosyasi | wc -l` + 1))
    yumul
    YAZI=`cat $alintidosyasi | sed -n "${zaman}p"`
#21 yaparak max. 20 dakika olarak ayarladım, kafana göre değiştir
    TAVAN=21
    yumul
    sleep $zaman\m
    IFS=":"
    set -- ${YAZI}
    
    notify-send -t 10000 "$1" "$2" -i $resim
done