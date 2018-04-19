# Introduction:
## wiring DS18B20 with Raspberry Pi
pertama kita harus melakukan konfigurasi raspberry pi dengan sensor suhu DS18B20. pada sensor suhu DS18B20 memiliki 3 kaki berwarna merah, kuning dan hitam, antara kabel warna merah dan kuning sambungkan dengan menggunakan resistor 10K oHm. kemudian jumper ketiga kabel tadi ke pin GPIO raspberry pi, jumper kabel merah ke pin GPIO 3V, kabel kuning ke GPIO 4 dan hitam ke GPIO GROUND.

## Configure Raspberry Pi GPIO 4 from In/Out to onewire sensor
ketik perintah berikut pada command line raspberry pi:

`$ sudo nano /boot/config.txt`

dan tambahkan perintah berikut di baris terakhir:

`dtoverlay=w1-gpio`

simpan dan reboot raspberry pi 

## GPIO and Therm kernel modules
sekarang kita aktifkan kernel modul untuk GPIO pin pada raspberry pi dan sensor temperatur DS18B20 dengan menjalankan perintah :

`sudo modprobe w1-gpio`

`sudo modprobe w1-therm`

agar tidak selalu menjalankan perintah tersebut ketika reboot raspberry pi, maka kita edit file /etc/modules dan tambahkan perintah :

`w1-gpio`

`w1-therm`

## Tes output 
untuk melakukan tes apakah rapsberry pi sudah dapat membaca temperatur yang dihasilkan oleh sensor DS18B20 jalankan perintah:

`$ cd /sys/bus/w1/devices/`

cek informasi serial number sensor suhu dengan perintah ls, maka akan terlihat informasi device misalnya **28-0516b0670bff**,  masuk ke folder tersebut lalu jalankan perintah:

`cat w1_slave`

sensor DS18B20 secara periodik mencatat suhu di file w1_slave, **t=** memperlihatkan suhu yang tercatat.

## Menampilkan suhu ke web
saya anggap raspberry pi sudah terinstall web server, buat file temp.php untuk membaca data suhu yang tersimpan pada file w1_slave. pada temp.php ini saya mengirim data suhu ke web service iot https://iot.umsida.ac.id ($sh = file_get_contents('https://iot.umsida.ac.id/dev/api/key/**YOUR API KEY**/field/0/sts/'.$temp);), ini optional saja.
kemudian buat file index.php untuk menampilkan suhu secara periodik
 
 
