    <?php 
    include'autoload/autoload.php';
    include'header.php';
    $sum=0;
    
    
    
    ?>
   


<div class="col-md-9 ">
    <section class="box-main1">
        <h3 class="title-main" ><a href=""> Giỏ hàng</a> </h3>
    </section>
    <?php if(isset($_SESSION['success'])): ?>
    <!--Thông báo thành công từ đăng ký-->
    <div class="alert alert-success">
        <strong style="color: green"><?php echo $_SESSION['success'];unset($_SESSION['success']) ?></strong> 
    </div>
    <?php endif ?>
    <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <strong style="color: red"><?php echo $_SESSION['error'];unset($_SESSION['error']) ?></strong> 
    </div>
    <?php endif ?>
    <div class="table-responsive img_cart" id ="listacart">
    <table class="table table-hover" id="cartx">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=1;
                ?>
            <?php if(isset($_SESSION['cart'])== NULL || count($_SESSION['cart']) ==0): ?>
            <td><?php echo "Giỏ hàng chưa có sản phẩm" ?></td>
            <?php $_SESSION['tongtien'] = $sum; ?>
            <?php else:  ?>
            	
            <?php foreach ($_SESSION['cart'] as $key =>$value): ?>
            	
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><img src="<?php echo uploads()?>/product/<?php echo $value['thumbal'] ?>" class="" width="50px" height="50px" ></td>
                <!--Số lượng sp-->
<td>
    		<form action="update.php" method="post">
                
                	<input type="hidden" name="action" value="update">
                	<input type="hidden" name="id" value="<?php echo $key?>">
                	<input type="text" name="qty" class="form-control" value="<?php echo $value['qty']?>" style="padding: 0; padding-left: 7px; width: 40px; height: 30px;">

                     <button type="submit" class="btn btn-xs btn-info updatecart"><i class="fa fa-refresh" style="color: #fff;"></i>cập nhật</button>
                </td>
                </form>
                <td><?php echo formatprice($value['price'])?></td>
                <td><?php echo $total = formatprice($value['price']*$value['qty'])?></td>
                <td>
                    <!--Muốn xóa giỏ hàng phải xóa key của mảng-->
                    <a href="giohang/delete.php?key=<?php echo $key?>"class="btn btn-xs btn-danger"><i class="fa fa-remove" style="color: #fff;"></i> Xóa</a>
                  <!--<button type="submit" class="btn btn-xs btn-info updatecart"><i class="fa fa-refresh" style="color: #fff;"></i>cập nhật</button>-->

                </td>

            </tr>

            <?php $stt++?>
            <?php
                //Tổng số tiền
                 $sum+= $value['price'] * $value['qty']; 
                 $_SESSION['tongtien'] = $sum; ?>
                 
            <?php endforeach ?>
            <?php endif ?>
        </tbody>

    </table>
    
    
</div >


</div>
<div class="col-md-5 pull-right">
    <ul class="list-group">
        <li class="list-group-item">
            <h3>Thông tin đơn hàng</h3>
        </li>
        <li class="list-group-item">
            Số tiền: 
            <span class="badge"><?php echo formatprice($_SESSION['tongtien']) ?></span>
        </li>
        <li class="list-group-item">
            Thuế: 
            <span class="badge">10%</span>
        </li>
        <li class="list-group-item">
            Tổng tiền: 
            <span class="badge"><?php
            $_SESSION['total'] = $_SESSION['tongtien'] *110/100;
            $tong = $_SESSION['total']; 
             echo formatprice($tong); ?></span>
        </li>
        <li class="list-group-item">
            <a href="index.php"class="btn btn-success">Tiếp tục mua hàng</a>
            <a href="thanh-toan.php"class="btn btn-success">Thanh toán</a>
            <a href="nganluong.php"class="btn btn-success">Thanh toán trực tuyến</a>
            <!--<a href="nganluong/"class="btn btn-success">Thanh toán trực tuyến 2</a>-->
        </li>
    </ul>
</div>
<?php include'footer.php'; ?>