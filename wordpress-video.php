<?php
/*
	Plugin Name: Worpress Video
	Description: Gives the opportunity to embed in post any video from:  Youtube.com, videos.sapo.pt,  google, vimeo.com and more!!!!
	Author: Peter CyClop
	Version: 1.0
	Author URI: http://1sonhador.com/
	Plugin URI: http://1sonhador.com/projectos/wordpress/plugins/
 */


function wordpress_video($attributes, $content = null)
{
    $id = '';
    $type = '';
    $width = '';
    $height = '';
    $sUrl = '';
    extract(shortcode_atts(array(
            'id' => '', 
            'type' => '', 
            'width' => '640', 
            'height' => '385'), $attributes));
    
    if (empty($id))
        return $content;
    
    if ($height > 0)
    {
        if (! $width > 0)
        {
            $width = intval($height * 16 / 9);
        }
    } else
    {
        if ($width > 0)
        {
            $height = intval($width * 9 / 16);
        }
    }
    
    switch (strtolower($type))
    {
        case 'youtube':
            $sUrl = 'http://www.youtube.com/v/{id}&rel=0&fs=1';
            break; //url: http://www.youtube.com
        case 'youtube-playlists':
            $sUrl = 'http://www.youtube.com/p/{id}&rel=0&fs=1';
            break; //url: http://www.youtube.com
        case 'dailymotion':
            $sUrl = 'http://www.dailymotion.com/swf/{id}&related=0';
            break; //url: http://www.dailymotion.com
        case 'megavideo':
            $sUrl = 'http://www.megavideo.com/v/{id}.0.0';
            break; //url: http://www.megavideo.com
        case 'metacafe':
            $sUrl = 'http://www.metacafe.com/fplayer/{id}/metacafe.swf';
            break; //url: http://www.metacafe.com
        case 'revver':
            $sUrl = 'http://flash.revver.com/player/1.0/player.swf?mediaId={id}';
            break; //url: http://www.revver.com
        case 'vimeo':
            $sUrl = 'http://vimeo.com/moogaloop.swf?clip_id={id}&server=vimeo.com&fullscreen=1&show_title=1&show_byline=1&show_portrait=0&color=01AAEA';
            break; //url: http://www.vimeo.com
        case 'adultswim':
            $sUrl = 'http://www.adultswim.com/video/vplayer/index.html?id={id}';
            break; //url: http://www.adultswim.com
        case 'aniboom':
            $sUrl = 'http://api.aniboom.com/e/{id}';
            break; //url: http://www.aniboom.com
        case 'bebo':
            $sUrl = 'http://static.videoegg.com/videoegg/loader.swf?file={id}';
            break; //url: http://www.bebo.com
        case 'blastro':
            $sUrl = 'http://images.blastro.com/images/flashplayer/flvPlayer.swf?site=www.blastro.com&amp;filename={id}';
            break; //url: http://www.blastro.com
        case 'bofunk':
            $sUrl = 'http://www.bofunk.com/e/{id}';
            break; //url: http://www.bofunk.com
        case 'clipmoon':
            $sUrl = 'http://www.clipmoon.com/flvplayer.swf?config=http://www.clipmoon.com/flvplayer.php?viewkey={id}&external=yes';
            break; //url: http://www.clipmoon.com
        case 'clipser':
            $sUrl = 'http://www.clipser.com/Play?vid={id}';
            break; //url: http://www.clipser.com  case 'clipser':
        case 'clipshack':
            $sUrl = 'http://www.clipshack.com/player.swf?key={id}';
            break; //url: http://www.clipshack.com
        case 'collegehumor':
            $sUrl = 'http://www.collegehumor.com/moogaloop/moogaloop.swf?clip_id={id}';
            break; //url: http://www.collegehumour.com
        case 'colbertnation':
            $sUrl = 'http://media.mtvnservices.com/mgid:cms:item:comedycentral.com:{id}';
            break; //url: http://www.colbertnation.com
        case 'current':
            $sUrl = 'http://current.com/e/{id}/en_US';
            break; //url: http://www.current.com
        case 'dailyhaha':
            $sUrl = 'http://www.dailyhaha.com/_vids/Whohah.swf?Vid={id}.flv';
            break; //url: http://www.dailyhaha.com
        case 'doubleviking':
            $sUrl = 'http://www.doubleviking.com/mediaplayer.swf?file={id}';
            break; //url: http://www.doubleviking.com
        case 'dropshots.com':
            $sUrl = 'http://www.dropshots.com/dropshotsplayer.swf?url={id}';
            break; //url: http://www.dropshots.com
        case 'dv.ouou':
            $sUrl = 'http://dv.ouou.com/v/{id}';
            break; //url: http://dv.ouou.com
        case 'divshare':
            $sUrl = 'http://www.divshare.com/flash/playlist?myId={id}';
            break; //url: http://www.divshare.com
        case 'funmansion':
            $sUrl = 'http://media.funmansion.com/funmansion/player/flvplayer.swf?flv={id}';
            break; //url: http://www.funmansion.com
        case 'g4tv':
            $sUrl = 'http://www.g4tv.com/lv3/{id}';
            break; //url: http://www.g4tv.com
        case 'gamekyo':
            $sUrl = 'http://www.gamekyo.com/flash/flvplayer.swf?videoid={id}';
            break; //url: http://www.gamekyo.com
        case 'glumbert':
            $sUrl = 'http://www.glumbert.com/embed/{id}';
            break; //url: http://www.glumbert.com
        case 'godtube':
            $sUrl = 'http://godtube.com/flvplayer.swf?viewkey={id}';
            break; //url: http://www.godtube.com
        case 'howcast':
            $sUrl = 'http://www.howcast.com/flash/howcast_player.swf?file={id}&theme=black';
            break; //url: http://www.howcast.com
        case 'ign':
            $sUrl = 'http://videomedia.ign.com/ev/ev.swf?object_ID={id}';
            break; //url: http://www.ign.com
        case 'ijigg':
            $sUrl = 'http://www.ijigg.com/jiggPlayer.swf?songID={id}&Autoplay=0';
            break; //url: http://www.ijigg.com
        case 'indyarocks':
            $sUrl = 'http://www.indyarocks.com/videos/embed-{id}';
            break; //url: http://www.indyarocks.com
        case 'ireport':
            $sUrl = 'http://www.ireport.com/themes/custom/resources/cvplayer/ireport_embed.swf?player=embed&configPath=http://www.ireport.com&playlistId={id}&contentId={id}/0&';
            break; //url: http://www.ireport.com
        case 'izlesene':
            $sUrl = 'http://www.izlesene.com/player2.swf?video={id}';
            break; //url: http://www.izlesene.com
        case 'jamendo':
            $sUrl = 'http://widgets.jamendo.com/en/album/?album_id={id}&playertype=2008';
            break; //url: http://www.jamendo.com
        case 'koreus':
            $sUrl = 'http://www.koreus.com/video/{id}';
            break; //url: http://www.koreus.com
        case 'livevideo':
            $sUrl = 'http://www.livevideo.com/flvplayer/embed/{id}';
            break; //url: http://www.livevideo.com
        case 'machinima-old':
            $sUrl = 'http://www.machinima.com/_flash_media_player/mediaplayer.swf?file=http://machinima.com/p/{id}';
            break; //url: http://www.machinima.com
        case 'machinima-new':
            $sUrl = 'http://machinima.com:80/_flash_media_player/mediaplayer.swf?file=http://machinima.com:80/f/{id}';
            break; //url: http://www.machinima.com
        case 'motionbox':
            $sUrl = 'http://www.motionbox.com/external/hd_player/type%3Dsd%2Cvideo_uid%3D{id}';
            break; //url: http://www.motionbox.com
        case 'mpora':
            $sUrl = 'http://video.mpora.com/ep/{id}/';
            break; //url: http://video.mpora.com
        case 'm-thai':
            $sUrl = 'http://video.mthai.com/Flash_player/player.swf?idMovie={id}';
            break; //url: http://video.mthai.com
        case 'nhaccuatui':
            $sUrl = 'http://www.nhaccuatui.com/m/{id}';
            break; //url: http://www.nhaccuatui.com
        case 'onsmash':
            $sUrl = 'http://videos.onsmash.com/e/{id}';
            break; //url: http://www.onsmash.com
        case 'photobucket':
            $sUrl = 'http://media.photobucket.com/flash/player.swf?file={id}';
            break; //url: http://www.photobucket.com
        case 'putfile':
            $sUrl = 'http://feat.putfile.com/flow/putfile.swf?videoFile={id}';
            break; //url: http://www.putfile.com
        case 'screentoaster':
            $sUrl = 'http://www.screentoaster.com/swf/STPlayer.swf?video={id}';
            break; //url: http://www.screentoaster.com
        case 'snotr':
            $sUrl = 'http://videos.snotr.com/player.swf?video={id}&amp;embedded=true&amp;autoplay=false';
            break; //url: http://www.snotr.com
        case 'southpark-studios':
            $sUrl = 'http://media.mtvnservices.com/mgid:cms:item:southparkstudios.com:{id}:';
            break; //url: http://www.southparkstudios.com
        case 'spike':
            $sUrl = 'http://www.spike.com/efp?flvbaseclip={id}&';
            break; //url: http://www.spike.com
        case 'stupidvideos':
            $sUrl = 'http://images.stupidvideos.com/2.0.2/swf/video.swf?sa=1&sk=7&si=2&i={id}';
            break; //url: http://www.stupidvideos.com
        case 'tinypic':
            $sUrl = 'http://v5.tinypic.com/player.swf?file={id}';
            break; //url: http://www.tinypic.com
        case 'todays-big-thing':
            $sUrl = 'http://www.todaysbigthing.com/betamax/betamax.swf?item_id={id}&fullscreen=1';
            break; //url: http://www.todaysbigthing.com
        case 'tudou':
            $sUrl = 'http://www.tudou.com/v/{id}';
            break; //url: http://www.tudou.com
        case 'videos.sapo':
            $sUrl = 'http://videos.sapo.pt/play?file=http://videos.sapo.pt/{id}/mov/1';
            break; //url: http://videos.sapo.pt
        case 'vidiac':
            $sUrl = 'http://www.vidiac.com/vidiac.swf?video={id}';
            break; //url: http://www.vidiac.com
        case 'vsocial-type1':
            $sUrl = 'http://static.vsocial.com/flash/ups.swf?d={id}&a=0';
            break; //url: http://www.vsocial.com/vsandbox/
        case 'wegame':
            $sUrl = 'http://wegame.com/static/flash/player2.swf?tag={id}';
            break; //url: http://www.wegame.com
        case 'youku':
            $sUrl = 'http://player.youku.com/player.php/sid/{id}=/v.swf';
            break; //url: http://www.youku.com
        default:
            $sUrl = $content;
            break;
    }
    if ($sUrl != '')
    {
        $sPlayerTemplate = '
    <object type="application/x-shockwave-flash" data="{url}" width="{width}"  height="{height}">
    	<param name="movie" value="{url}" />
    	<param name="quality" value="high" />
    	<param name="allowFullScreen" value="true" />
    	<param name="allowScriptAccess" value="always" />
    	<param name="pluginspage" value="http://www.macromedia.com/go/getflashplayer" />
    	<param name="autoplay" value="false" />
    	<param name="autostart" value="false" />
			<embed src="{url}" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="{width}" height="{height}"></embed>
    	</object>';
        
        $sPlayerTemplate = str_replace('{url}', $sUrl, $sPlayerTemplate);
        $sPlayerTemplate = str_replace('{width}', $width, $sPlayerTemplate);
        $sPlayerTemplate = str_replace('{height}', $height, $sPlayerTemplate);
        $sPlayerTemplate = str_replace('{id}', $id, $sPlayerTemplate);
        return $sPlayerTemplate;
    }
    
    //so... its not a valid video... 
    return $content;
}
add_shortcode('video', 'wordpress_video');
function wordpress_video_description()
{
    echo '<div class="wrap">
					<h2>Wordpress Embed Video</h2>
					<h3>Description</h3>
					<p>Gives the opportunity to embed in post any video from:  Youtube.com, videos.sapo.pt, google, vimeo.com and more!!!!</p>
    					<br />
    					<h3>Accepted Attributes</h3>
    					id ( example: in www.youtube.com/watch?v=XXXXXXX the id is "XXXXXXX" )
    					<br/>type ( youtube | sapo | vimeo | google etc etc )
    					<br/>width (default 640)
    					<br/>height ( default 385 )
    					<br/>
    					<h3>Usage</h3>
    					<strong>Youtube</strong><br/>
        					[video type="youtube" id="XXXXXXXXXXXXX" width="400"]Default Message[/video]<br/>
        					<strong>Videos Sapo</strong><br/>
        					[video type="sapo" id="XXXXXXXXXXXXX" width="400"]<br/>
        					<strong>Vimeo</strong><br/>
        					[video type="vimeo" id="XXXXXXXXXXXXX" width="400" height="200"]
        					<br/>
        					<strong>Google</strong><br/>
        					[video type="google" id="XXXXXXXXXXXXX"]
        					<br/>
        					
    					<h3>Suported URL\'s</h3>
                        <br/>http://www.youtube.com (type: <strong>youtube</strong>) 
                        <br/>http://www.youtube.com (type: <strong>youtube-playlists</strong>) 
                        <br/>http://www.dailymotion.com (type: <strong>dailymotion</strong>) 
                        <br/>http://www.megavideo.com (type: <strong>megavideo</strong>) 
                        <br/>http://www.metacafe.com (type: <strong>metacafe</strong>) 
                        <br/>http://www.revver.com (type: <strong>revver</strong>) 
                        <br/>http://www.vimeo.com (type: <strong>vimeo</strong>) 
                        <br/>http://www.adultswim.com (type: <strong>adultswim</strong>) 
                        <br/>http://www.aniboom.com (type: <strong>aniboom</strong>) 
                        <br/>http://www.bebo.com (type: <strong>bebo</strong>) 
                        <br/>http://www.blastro.com (type: <strong>blastro</strong>) 
                        <br/>http://www.bofunk.com (type: <strong>bofunk</strong>) 
                        <br/>http://www.clipmoon.com (type: <strong>clipmoon</strong>) 
                        <br/>http://www.clipser.com (type: <strong>clipser</strong>) 
                        <br/>http://www.clipshack.com (type: <strong>clipshack</strong>) 
                        <br/>http://www.collegehumour.com (type: <strong>collegehumor</strong>) 
                        <br/>http://www.colbertnation.com (type: <strong>colbertnation</strong>) 
                        <br/>http://www.current.com (type: <strong>current</strong>) 
                        <br/>http://www.dailyhaha.com (type: <strong>dailyhaha</strong>) 
                        <br/>http://www.doubleviking.com (type: <strong>doubleviking</strong>) 
                        <br/>http://www.dropshots.com (type: <strong>dropshots.com</strong>) 
                        <br/>http://dv.ouou.com (type: <strong>dv.ouou</strong>) 
                        <br/>http://www.divshare.com (type: <strong>divshare</strong>) 
                        <br/>http://www.funmansion.com (type: <strong>funmansion</strong>) 
                        <br/>http://www.g4tv.com (type: <strong>g4tv</strong>) 
                        <br/>http://www.gamekyo.com (type: <strong>gamekyo</strong>) 
                        <br/>http://www.glumbert.com (type: <strong>glumbert</strong>) 
                        <br/>http://www.godtube.com (type: <strong>godtube</strong>) 
                        <br/>http://www.howcast.com (type: <strong>howcast</strong>) 
                        <br/>http://www.ign.com (type: <strong>ign</strong>) 
                        <br/>http://www.ijigg.com (type: <strong>ijigg</strong>) 
                        <br/>http://www.indyarocks.com (type: <strong>indyarocks</strong>) 
                        <br/>http://www.ireport.com (type: <strong>ireport</strong>) 
                        <br/>http://www.izlesene.com (type: <strong>izlesene</strong>) 
                        <br/>http://www.jamendo.com (type: <strong>jamendo</strong>) 
                        <br/>http://www.koreus.com (type: <strong>koreus</strong>) 
                        <br/>http://www.livevideo.com (type: <strong>livevideo</strong>) 
                        <br/>http://www.machinima.com (type: <strong>machinima-old</strong>) 
                        <br/>http://www.machinima.com (type: <strong>machinima-new</strong>) 
                        <br/>http://www.motionbox.com (type: <strong>motionbox</strong>) 
                        <br/>http://video.mpora.com (type: <strong>mpora</strong>) 
                        <br/>http://video.mthai.com (type: <strong>m-thai</strong>) 
                        <br/>http://www.nhaccuatui.com (type: <strong>nhaccuatui</strong>) 
                        <br/>http://www.onsmash.com (type: <strong>onsmash</strong>) 
                        <br/>http://www.photobucket.com (type: <strong>photobucket</strong>) 
                        <br/>http://www.putfile.com (type: <strong>putfile</strong>) 
                        <br/>http://www.screentoaster.com (type: <strong>screentoaster</strong>) 
                        <br/>http://www.snotr.com (type: <strong>snotr</strong>) 
                        <br/>http://www.southparkstudios.com (type: <strong>southpark-studios</strong>) 
                        <br/>http://www.spike.com (type: <strong>spike</strong>) 
                        <br/>http://www.stupidvideos.com (type: <strong>stupidvideos</strong>) 
                        <br/>http://www.tinypic.com (type: <strong>tinypic</strong>) 
                        <br/>http://www.todaysbigthing.com (type: <strong>todays-big-thing</strong>) 
                        <br/>http://www.tudou.com (type: <strong>tudou</strong>) 
                        <br/>http://videos.sapo.pt (type: <strong>videos.sapo</strong>) 
                        <br/>http://www.vidiac.com (type: <strong>vidiac</strong>) 
                        <br/>http://www.vsocial.com/vsandbox/ (type: <strong>vsocial-type1</strong>) 
                        <br/>http://www.wegame.com (type: <strong>wegame</strong>) 
                        <br/>http://www.youku.com (type: <strong>youku</strong>)
					<p>
						If you know of any video portal, please tell me! sonhador at 1sonhador dot com
					</p>
				</div>';
}

function wordpress_video_menu_hook()
{
    add_options_page('Wordpress Embed Video', 'Embed Video', 9, __FILE__, 'wordpress_video_description');
}
add_action('admin_menu', 'wordpress_video_menu_hook');

?>