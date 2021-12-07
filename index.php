<?php
include('header.php');
$users = $obj->getUsers();

if (isset($_POST['update'])) {

  $user = $obj->getUserById();
  $_SESSION['user'] = pg_fetch_object($user);
  header('location:edit.php');
}



if (isset($_POST['delete'])) {

  $ret_val = $obj->deleteuser();
  if ($ret_val == 1) {

    echo "<script language='javascript'>";
    echo "alert('Record Deleted Successfully'){
          window.location.reload();
      }";
    echo "</script>";
  }
}
?>

<div class="container-fluid bg-3 mt-4 ml-auto" style="text-align: center;">
  <h3>Tempat Ibadah</h3>

</div>
<div class=" container">
  <div class="container-fluid">
    <div class="float-right">
      <a href="insert.php" class="btn btn-primary pull-right mt-2"> Add Record</a>
    </div><br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr class="active">

          <th>ID</th>
          <th>Nama Tempat Ibadah</th>
          <th>Jenis Tempat Ibadah</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($user = pg_fetch_object($users)) : ?>
          <tr align="left">
            <td><?= $user->id ?></td>
            <td><?= $user->nama ?></td>
            <td><?= $user->jenis ?></td>

            <td>
              <form method="post">
                <input type="submit" class="btn btn-success" name="update" value="Update">
                <input type="submit" onClick="return confirm('Please confirm deletion');" class="btn btn-danger" name="delete" value="Delete">
                <input type="hidden" value="<?= $user->id ?>" name="id">
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>
</div>
<?php include('footer.php'); ?>