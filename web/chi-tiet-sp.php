<?php  
    include'autoload/autoload.php';
    
    //lấy id ép kiểu về số nguyên
    $ids = intval(getInput('id'));
    //lấy dữ liệu từ bảng category thông qua id được lấy từ $id
    $product = $db->fetchID("product",$ids);
    $idpro = intval($product['id']); 
    //Lấy id của danh mục
    $dmuc = intval($product['category_id']);
        //Chọn dữ liệu từ bảng product đk id = id của dmuc để lấy số sản phẩm có trong dmuc đó 
    $sql = "SELECT * FROM product WHERE category_id = $dmuc ORDER BY ID DESC";
    
    $category_id=$db->fetchsql($sql);
    
   
    include 'comment.php';
   // var_dump($ids);
    if(isset($ids))
    {
    $update = $db->update("product", array('view' => $product['view']+1 ),array('id' =>$ids ));
    }
    
    include'header.php';
    
    
//Số lượt xem trang
    
    
    
    
    
    
    
    ?>
<div class="col-md-9 ">
    <?php if (isset($_SESSION['success'])): ?>
    <!--Thông báo thành công từ đăng ký-->
    <div class="alert alert-success">
        <strong style="color: green"><?php echo $_SESSION['success'];
    unset($_SESSION['success']) ?></strong> 
    </div>
    <?php
endif ?>
    <?php if (isset($_SESSION['error'])): ?>
    <!--Thông báo thành công từ đăng ký-->
    <div class="alert alert-danger">
        <strong style="color: red"><?php echo $_SESSION['error'];
    unset($_SESSION['error']) ?></strong> 
    </div>
    <?php
endif ?>
    <section class="box-main1" >
        <div class="col-md-6 text-center">
            <img src="<?php echo uploads() ?>/product/<?php echo $product['thumbal'] ?>" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
            <ul class="text-center bor clearfix" id="imgdetail">
                <!--<li>
                    <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>-->
            </ul>
        </div>
        <div class="col-md-6 " style="margin-top: 20px;padding: 30px;">
            <ul id="right">
                <li>
                    <h3> <?php echo $product['name'] ?> </h3>

                    <hr>
                </li>
                <li>
                        <p>
                            <b>Tình trạng:</b> <span class="label <?php echo $product['number'] >0? "label-primary":"label-warning"?>"><?php echo $product['number']>0?"Còn hàng":"Hết hàng" ?></span><hr>
                        </p>
                </li>
                <li><b><img style="margin-bottom: 5px;" src="public/frontend/images/free-delivery.png"> Vận chuyển: Miễn phí vận chuyển </b> <small>(Với đơn hàng trên 500K)</small><hr> </li>
                <?php if($product['sale']>0): ?>
                    
                <li>
                    <p><b>Giảm giá:</b> <?php echo $product['sale'] ?>%</p>

                </li>
                <li>
                    <p><strike class="sale" style="font-size: 16px"><?php echo formatprice($product['price']) ?></strike> <b class="price"style="font-size: 24px"><?php echo saleprice($product['price'],$product['sale']) ?></b></p>
                </li>
                <?php else: ?>
                <li><b class="price"><?php echo saleprice($product['price'],$product['sale']) ?></b>
                </li>

                <?php endif ?>
                <?php// printf($item['id']);?>
                <div style="margin-bottom: 5px; margin-left: 10px">                
                    <small class="label label-danger"><b style="color: #fff">Lượt xem:</b> <?php echo $product['view']; ?></small>
                    <li><a href="giohang/addcart.php?id=<?php echo $ids?>" class="btn btn-default"> Thêm vào giỏ hàng</a></li>
                </div>
                
            </ul>
        </div>
    </section>
    <div class="col-md-12" id="tabdetail">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Nội dung</h3>
                    <p><?php echo $product['content'] ?></p>
                </div>
      
            </div>
        </div>
    </div>
</div>
<div class="col-md-9">

<!--Sản phẩm tương tự-->
    <div class="showitem clearfix">
        <h3>Sản phẩm tương tự</h3><hr>
        <?php foreach($category_id as $item): ?>
        <div class="col-md-3 item-product">
            <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
            <img src="<?php echo uploads()?>/product/<?php echo $item['thumbal'] ?>" class="" width="100%" height="180">
            </a>
            <div class="info-item">
                <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"></a>
                <?php if($item['sale']>0): ?>
                <p><strike class="sale"><?php echo formatprice($item['price']); ?>đ</strike> 
                    <b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b>
                </p>
                <?php else : ?>
                <p><b class="price"><?php echo saleprice($item['price'],$item['sale']); ?></b></p>
                <?php endif ?>
            </div>
            <div class="hidenitem">
                <!--<p><a href=""><i class="fa fa-search"></i></a></p>
                <p><a href=""><i class="fa fa-heart"></i></a></p>
                <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>-->
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="showitem clearfix">
        <h3 style="text-align: center;">Thông tin chi tiết sản phẩm</h3><hr>
        <div class="panel-group">
            <div class="panel" style="text-align: center;">
              <div class="panel-heading">
                <h4 class="panel-title">
                   <br> <?php echo($product['chitietsp']) ?>
               </br>
                  <a data-toggle="collapse" href="#collapse1 " >Xem Thêm</a>

                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body"></div>
                
              </div>
            </div>
  </div>
    </div>

    <?php if(isset($_SESSION['name_id'])): ?>
<div>
<h4>Viết bình luận...<span class="glyphicon glyphicon-pencil "></span></h4>
<form role="form" method="post" action="">
<div class="form-group">
<textarea class="form-control" rows="3" name='content'></textarea><?php if(isset($error['content'])):?>
                <p class="text-danger"><?php echo $error['content'];?></p>
                <?php endif ?>
</div>
<button type="submit" class="btn btn-primary" name="ok" style="float: right">Gửi</button>    
</form><br>


<?php endif ?>


<!-- Hiển thị comment -->
<div class="container col-md-12">
  <div class="post-comments">
    <div class="row">

      <div class="media">
        <!-- first comment -->
        <h3>Bình luận</h3>
        <?php 
        //reload trang 
        $a = "SELECT * FROM comment WHERE product_id = $idpro or admin_id = $idpro  ORDER BY ID DESC";
         $com = $db->fetchsql($a); 
         //phân trang
         if(isset($_GET['p']))
        {
            $p=$_GET['p'];
        }
        else{
            $p=1;
        }
    
        //Truy vấn lấy tên danh mục
       $com = $db->fetchsql($a);
        $totalcom = count($db->fetchsql($a));
        $com = $db->fetchJones('comment',$a,$totalcom,$p,5,true);
            $sotrang=$com['page'];
            unset($com['page']);
            $path = $_SERVER['SCRIPT_NAME'];
         ?>
        <?php foreach($com as $item): ?>
            <?php 
                //ép kiểu id của người dùng
                $iduser = intval($item['users_id']);
                //chọn dữ liệu của người dùng thông qua id users
                $b = "SELECT * FROM users WHERE id = $iduser ";
                //chọn tất cả dữ liệu của users thông qua idusers
                $user = $db->fetchsql($b);

               
             ?>
        <?php foreach ($user as $value):?>
                <div class="media-heading" style="margin-top: 10px">
                  <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info"><?php echo $value['name'] ?></span> <sup><span class="label label-danger"><?php echo $value['level']==1?"CTV":"" ?></span></sup>
          
                  
                </div>
           
        <div class="panel-collapse collapse in" id="collapseOne">

          <!-- media-left -->


          <div class="media-body well" style="background: #ececec05">
            <div class="media">
              
              <div class="media-body">
                
                <h5 class="media-heading" style="margin-top: 5px">
                    <b class="label label-success" style="font-size: 14px"><?php echo $value['account'] ?></b>
                    <small>  <?php echo $item['create_at'] ?></small>
                </h5>  <hr> 
                <p class="well" style="background: #ececec05"><?php echo $item['content'] ?></p>
              </div>
            </div>
            
            <div class="comment-meta" >
                <div style="float: right">
                  <!--<button class="btn btn-primary btn-xs" style="color: #fff">Báo cáo</button>
                  <button class="btn btn-primary btn-xs" style="color: #fff">Ẩn</button>
                  <span class="btn btn-primary btn-xs"role="button" data-toggle="collapse" href="#replyCommentT" aria-expanded="false" aria-controls="collapseExample" style="color: #fff">Trả lời</span>-->
                </div>  
                   
              <div class="collapse" id="replyCommentT">
                <form>
                  <div class="form-group">
                    <label style="margin-top: 20px" for="comment">Bình luận của bạn</label>
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Send</button>
                </form>
              </div>
                <?php endforeach ?> 
            </div>
          </div>
        </div>
        <!-- comments -->
         
                <?php endforeach ?>
      </div>
      <!-- first comment -->
      <!-- first comment -->
    </div>
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
  <!-- post-comments -->
</div>
</div>
    
</div>

<?php include'footer.php'; ?>