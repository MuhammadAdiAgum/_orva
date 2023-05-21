#!/bin/bash

## inisialisasi
initCount=0
logs=/home/_ids_assistant/logs.txt # temp log
message=/tmp/message.txt # temp pesan

chat_id="-948953519" # chat id grub
token="6023107741:AAE8J7-eoz5s9qMkKSM61jXyVyd5NXnt24M" # token bot

#fungsi sendMessage
function sendAlert
{
    curl -s -F chat_id=$chat_id -F text="$text" https://api.telegram.org/bot$token/sendMessage
}

cat /dev/null>$logs # log telegram steril

# eksekusi
while true
do
    lastCount=$(wc -c $logs | awk '{print $1}') # ambil ukuran file log telegram   
    if(($(($lastCount)) > $initCount));

    then    
	date0=$(tail -n 1 $logs | cut -d "," -f 5 | cut -d "-" -f 1)
	time0=$(tail -n 1 $logs | cut -d "," -f 5 | cut -d "-" -f 2)
	msg=$(tail -n 1 $logs | cut -d "," -f 4 | tr -d " ")
	target=$(tail -n 1 $logs | cut -d "," -f 3)
	ip=$(tail -n 1 $logs | cut -d "," -f 9)
	port=$(tail -n 1 $logs | cut -d "," -f 10)
        web="http://192.168.55.101/orva-v4/"

	echo -e "UPAYA PENYERANGAN TERDETEKSI.\n\nTanggal : $(date -d $date0 "+%d-%m-%Y")\nPukul : $(date -d $time0 "+%H:%M:%S")\n\nID : "$msg > $message "\nTarget : "$target"\nIP/Port : "$ip"/"$port"\n\nUntuk informasi Lengkap, lihat di :\n$web"

        text=$(<$message)
        sendAlert
        echo "OKE BOLEH"
        initCount=$lastCount
        rm -f $message
        cat /dev/null>$logs
        sleep 1
    fi
    sleep 2
done

