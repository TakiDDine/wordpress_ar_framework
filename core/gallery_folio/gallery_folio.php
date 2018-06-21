
<?php

global $wpdb;
$images = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}images_gallery");
$t_name = $wpdb->prefix.'images_gallery';

    /*
    *   اضافة صورة جديد
    */
    if(isset($_POST['submit_new_image'])){
        $image = [];
        $image['title']          =    $_POST['title'][0];
        $image['logo']           =    $_POST['logo'][0];
        $image['description']    = $_POST['description'][0];
        $image = serialize($image);
        $update = $wpdb->insert( $t_name,array( 'image' => $image));
        if( $update ) :
        echo "<br><div class='alert alert-success'>تم الإضافة بنجاح</div>";
        endif;
    }

    /*
    *   تعديل الصورة
    */
    if(isset($_POST['edit_image_submit'])) {
       
        $id = $_POST['edit_id'];       
        
        $image = [];
        $image['title']          =    $_POST['title'][0];
        $image['logo']           =    $_POST['logo'][0];
        $image['description']    = $_POST['description'][0];
        $image['newlogo']    = $_POST['logoupdated'][0];
        
        if($image['newlogo'] != $image['logo']) {
            $image['logo'] = $image['newlogo'];
        }

        $image = serialize($image);
        
        $update = $wpdb->update($t_name, array( 'image' => $image), array("id"=>$id));
        if( $update ) :
        echo "<br><div class='alert alert-success'>تم التعديل بنجاح</div>";
        endif;
    } 

    /*
    *   حذف الفيديو
    */
    if(isset($_POST['delete_image'])){
        $id = $_POST['video_id'];
        $delete =   $wpdb->delete( $t_name, array( 'id' => $id ) );
        if( $delete ) :
        echo "<br><div class='alert alert-success'>تم الحذف بنجاح</div>";
        endif;
    }

	if(isset($_POST['delete_all_images'])){
	$sql = "TRUNCATE TABLE $t_name";
    $c_uri =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		echo "<script>document.location = '".$c_uri."'</script>";
    
		$wpdb->query($sql);
		}
?>




<div class="col-lg-12 col-md-10 col-sm-10 content-wrapper" >


<?php if(isset($_GET['edit_image'])): ?>    
<?php
    $id = $_GET['edit_image'];
    $image = $wpdb->get_row("SELECT * FROM $t_name WHERE (id=$id)");
    $image = unserialize($image->image);
?>
  <div class="container">    
           <div class="col-md-6">
            </div>
            <div class="col-md-6">
              <form action="" method='post'>
                   <h3>تعديل الفيديو</h3>
                   <br>
                    <div class="form-group">
                       <label for="">عنوان الصورة</label>
                        <input style="width: 100%" type="text" class="form-control" value="<?php echo $image['title'] ; ?>" placeholder="عنوان الصورة" id="server" name="title[]">
                    </div>
                    <div class="form-group">
                       <label for="">رابط الصورة</label>
                        <input style="width: 100%" type="text" class="form-control" value="<?php echo $image['logo'] ; ?>" placeholder="رابط الصورة" id="link" name="logo[]">
                    </div> 
                       <div class="form-group smartcat-uploader col-md-12 ">
                       <label for="">اختيار صورة جديدة</label><br>
                       <a href="#" class="smartcat-upload">رفع الصورة</a>
                        <input type="hidden" name="logoupdated[]">
                    </div>           
                    <div class="form-group">
                       <label for="">وصف الصورة</label>
                        <textarea name="description[]" class="form-control" cols="30" rows="10"><?php echo $image['description'] ; ?></textarea>
                    </div>   
                    <div class="form-group">
                    <input type="submit" value="تعديل الصورة"  name='edit_image_submit' class='btn btn-success'/>
                    <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                    </div>
                </form>    
            </div>
        </div>
<?php endif; ?>
 
       
          
                         
<?php if(isset($_GET['add-image'])): ?>
<div class="col-md-12">
  <form action="" method='post'>
       <h3>اضافة صورة جديد</h3>
       <br>
       
       <div class="form-group col-md-6 smartcat-uploader">
           <br>
           <a href="#" class="smartcat-upload" >اختيار الصورة</a>
            <input type="hidden" name="logo[]">
        </div>
          
        <div class="form-group col-md-6">
           <label for="">عنوان الصورة</label>
            <input style="width: 100%" type="text" class="form-control" placeholder="عنوان الصورة" id="server" name="title[]">
        </div>
             
        <div class="form-group col-md-12">
           <label for="">وصف الصورة</label>
            <textarea name="description[]" class="form-control" cols="30" rows="4"></textarea>
        </div>  
       
        <div class="form-group col-md-12">
            <input type="submit" value="اضافة الصورة"  name='submit_new_image' class='btn btn-success'/>
        </div>
    </form>    
</div>
<?php endif; ?>

<?php if(!isset($_GET['edit_image']) and !isset($_GET['add-image'])): ?>
<div class="col-md-12">
    <br>
        <div class="panel panel-default table-content">
        <div class="panel-heading"><h3>الصور</h3>
           <a  class="add_new_video" href="<?php echo get_admin_url()."?page=images_gallery&add-image=active"; ?>">اضف صورة جديدة</a>
           
              <a  class="add_new_video delete_all" data-toggle="modal" data-target="#myModal">حذف جميع الصور</a>
           
<!-- Modal -->
<div class="modal fade text-black" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">حذف جميع الصور</h4>
      </div>
      <div class="modal-body">
      <br>
                    <br>
      <center>
       <a href="" data-dismiss="modal" aria-label="Close" class="btn btn-success">لا ، تراجع</a>
       
        <form action='' method="post" class='hdidp'>
                    <input type="submit" name="delete_all_images" class="btn btn-danger" value="أوافق ، احذف جميع الصور">
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
                <th class='text-right col-md-2'>الوصف</th>
                <th class='text-right col-md-4'>الصورة</th>
                <th class='text-center col-md-4'>تعديل</th>
            </tr>
            </thead>
            <?php foreach($images as $image): $id= $image->id ; $image = unserialize($image->image);   ?>
            <tr>
            <td class='text-right col-md-2'><?php echo $image['title'] ?></td>
            <td class='text-right col-md-2'><?php echo wp_trim_words( $image['description'], 6, '...' ); ?></td>
            <td class='text-right col-md-4'><?php echo $image['logo'] ?></td>
            <td class='text-left col-md-4'>
                <form action='' method="post" class='hdidp'>
                    <input type="hidden" name="video_id" value="<?php echo $id; ?>">
                    <input type="submit" name="delete_image" class="btn btn-danger" value="حذف الصورة">
                </form>
                <form action='<?php echo get_admin_url()."?page=images_gallery&edit_image=$id"; ?>' method="post" class='hdidp'>
                    <input type="hidden" name="image_id" value="<?php echo $id; ?>">
                    <input type="submit" name="edit_image" class="btn btn-info" value="تعديل الصورة">
                </form>
            </td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php endif; ?>
</div>

