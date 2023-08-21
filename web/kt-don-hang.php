<?php include'autoload/autoload.php';
    //lấy id của người dùng
    $ids = intval($_SESSION['name_id']);
    //hiển thị toàn bộ dữ liệu người dùng
    $showuser=$db->fetchID("users",$ids);
    
    //truy vấn bảng transaction thông qua id của người dùng
    $sql = "SELECT * FROM transaction WHERE users_id =$ids ORDER BY id DESC";
    //Truy xuất toàn bộ dữ liệu
   $total = count($db->fetchsql($sql));
   
    //phân trang
   if(isset($_GET['p']))
    {
        $p=$_GET['p'];
    }
    else{
        $p=1;
    }
    
    $show=$db->fetchJones('transaction',$sql,$total,$p,5,true);
    
    $sotrang = $show['page'];
    unset($show['page']);
   $path = $_SERVER['SCRIPT_NAME'];
    ?>
<?php include'header.php'?>
<div class="col-md-9">
    <section class="box-main1">
        <h3 class="title-main" ><a href=""> Quản lý đơn hàng</a> </h3>
    </section>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Thông tin liên hệ</th>
                    <th>Ghi chú</th>
                    <th>Tổng đơn hàng</th>
                    <th>Thuế 10%</th>
                    <th>Đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php //in danh sách 
                    foreach ($show as $row):
                        
                        ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $showuser['name'];?></td>
                    <td>
                        <ul>
                            <li>Họ tên: <?php echo $showuser['account'];?></li>
                            <li>Địa chỉ: <?php echo $showuser['address'];?></li>
                            <li>Số điện thoại: <?php echo $showuser['phone'];?></li>
                            <li>Email: <?php echo $showuser['email'];?></li>
                            <li>Thời gian: <?php echo $row['create_at'];?></li>
                        </ul>
                    </td>
                    <td><?php echo $row['note'];?></td>
                    <td style="color:red"><b><?php echo formatprice($row['amount']);?></b>
                    <p><?php echo $row['tructuyen']==1 ? 'Thanh toán trực tuyến':'' ?></p>
                    </td>
                    <td><?php echo formatprice(($row['amount']/110*100)/10) ?>
                    </td>
                    <td style="text-align: center">
                        <a  href="chitiet-kh.php?id=<?php echo $row['id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-refresh" style="color: #fff;"></i> Chi tiết</a>
                        <?php if($row['done']==1): ?>
                        <p class="alert alert-warning" style="margin-top: 5px">Hủy đơn hàng thành công..!</p>
                        <?php else: ?>
                        <a class="btn btn-xs <?php echo $row['huy']==0 && $row['status']==0  ? 'btn-danger': 'btn-primary disabled' ?>" href="giohang/huy.php?id=<?php echo $row['id'];?>"><i class="fa fa-remove" style="color: #fff;"></i> 
                        <?php echo $row['huy'] == 0 ? 'Hủy đơn':'Chờ xử lý'; ?></a>
                        <?php endif ?>
                        <?php if($row['status']==1):?>
                        <p class="alert alert-success" style="margin-top: 5px">
                            <?php echo "Đơn hàng đã được thanh toán..!!"; ?> 
                        </p>
                        <?php endif ?>
                    <?php if($row['status']==1): ?>
                        <a  href="hoadon.php?id=<?php echo $row['id'] ?>" ></i></a>
                    <?php endif ?>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <div class="pull-right">
            <nav class="text-center">
                <ul class="pagination">
                    <li class="page-item">
                        <!--phân trang-->
                        <a class="page-link" href="<?php echo $path ?>?id=<?php echo $ids ?>&&p=<?php echo $p-1==0?1:$p-1 ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php for ($i=1; $i <= $sotrang ; $i++):?>
                    <!--Phân trang-->
                    <li class="<?php $p==$i?active:'' ?>"><a href="<?php echo $path ?>?id=<?php echo $ids ?>&&p=<?php echo $i ?>"><?php echo $i;?></a></li>
                    <?php endfor ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $path ?>?id=<?php echo $ids ?>&&p=<?php echo $p+1<$i?$p+1:$p ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php include'footer.php'?>