<?php 
   include'autoload/autoload.php';
    $id = intval(getInput('id'));

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
                'total' => $_SESSION['total'],
                'users_id' => $_SESSION['name_id'],
                'note' => postInput('note'),
                'tructuyen' => 1
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
            
    
            $_SESSION['success'] = "Lưu đơn hàng thành công ..!";
           header('location: thong-bao.php');
         
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
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
        <h3 class="title-main" ><a href=""> Thông tin thanh toán</a> </h3>
    </section>
    <form class="form-horizontal" action="https://www.nganluong.vn/button_payment.php" method="POST">
        <?php foreach ($_SESSION['cart'] as $key =>$value): ?>
            <input type= hidden name="receiver" value = "tranquochaua2@gmail.com" />
            <input type="hidden" name="product_name" value="<?php echo $value['name']?>">
            <input type= hidden name="price" value = " <?php echo $_SESSION['total'] ?> "/>
            <input type= hidden name="return_url" value = "kt-don-hang.php"/>
            <input type= hidden name="comments" value = "<?php echo $value['qty'] ?>" />
        <?php endforeach ?>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="account">Tên khách hàng:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="account" placeholder="Tên khách hàng" name="account" value="<?php echo $user['account'] ?>">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="address">Số tiền:</label>
            <div class="col-sm-10">
                <input type="note" readonly="" class="form-control" id="address" placeholder="Ghi chú đơn hàng" name="total "value="<?php echo formatprice($data['total']) ?>">
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
