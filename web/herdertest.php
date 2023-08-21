<?php 
include_once'autoload/autoload.php';
$data=[
            "name" => postInput("name"),
            "email" => postInput("email"),
            "phone" => postInput("phone"),
            "address" => postInput("address"),
            "password" => MD5(postInput("password"))
];

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(postInput('name')=='')
        {
            $error['name']="Mời bạn nhập tên";
        }
        if(postInput('phone')=='')
        {
            $error['phone']="Mời bạn nhập số điện thoại";
        }
        if(postInput('email')=='')
        {
            $error['email']= "Bạn chưa nhập địa chỉ Email";
        }
        else{
            $is_check=$db->fetchOne("users","email ='".$data['email']."' ");
            if($is_check != NULL)
            {
                $error['email']= "Email đã tồn tại";
            }
        }
        if(postInput('address')=='')
        {
            $error['address']= "Bạn chưa nhập địa chỉ";
        }
         if(postInput('password')=='')
        {
             $error['password']= "Bạn chưa nhập mật khẩu";
        }
        if($data['password'] != MD5(postInput("re_password")))
        {
            $error['password']= "Mật khẩu không khớp";
        }
        //nếu lỗi trống thực thi lệnh
        if(empty($error))
        {   //câu lênh cho upload file            

        //kiểm tra trùng tên
            
            //insert dữ liệu
            $id_insert =$db->insert("users",$data);
            if($id_insert > 0 )
            {   //đưa dữ liệu đường dẫn file uploads
                $_SESSION['success']="Thêm mới thành công";
                redirectAdmin("../../index.php");//redirecAdmin chuyển về các trang
            }
            else
            {
                //THêm thất bại

                $_SESSION['error']="Thêm mới thất bại";
                redirectAdmin("../../index.php");
            }
         
        }
}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đồ án</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="public/frontend/css/bootstrap.min.css">
        
        <script  src="public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="public/frontend/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="public/frontend/css/style.css">
        
    </head>
    <body>
        <div id="wrapper">
            <!---->            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Ngọc Thạnh</a><b>Chào mừng đến với website bán hàng của chúng tôi..!! </b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <!--Đăng ký-->
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#myModal1"><i class="fa fa-unlock"></i> Đăng ký</a>
                                        </li>
                                        <div class="modal fade" id="myModal1" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">Đăng ký</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                    <form class="form-horizontal" action="" method="POST">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-3" for="name">Tên đăng nhập:</label>
                                                        <div class="col-sm-9">
                                                          <input type="text" class="form-control" id="name" placeholder="Nhập tên đăng nhập" name="name">
                                                          <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                                                            <?php if(isset($error['name'])): ?>
                                                            <p class="text-danger"><?php echo $error['name'];?></p>
                                                             <?php endif?>
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-3" for="pwd">Mật khẩu:</label>
                                                        <div class="col-sm-9"> 
                                                          <input type="password" class="form-control" id="pwd" name="password" placeholder="Nhập mật khẩu">
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-3" for="email">Email:</label>
                                                        <div class="col-sm-9">
                                                          <input type="email" name="email" class="form-control" id="email" placeholder="Nhập Email">
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-3" for="phone">Số điện thoại:</label>
                                                        <div class="col-sm-9">
                                                          <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone">
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-3" for="address">Địa chỉ:</label>
                                                        <div class="col-sm-9">
                                                          <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
                                                        </div>
                                                      </div>
                                                      <div class="form-group"> 
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                          <div class="checkbox">
                                                            <textarea class="form-control" id="comments" name="comments" placeholder="Nội dung quy tắc" rows="3" disabled></textarea>
                                                            <label><input type="checkbox">Bạn đã đọc kỹ các quy tắc của chúng tôi.?</label>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                      <button type="submit" class="btn btn-default" >Đăng ký</button>
                                                    </div>
                                                    </form>
                                                    

                                                    </div>
                                                    
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                        <!--Đăng nhập-->
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                        </li>
                                        <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">Đăng Nhập</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                    <form class="form-horizontal" action="" method="POST">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-3" for="email">Tên đăng nhập:</label>
                                                        <div class="col-sm-9">
                                                          <input type="text" class="form-control" id="email" placeholder="Nhập tên đăng nhập">
                                                        </div>
                                                      </div>
                                                      <div class="form-group" >
                                                        <label class="control-label col-sm-3" for="pwd">Mật khẩu:</label>
                                                        <div class="col-sm-9"> 
                                                          <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu">
                                                        </div>
                                                      </div>
                                                      <div class="form-group"> 
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                          <div class="checkbox">
                                                            <label><input type="checkbox"> Ghi nhớ tài khoản</label>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                      <button type="submit" class="btn btn-default">Đăng nhập</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                        <li>
                                            <a href=""><i class="fa fa-user"></i> My Account <i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu">
                                                <li><a href="">Contact</a></li>
                                                <li><a href="">Cart</a></li>
                                                <li><a href="">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=""><i class="fa fa-share-square-o"></i> Checkout</a>
                                        </li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> All Category</option>
                                            <option> Dell </option>
                                            <option> Hp </option>
                                            <option> Asuc </option>
                                            <option> Apper </option>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="public/frontend/images/logo-default.png">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0374216629</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->
  <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Mobile</a>
                            </li>
                            <li>
                                <a href="">Contac</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href=""><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >

                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach($category as $item): ?>
                                <li>                                 
                                    <a href="danh-muc-sp.php?id=<?php echo $item['id']?>"><?php echo $item['name']?> </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach($productNew as $item): ?>
                                <li class="clearfix">
                                    <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads()?>/product/<?php echo $item['thumbal'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name'] ?></p >
                                            <b class="price">Giá:  <?php echo $item['sale'] ?></b><br>
                                            <b class="">Số lượng:  <?php echo $item['number'] ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                                
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                
                                <li class="clearfix">
                                    <a href="">
                                        <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>

                                 <li class="clearfix">
                                    <a href="">
                                        <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>                                            
                                        </div>
                                    </a>
                                </li>

                                 <li class="clearfix">
                                    <a href="">
                                        <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                            
                                        </div>
                                    </a>
                                </li>

                                 <li class="clearfix">
                                    <a href="">
                                        <img src="public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>
                    </div>