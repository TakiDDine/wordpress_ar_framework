<?php

function mb_unserialize($string) {
    $string = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $string);
    return unserialize($string);
}

function mb_unserializesss($string) {
    $string = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $string);
    return unserialize($string);
}

function videos_gallery( $atts ) {
global $wpdb;
$videos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}video_gallery");
ob_start();
?> 
<?php foreach($videos as $video): $video = mb_unserializesss($video->video);   ?>
<div class="col-sm-6">
<div class="content-block video-block">
    <?php iframeVideo($video['link']) ?>
    <h2 class="title"><?php echo $video['title'] ?></h2>
    <p><?php echo $video['description'] ?></p>
</div>
</div>
<?php endforeach; ?>  
 <style>
.content-block.video-block {
    min-height: 500px;
}  
.content-block.video-block {
    padding: 8px;
}
.content-block.video-block p {
    height: 84px;
}
.page-title-block {
    background: white;
    padding: 17px;
    margin-bottom: 31px;
    overflow: hidden;
}
                    
.page-title-block {
    background: white;
    padding: 17px;
    margin-bottom: 31px;
    overflow: hidden;
}
.page-title-block h3 {
    color: #cc66a4;
    margin-bottom: 0;
}
</style>
	

<?php
return ob_get_clean();
}
add_shortcode( 'videos_gallery', 'videos_gallery' );

    /*
    *   اضافة فيديو جديد
    */
    $t_name = $wpdb->prefix.'video_gallery';
    if(isset($_POST['submit_new_video'])){
    $video = [];
    $video['title']          =    $_POST['title'][0];
    $video['link']           =    $_POST['link'][0];
    $video['description']    = $_POST['description'][0];
    $video = serialize($video);
    $update = $wpdb->insert( $t_name,array( 'video'  	=> $video));
    if( $update ) :
    echo "<br><div class='alert alert-success'>تم الإضافة بنجاح</div>";
    endif;
    }

    /*
    *   حذف الفيديو
    */
    if(isset($_POST['delete_video'])){
        $id = $_POST['video_id'];
        $delete =   $wpdb->delete( $t_name, array( 'id' => $id ) );
        if( $delete ) :
        echo "<br><div class='alert alert-success'>تم الحذف بنجاح</div>";
        endif;
    }

    /*
    *   تعديل الفيديو
    */
    if(isset($_POST['edit_video_submit'])) {
                
        $video = [];
        $video['title']          =    $_POST['title'][0];
        $video['link']           =    $_POST['link'][0];
        $video['description']    = $_POST['description'][0];
        $video = serialize($video);
        $id = $_POST['edit_id'];
        $update = $wpdb->update($t_name, array( 'video' => $video), array("id"=>$id));
        if( $update ) :
        echo "<br><div class='alert alert-success'>تم التعديل بنجاح</div>";
        endif;
    } 

    /*
    *   حذف جميع الفيديوهات
    */
    if(isset($_POST['delete_all_videos'])){
        $sql = "TRUNCATE TABLE $t_name";
        $c_uri =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        echo "<script>document.location = '".$c_uri."'</script>";
        $wpdb->query($sql);
    }