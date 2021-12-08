<?php
include('header.php');
$user = $_SESSION['user'];
if (isset($_POST['update']) and !empty($_POST['update'])) {
   $ret_val = $obj->updateUser();
   if ($ret_val == 1) {
      echo '<script type="text/javascript">';
      echo 'alert("Record Updated Successfully");';
      echo 'window.location.href = "index.php";';
      echo '</script>';
   }
}


?>
<div class="container">

   <a href="index.php" class="btn btn-primary pull-right mt-4"><span class="glyphicon glyphicon-step-backward"></span>Back</a>
   <br>
   <div class="container">

      <form class="form-group" method="post">
         <div class="panel-body">
            <div class="form-group">
               <label class="control-label col-sm-2">Id:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" value="<?= $user->id ?>" type="text" name="id" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Nama Tempat Ibadah:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" value="<?= $user->nama ?>" name="nama" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Jenis:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" value="<?= $user->jenis ?>" type="text" name="jenis" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Latitude:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" name="lat" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Longitude:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" name="lng" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2"> </label>
               <div class="col-sm-5">
                  <input type="submit" class="btn btn-success" name="update" value="Update">
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<?php include('footer.php'); ?>