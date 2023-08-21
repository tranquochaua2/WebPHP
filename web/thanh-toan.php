<?php 
    include'autoload/autoload.php';
    include('PHPMailer-5.2.26/class.smtp.php');//gọi thư viện gửi mail
    include "PHPMailer-5.2.26/class.phpmailer.php";//gọi thư viện gửi mail
    
    if(!isset($_SESSION['name_id'])){
        $_SESSION['success'] = "Bạn phải đăng nhập mới được thanh toán";
        header('location: dang-nhap.php');
        //echo "<script>alert('Đăng nhập thành viên để được thanh toán'); location=' index.php'</script> ";
    }
    else{
        $user = $db->fetchID("users",intval($_SESSION['name_id']));
    
    //kiểm tra giỏ hàng có tồn tại sản phẩm không
    if(isset($_SESSION['cart'])!= NULL && count($_SESSION['cart']) !=0){
    $data = [
                'amount' => $_SESSION['total'],
                'users_id' => $_SESSION['name_id'],
                'note' => postInput('note')
        ];
        if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        //insert dữ liệu số sản phẩm
        $id_tran=$db->insert("transaction", $data);
        if($id_tran>0)
            {
            //lấy dữ liệu của giỏ hàng 
            foreach ($_SESSION['cart'] as $key => $value) {
                $data2=[
                    'transaction_id' =>$id_tran,
                    'product_id' => $key,
                    'qty' => $value['qty'],
                    'price' => $value['price']
                ];
    
                $id_insert2 = $db->insert("orders", $data2);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            //Gửi mail đơn hàng thành công 
            $_SESSION['success'] = "Đơn hàng đã được đặt thành công ..!";
            $title = 'Xác nhận đơn đặt hàng';
            $content = 'Xin chào khách hàng '.$user['account'].'. Đơn đặt hàng sản phẩm thành công..!! Mọi chi tiết phản hồi xin liên hệ chúng tôi qua đường dây nóng 0374216629 hoặc email tranquochaua2@gmail.com';
            $nTo = $user['account'];
            $mTo =  $user['email'];
            $diachicc =  $user['email'];
            //sendMail từ lớp function
            $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
            if($mail==1)
            header('location: thong-bao.php');
            else{
             
             echo $content;
             header('location:gio-hang.php'); 
            }
        }
    }
    }
    else
    {
     $_SESSION['error'] = "Bạn chưa có sản phẩm nên không thể thanh toán";
    header('location:gio-hang.php');
    
    }
    }
    //Lấy thông tin của $_SESSion['name_id'] vì có lưu thông tin thành viên
    
    
    
    include'header.php';
    
    ?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main" ><a href=""> Thanh toán</a> </h3>
    </section>
    <form class="form-horizontal" action="" method="POST">
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="account">Tên khách hàng:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="account" placeholder="Tên khách hàng" name="account" value="<?php echo $user['account'] ?>">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="address">Số tiền:</label>
            <div class="col-sm-10">
                <input type="note" readonly="" class="form-control" id="address" placeholder="Ghi chú đơn hàng" name="amount "value="<?php echo formatprice($data['amount']) ?>">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" readonly="" class="form-control" id="email" placeholder="Nhập email" name="email"value="<?php echo $user['email'] ?>">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
            <div class="col-sm-10">
                <input readonly="" type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone" value="<?php echo $user['phone'] ?>">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="address">Địa chỉ:</label>
            <div class="col-sm-10">
                <input type="address" class="form-control" id="address" placeholder="Nhận địa chỉ" name="address"value="<?php echo $user['address'] ?>">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="address">Ghi chú:</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="comment" placeholder="Ghi chú đơn hàng" name="note"></textarea>
            </div>
        </div>
        <div class="form-group" style="margin-top: 30px; margin-bottom: 20px;">
            <div class="col-sm-offset-10 col-sm-3">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </div>
        
    </form>
</div>
<?php include'footer.php'; ?>