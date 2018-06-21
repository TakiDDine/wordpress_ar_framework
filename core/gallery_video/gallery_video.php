<?php

    global $wpdb;
    $videos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}video_gallery");
?>



<div class="col-lg-12 col-md-10 col-sm-10 content-wrapper">
<?php if(isset($_GET['edit_video'])): ?>
    <?php
    $id = $_GET['edit_video'];
    $video = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}video_gallery WHERE (id=$id)");
    $video = unserialize($video->video);
?>
      <div class="container">    
           <div class="col-md-6">
            </div>
            <div class="col-md-6">
              <form action="" method='post'>
                   <h3>تعديل الفيديو</h3>
                   <br>
                    <div class="form-group">
                       <label for="">عنوان الفيديو</label>
                        <input style="width: 100%" type="text" class="form-control" value="<?php echo $video['title'] ; ?>" placeholder="عنوان الفيديو" id="server" name="title[]">
                    </div>
                    <div class="form-group">
                       <label for="">رابط الفديو</label>
                        <input style="width: 100%" type="text" class="form-control" value="<?php echo $video['link'] ; ?>" placeholder="رابط الفيديو" id="link" name="link[]">
                    </div>        
                    <div class="form-group">
                       <label for="">وصف الفديو</label>
                        <textarea name="description[]" class="form-control" cols="30" rows="10"><?php echo $video['description'] ; ?></textarea>
                    </div>   
                    <div class="form-group">
                    <input type="submit" value="تعديل الفيديو"  name='edit_video_submit' class='btn btn-success'/>
                    <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                    </div>
                </form>    
            </div>
        </div>
<?php endif; ?>
       
       
<?php if(isset($_GET['add-video'])): ?>
        <div class="col-md-12">
          <form action="" method='post'>
               <h3>اضافة فيديو جديد</h3>
               <br>
                <div class="form-group">
                   <label for="">عنوان الفيديو</label>
                    <input style="width: 100%" type="text" class="form-control" placeholder="عنوان الفيديو" id="server" name="title[]">
                </div>
                <div class="form-group">
                   <label for="">رابط الفديو</label>
                    <input style="width: 100%" type="text" class="form-control" placeholder="رابط الفيديو" id="link" name="link[]">
                </div>        
                <div class="form-group">
                   <label for="">وصف الفديو</label>
                    <textarea name="description[]" class="form-control" cols="30" rows="10"></textarea>
                </div>   
                <div class="form-group">
                <input type="submit" value="اضافة الفيديو"  name='submit_new_video' class='btn btn-success'/>
                </div>
            </form>    
        </div>
<?php endif; ?>

<?php  if(!isset($_GET['edit_video']) and !isset($_GET['add-video'])): ?>
<div class="col-md-12">
    <br>
        <div class="alert alert-info">
        <b>تنبيه :</b>
         المواقع التي تعمل روابطها للفيديوهات هي youtube و viemo
        </div>
        <div class="panel panel-default table-content">
        <div class="panel-heading"><h3>الفيديوهات</h3>
           <a  class="add_new_video" href="<?php echo get_admin_url()."?page=all_videos&add-video=active"; ?>">اضف فيديو جديد</a>
           <a  class="add_new_video delete_all" data-toggle="modal" data-target="#myModal">حذف جميع الفيديوهات</a>
                <!-- Modal -->
                <div class="modal fade text-black" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">حذف جميع الفيديوهات</h4>
                            </div>
                            <div class="modal-body">
                                <br>
                                <br>
                                <center>
                                    <a href="" data-dismiss="modal" aria-label="Close" class="btn btn-success">لا ، تراجع</a>
                                    <form action='' method="post" class='hdidp'>
                                        <input type="submit" name="delete_all_videos" class="btn btn-danger" value="أوافق ، احذف جميع الفيديوهات">
                                    </form>
                                </center>
                                <br>
                                <br>
                                <p class="text-center">عندما يتم الحذف لا يمكن التراجع عن هذه العملية</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table ">
                    <thead>
                    <tr>
                        <th class='text-right col-md-2'> العنوان</th>
                        <th class='text-right col-md-3'>الوصف</th>
                        <th class='text-right col-md-3'>الرابط</th>
                        <th class='text-center col-md-4'>تعديل</th>
                    </tr>
                    </thead> 
                    <?php foreach($videos as $video): $id= $video->id ;  $video = mb_unserialize($video->video); ?>
                    <tr>
                    <td class='text-right col-md-2'><?php echo $video['title'] ?></td>
                    <td class='text-right col-md-2'><?php echo wp_trim_words( $video['description'], 6, '...' ); ?></td>
                    <td class='text-right col-md-4'><?php echo $video['link'] ?></td>
                    <td class='text-left col-md-4'>
                        <form action='' method="post" class='hdidp'>
                            <input type="hidden" name="video_id" value="<?php echo $id; ?>">
                            <input type="submit" name="delete_video" class="btn btn-danger" value="حذف الفيديو">
                        </form>
                        <form action='<?php echo get_admin_url()."?page=all_videos&edit_video=$id"; ?>' method="post" class='hdidp'>
                            <input type="hidden" name="video_id" value="<?php echo $id; ?>">
                            <input type="submit" name="edit_video" class="btn btn-info" value="تعديل الفيديو">
                        </form>
                    </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php endif; ?>
</div>






