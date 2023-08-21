<?php include_once'../autoload/autoload.php'; 
    $id1 = intval(getInput('id'));
    $idtran = $db->fetchID("transaction",$id1);
        $id = intval($idtran['users_id']);
    
       $edituser = $db->fetchID("users",$id);
       if(empty($edituser))//nếu edit trống thực thi lệnh
       {
           $_SESSION['error']="Dữ liệu không tồn tại";
                   redirectTrans("transaction");//redirecAdmin chuyển về các trang
       }
       
       
       
       if($_SERVER["REQUEST_METHOD"]=="POST")
       {
           $data=[
               
               "email" => postInput("email"),
               "phone" => postInput("phone"),
               "address" => postInput("address"),
               "account" => postInput("account")
       ];
          $error = [];//khởi tạo mảng lỗi
           
           
           if(postInput('phone')=='')
           {
               $error['phone']="Mời bạn nhập số điện thoại";
           }
           if(postInput('account')=='')
           {
               $error['account']="Bạn chưa nhập họ tên";
           }
           if(postInput('email')=='')
           {
               $error['email']= "Bạn chưa nhập địa chỉ Email";
           }
           else{
               if(postInput('email')!=$edituser['email'])
               {
                   $is_check=$db->fetchOne("users","email ='".$data['email']."' ");
               if($is_check != NULL)
               {
                   $error['email']= "Email đã tồn tại";
                   
               }   
               }
           }
           if(postInput('address')=='')
           {
               $error['address']= "Bạn chưa nhập địa chỉ";
           }
           
           //nếu lỗi trống thực thi lệnh
           if(empty($error))
           {   //câu lênh cho upload file            
       
           //kiểm tra trùng tên
               
               //insert dữ liệu
               $id_update = $db->update("users",$data,array('id' =>$id ));
           if($id_update>0)
           {
               move_uploaded_file($file_tmp,$part.$file_name);
                   $_SESSION['success']="Cập nhật thành công";
                   redirectTrans("transaction");//redirecAdmin chuyển về các trang
           }
           else
           {
               $_SESSION['error']="Dữ liệu không thay đổi";
                   redirectTrans("transaction");
           }
            
           }
            
           }
    
    ?>
<?php include_once'../../layouts/header.php'?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Chỉnh sửa người dùng
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Danh sách tài khoản</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Chỉnh sửa tài khoản
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php include_once'../../partials/notification.php'; ?>
    </div>
</div>
<div class="col-md-9 bor" style="border-radius: 5px;">
    <form class="form-horizontal" action="" method="POST">
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="name">Họ tên:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="account" placeholder="Nhập tên đăng nhập" name="account" value="<?php echo $edituser['account'] ?>">
                <?php if(isset($error['account'])): ?>
                <p class="text-danger"><?php echo $error['account'];?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email"value="<?php echo $edituser['email'] ?>">
                <?php if(isset($error['email'])): ?>
                <p class="text-danger"><?php echo $error['email'];?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone" value="<?php echo $edituser['phone'] ?>">
                <?php if(isset($error['phone'])): ?>
                <p class="text-danger"><?php echo $error['phone'];?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="address">Địa chỉ:</label>
            <div class="col-sm-10">
                <input type="address" class="form-control" id="address" placeholder="Nhận địa chỉ" name="address"value="<?php echo $edituser['address'] ?>">
                <?php if(isset($error['address'])): ?>
                <p class="text-danger"><?php echo $error['address'];?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group" style="margin-top: 30px; margin-bottom: 20px;">
            <div class="col-sm-offset-10 col-sm-3">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
</div>
<?php include_once'../../layouts/footer.php'?>