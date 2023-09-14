<?php
$nm_invite = $data->nm_invite;
$caten_pr = $this->fungsi->user_login()->caten_pr;
$caten_lk = $this->fungsi->user_login()->caten_lk;
$nm_anak = $this->fungsi->user_login()->nm_anak;
$jenis_undangan = $this->fungsi->user_login()->jenis_undangan;
$spasi = str_replace(" ", "%20", $nm_invite);
$koma = str_replace(",", "%2C", $spasi);
$link = str_replace("&", "dan", $koma);
$url = $data->url_invite . '?to=' . $link;

if ($jenis_undangan == "1") {

    $share =
        urlencode("Assalamu'alaikum Wr. Wb
\rBismillahirahmanirrahim.

Yth. Bapak/Ibu/Saudara/i:
*$nm_invite*

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :

*$caten_pr & $caten_lk*

Berikut link undangan kami untuk info lengkap dari acara bisa kunjungi :

$url

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Wassalamu'alaikum Wr. Wb.
Terima Kasih.");
} elseif ($jenis_undangan == "2" || $jenis_undangan == "3") {
    $share =
        urlencode("Assalamu'alaikum Wr. Wb
\rBismillahirahmanirrahim.

Yth. Bapak/Ibu/Saudara/i:
*$nm_invite*

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara tasyakuran dan aqiqah anak kami :

*$nm_anak*

Berikut link undangan kami untuk info lengkap dari acara bisa kunjungi :

$url

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Wassalamu'alaikum Wr. Wb.
Terima Kasih.");
} else {
    $share =
        urlencode("Tidak Ada Pesan");
}
$text1 = urldecode($share);
