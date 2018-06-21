<?php 



/*
*    Made by soulaimane takiddine <www.takiddine.com><takiddine.job@gmail.com>
*    Class To Iframe the url of youtube / viemo in Responsive 
*    version : 1.0
*    Usage Example  : video::iframe('https://www.youtube.com/watch?v=tVlk_5BHD50');
*    the result will echo Embed video html
*/ 

class video {


        /*
        *   Get the id from youtube link .
        */
        function getYoutubeIdFromUrl($url) {
            $parts = parse_url($url);
            if(isset($parts['query'])){
                parse_str($parts['query'], $qs);
                if(isset($qs['v'])){
                    return $qs['v'];
                }else if(isset($qs['vi'])){
                    return $qs['vi'];
                }
            }
            if(isset($parts['path'])){
                $path = explode('/', trim($parts['path'], '/'));
                return $path[count($path)-1];
            }
            return false;
        }
	
    
        /*
        *   check if the link is youtube or viemo
        */
        function videoType($url) {
            if (strpos($url, 'youtube') > 0) {
                return 'youtube';
            } elseif (strpos($url, 'vimeo') > 0) {
                return 'vimeo';
            } else {
                return 'unknown';
            }
        }	

        /*
        * iframe the url
        */
        static function iframe($url){  

                /*
                *   Responsive Embed the url in youtube
                */
                if(self::videoType($url) == 'youtube') {
                    $videoID = self::getYoutubeIdFromUrl($url);
                    echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src=" https://www.youtube.com/embed/'.$videoID .'" allowfullscreen></iframe></div>' ;
                }

                /*
                *   Responsive Embed the url in viemo
                */
                if(self::videoType($url) == 'vimeo') {
                    if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $output_array)) {
                    echo '<div class="embed-responsive embed-responsive-16by9"><iframe src="https://player.vimeo.com/video/'.$output_array[5].'"></iframe></div>';
                }}

        }
  

// End video class    
}


