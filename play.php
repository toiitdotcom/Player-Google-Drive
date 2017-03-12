<?php 
$link = $_GET['link'];
$api = 'http://googledrive.toiit.com/glink.php?time=120&link='.$link;
$sources = curl($api);
// die($api);
// echo "<pre>";
// die(print_r($sources));
function curl($url)
{
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
}
?>
<div id="player"></div>
<script type="text/javascript" src="http://googledrive.toiit.com/jwplayer.js"></script>
<script type="text/javascript">
    jwplayer.key = "rqQQ9nLfWs+4Fl37jqVWGp6N8e2Z0WldRIKhFg==";
    var playerInstance = jwplayer("player");
        playerInstance.setup({
            id:'player',
            sources: <?php echo $sources; ?>,
            controls: true,
            displaytitle: true,
            width: "100%",
            height: "100%",
            aspectratio: "16:9",
            fullscreen: "true",
            autostart: true,
            abouttext: "toiit.com",
            aboutlink: "toiit.com",
        });
</script>