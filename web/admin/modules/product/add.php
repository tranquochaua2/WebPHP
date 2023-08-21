<?php 
    $open="product";
    //include_once'../../libraries/connect.php';
    include_once'../../autoload/autoload.php';
    $product=$db->fetchAll('category');//khai báo category
    $data=
        [
            "name" => postInput("name"),
            "slug" => to_slug(postInput("name")),//chuyển tên có dấu thành ký tự có gạch ngang 
            "category_id" => postInput("category_id"),
            "price" => postInput("price"),
            "content" => postInput("content"),
            "number" => postInput("number"),
            "sale" =>postInput("sale"),
            "thumbal"=>postInput("thumbal"),
            "chitietsp" => postInput("chitietsp")
        ];
    if($_SERVER['REQUEST_METHOD'] == "POST")
    
    {   //Khai báo mảng data từ dtbase.php hàm insert
       
        $error = [];//khởi tạo mảng lỗi
        if(postInput('name')=='')
        {
            $error['name']="Mời bạn nhập tên sản phẩm";
        }
        if(postInput('category_id')=='')
        {
            $error['category_id']="Mời bạn chọn danh mục";
        }
        if(postInput('price')=='')
        {
            $error['price']= "Mời bạn nhập giá sản phẩm";
        }
        if(postInput('content')=='')
        {
            $error['content']= "Mời bạn nhập mô tả sản phẩm";
        }
         if(postInput('number')=='')
        {
             $error['number']= "Bạn chưa số lượng sản phẩm";
        }
        if(!isset($_FILES['thumbal']))
        {
             $error['thumbal']= "Bạn chưa upload file ảnh";
        }
        //nếu lỗi trống thực thi lệnh
        if(empty($error))
        {   //câu lênh cho upload file
            if(isset($_FILES['thumbal']))
            {
                $file_name = $_FILES['thumbal']['name'];
                $file_tmp = $_FILES['thumbal']['tmp_name'];
                $file_type = $_FILES['thumbal']['type'];
                $file_erro = $_FILES['thumbal']['error'];
    
                if($file_erro==0)
                {
                    $part = ROOT."product/";
                    $data['thumbal']=$file_name;
                }
            }
            
    
        //kiểm tra trùng tên
            $isset = $db->fetchOne("product","name = '".$data['name']."' " );
            if(count($isset) > 0)
            {
                $_SESSION['error'] = "Tên sản phẩm đã tồn tại";
            }
         else
         {
            //insert dữ liệu
            $id_insert =$db->insert("product",$data);
            if($id_insert > 0 )
            {   //đưa dữ liệu đường dẫn file uploads
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']="Thêm mới thành công";
                redirectAdmin("product");//redirecAdmin chuyển về các trang
            }
            else
            {
                //THêm thất bại
    
                $_SESSION['error']="Thêm mới thất bại";
                redirectAdmin("product");
            }
         }
        }
    }
    
    ?>
<?php include_once'../../../layouts/header.php'?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">sản phẩm</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Thêm mới
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php include_once'../../../partials/notification.php'; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!--Muốn upload được ảnh phải có enctype-->
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="InputEmail1" class="col-sm-2"> Danh mục sản phẩm</label>
                <div class="col-sm-8">
                    <select class="form-control col-sm-8" name="category_id">
                        <option value="">- Mời bạn chọn danh mục sản phẩm -</option>
                        <?php //duyệt qua các phần tử trong mảng category để in ra các danh sách
                            foreach ($product as $num):?>
                        <option value="<?php echo $num['id']  ?>"><?php echo $num['name']?></option>
                        <?php endforeach                        
                            ?>
                    </select>
                    <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['category_id'])): ?>
                    <p class="text-danger"><?php echo $error['category_id'];?></p>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group">
                <label for="InputEmail1" class="col-sm-2"> Tên sản phẩm</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm" name="name" value="<?php echo $data['name'] ?>">
                    <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['name'])): ?>
                    <p class="text-danger"><?php echo $error['name'];?></p>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group">
                <label for="InputEmail1" class="col-sm-2"> Giá sản phẩm</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm" name="price" value="<?php echo $data['price'] ?>">
                    <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['price'])): ?>
                    <p class="text-danger"><?php echo $error['price'];?></p>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group">
                <label for="InputEmail1" class="col-sm-2"> Số lượng sản phẩm</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="100" name="number" value="<?php echo $data['number'] ?>">
                    <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['number'])): ?>
                    <p class="text-danger"><?php echo $error['number'];?></p>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group">
                <label for="InputEmail1" class="col-sm-2"> Giảm giá</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="10%" name="sale" value="10%">
                </div>
                <label for="InputEmail1" class="col-sm-1"> Hình ảnh</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" id="exampleInputEmail1" name="thumbal" required="">
                    <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['thumbal'])): ?>
                    <p class="text-danger"><?php echo $error['thumbal'];?></p>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group">
                <div id="sample">
                  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                //<![CDATA[
                        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                  //]]>
                  </script>
                </div>
                <label for="InputEmail1" class="col-sm-2"> Mô tả sản phẩm</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="content" rows="5";><?php echo $data['content'] ?></textarea>
                    <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['content'])): ?>
                    <p class="text-danger"><?php echo $error['content'];?></p>
                    <?php endif?>
                </div>
            </div>

             <div class="form-group">
                <div id="sample">
                  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                //<![CDATA[
                        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                  //]]>
                  </script>
                </div>
                <label for="InputEmail1" class="col-sm-2"> Chi tiết sản phẩm</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="chitietsp" rows="5";><?php echo $data['chitietsp'] ?></textarea>
                    <!--nếu tồn tại mảng lỗi error in lỗi tại vị trí-->
                    <?php if(isset($error['chitietsp'])): ?>
                    <p class="text-danger"><?php echo $error['chitietsp'];?></p>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
<?php include_once'../../../layouts/footer.php'?>