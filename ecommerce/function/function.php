<?php

// include('./includes/connect.php');

//products
function products()
{
    global $con;

    if(!isset($_GET['catagory']))
    {
        $select_query="Select * from `products` limit 0,12";
          $result_query=mysqli_query($con,$select_query);
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['pro_Title'];
          while ($row=mysqli_fetch_assoc($result_query))
          {
            $product_Id=$row['pro_Id'];
            $product_Title=$row['pro_Title'];
            $product_Description=$row['pro_Des'];
            // $product_Keyword=$row['pro_key'];
             $product_catId=$row['cat_Id'];
            $product_Image=$row['pro_img1'];
            $product_Price=$row['pro_Price'];
            echo "<div class='col-md-3 mb-2'>
            <div class='card' style='width: 18rem;''>
              <img src='./Admin/productImage/$product_Image' class='card-img-top' alt='$product_Title'>
              <div class='card-body'>
               <h5 class='card-title text-center'>$product_Title</h5>
               <p class='card-text'>$product_Description</p>
               <p class='card-text'><b>Price: Rs.$product_Price</b></p>
               <a href='index.php?add_to_cart=$product_Id' class='btn btn-warning'>Add to Cart <i class='fa-solid fa-cart-plus'></i></a>
               <a href='detail.php?pro_Id=$product_Id' class='btn btn-secondary'><i class='fa-solid fa-circle-info'></i> Detail</a>
              </div>
            </div>
      </div>";
          }
        }
        }

        // catagory wise product

        function cat_products()
{
    global $con;

    if(isset($_GET['catagory']))
    {
        $catagory_Id=$_GET['catagory'];
        $select_query="Select * from `products` where cat_Id=$catagory_Id";
          $result_query=mysqli_query($con,$select_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0)
          {
            echo "<h2 class='text-center text-info'> We are out of Service for now </h2>";
          }
          
          while ($row=mysqli_fetch_assoc($result_query))
          {
            $product_Id=$row['pro_Id'];
            $product_Title=$row['pro_Title'];
            $product_Description=$row['pro_Des'];
            // $product_Keyword=$row['pro_key'];
             $product_catId=$row['cat_Id'];
            $product_Image=$row['pro_img1'];
            $product_Price=$row['pro_Price'];
            echo "<div class='col-md-3 mb-2'>
            <div class='card' style='width: 18rem;''>
              <img src='./Admin/productImage/$product_Image' class='card-img-top' alt='$product_Title'>
              <div class='card-body'>
               <h5 class='card-title text-center'>$product_Title</h5>
               <p class='card-text'>$product_Description</p>
               <p class='card-text'><b>Price: Rs.$product_Price</b></p>
               <a href='index.php?add_to_cart=$product_Id' class='btn btn-warning'>Add to Cart <i class='fa-solid fa-cart-plus'></i></a>
               <a href='detail.php?pro_Id=$product_Id' class='btn btn-secondary'> <i class='fa-solid fa-circle-info'> Detail</i></a>
              </div>
            </div>
      </div>";
          }
        }
        }


// Side bar
function sidebar(){
    global $con;
    $select_Category="Select * from `catagory`";
    $result_category = mysqli_query($con,$select_Category);
    while($row_data=mysqli_fetch_assoc( $result_category))
    { $catagory_title=$row_data['cat_Title'];
        $category_id=$row_data['cat_Id'];
        echo "<li class='nav-item'>
        <a href='index.php?catagory=$category_id' class='nav-link text-light'>$catagory_title</a>
    </li>";

    }


}
// side bar for all products
function sidebarallpro(){
  global $con;
  $select_Category="Select * from `catagory`";
  $result_category = mysqli_query($con,$select_Category);
  while($row_data=mysqli_fetch_assoc( $result_category))
  { $catagory_title=$row_data['cat_Title'];
      $category_id=$row_data['cat_Id'];
      echo "<li class='nav-item'>
      <a href='allproduct.php?catagory=$category_id' class='nav-link text-light'>$catagory_title</a>
  </li>";

  }


}

// searching
function search()
{
    global $con;

    if(isset($_GET['Pro_search']))
    {
        $search_pro=$_GET['search_data'];
        $search_query="Select * from `products` where pro_key like '%$search_pro%'";
          $result_query=mysqli_query($con,$search_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0)
          {
            echo "<h2 class='text-center text-info'> Product Not Found!! </h2>";
          }
        while ($row=mysqli_fetch_assoc($result_query))
          {
            $product_Id=$row['pro_Id'];
            $product_Title=$row['pro_Title'];
            $product_Description=$row['pro_Des'];            
             $product_catId=$row['cat_Id'];
            $product_Image=$row['pro_img1'];
            $product_Price=$row['pro_Price'];
            echo "<div class='col-md-3 mb-2'>
            <div class='card' style='width: 18rem;''>
              <img src='./Admin/productImage/$product_Image' class='card-img-top' alt='$product_Title'>
              <div class='card-body'>
               <h5 class='card-title text-center'>$product_Title</h5>
               <p class='card-text'>$product_Description</p>
               <p class='card-text'><b>Price: Rs.$product_Price</b></p>
               <a href='index.php?add_to_cart=$product_Id' class='btn btn-warning'>Add to Cart <i class='fa-solid fa-cart-plus'></i></a>
               <a href='detail.php?pro_Id=$product_Id' class='btn btn-secondary'><i class='fa-solid fa-circle-info'> Detail</i></a>
              </div>
            </div>
      </div>";
          }
    
        }
    
    }
    

  //all products
  function allProducts(){
    global $con;

    if(!isset($_GET['catagory']))
    {
        $select_query="Select * from `products`";
          $result_query=mysqli_query($con,$select_query);
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['pro_Title'];
          while ($row=mysqli_fetch_assoc($result_query))
          {
            $product_Id=$row['pro_Id'];
            $product_Title=$row['pro_Title'];
            $product_Description=$row['pro_Des'];
            // $product_Keyword=$row['pro_key'];
             $product_catId=$row['cat_Id'];
            $product_Image=$row['pro_img1'];
            $product_Price=$row['pro_Price'];
            echo "<div class='col-md-3 mb-2'>
            <div class='card' style='width: 18rem;''>
              <img src='./Admin/productImage/$product_Image' class='card-img-top' alt='$product_Title'>
              <div class='card-body'>
               <h5 class='card-title text-center'>$product_Title</h5>
               <p class='card-text'>$product_Description</p>
               <p class='card-text'><b>Price: Rs.$product_Price</b></p>
               <a href='index.php?add_to_cart=$product_Id' class='btn btn-warning'>Add to Cart <i class='fa-solid fa-cart-plus'></i></a>
               <a href='detail.php?pro_Id=$product_Id' class='btn btn-secondary'><i class='fa-solid fa-circle-info'></i> Detail</a>
              </div>
            </div>
      </div>";
          }
        }



  }

  // Detail

  function details()
  {
    global $con;
    if(isset($_GET['pro_Id']))
    {
    if(!isset($_GET['catagory']))
    {
      $product_Id=$_GET['pro_Id'];
        $select_query="Select * from `products`where pro_Id=$product_Id";
          $result_query=mysqli_query($con,$select_query);
          while ($row=mysqli_fetch_assoc($result_query))
          {
            $product_Id=$row['pro_Id'];
            $product_Title=$row['pro_Title'];
            $product_Description=$row['pro_Des'];
            $product_catId=$row['cat_Id'];
            $product_Image=$row['pro_img1'];
            $product_Price=$row['pro_Price'];
            echo "   <div class='row'>
            <div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;' >
              <img src='./Admin/productImage/$product_Image' class='card-img-top' alt='$product_Title'
              style='
              .zoom {
                padding: 50px;
                background-color: green;
                transition: transform .2s; 
                width: 200px;
                height: 200px;
                margin: 0 auto;
              }
              
              .zoom:hover {
                transform: scale(1.5);
              }'>
              
      </div>
      </div>
      <div class='col-md-8'>
            
            <div class='row'>
                <div class='col-md-12'>
                    <h1 class='text-center text-info mb-5'>$product_Title</h1>
                    <div class='card-body'>               
               <p class='card-text'>$product_Description</p>
               <p class='card-text'><b>Price: Rs.$product_Price</b></p>
               <a href='index.php?add_to_cart=$product_Id' class='btn btn-warning'>Add to Cart <i class='fa-solid fa-cart-plus'></i></a>
               <a href='./user/buy.php' class='btn btn-success'>Buy Now</a>
              </div>
            </div>
                </div>


            </div>
      ";
          }
        }
      }
  }


  //IP address
  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
 

// cart
function addToCart()
{
  if(isset($_GET['add_to_cart']))
  {
    global $con;
    $ip = getIPAddress();
    $get_pro_Id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart` where IP_address='$ip' and pro_Id	=$get_pro_Id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);    
    if($num_of_rows>0)
          {
            echo "<script>alert('Item already exists')</script>";
            echo "<script>window.open('index.php','_self')</script>";
          }
          else
          {
            $insert_query="insert into `cart` (pro_Id,IP_address,Qty) values ($get_pro_Id,'$ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            // echo "<script>alert('Item is added to cart succesfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
          }
    
  }

}

// no.of carts

function numOfCarts(){
  if(isset($_GET['add_to_cart']))
  {
    global $con;
    $ip = getIPAddress();   
    $select_query="SELECT * FROM `cart` where IP_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_cart=mysqli_num_rows($result_query);    
  }  
    else
          {
            global $con;
    $ip = getIPAddress();   
    $select_query="SELECT * FROM `cart` where IP_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_cart=mysqli_num_rows($result_query);

          }
          echo $num_of_cart;
    
  }

  // total price for the items in cart

  function total_cost()
  {
    global $con;
    $ip_add = getIPAddress();
    $total=0;
    $cart_query = "Select * from `cart` where IP_address='$ip_add' ";
    $result_query=mysqli_query($con,$cart_query);  
      
    while($row=mysqli_fetch_array($result_query))
    {
      $pro_id=$row['pro_Id'];
      $select_product= "Select * from `products` where pro_Id='$pro_id' ";
      $result=mysqli_query($con,$select_product);

      while($row_pro_price=mysqli_fetch_array($result))
    {
      $total_price = array($row_pro_price['pro_Price']);
      $total_sum = array_sum($total_price);
      $total += $total_sum;

    }
    }
    echo $total;

  }



// order details 

function user_order()
{
  global $con;
  $user_name=$_SESSION['username'];
  $details="Select * from `user` where user_Name='$user_name'";
  $result=mysqli_query($con,$details);
  while($row_query=mysqli_fetch_array($result))
  {
    $user_id=$row_query['User_Id'];

    if(!isset($_GET['edit_profile']))
    {
    if(!isset($_GET['My_order']))      
    {
    if(!isset($_GET['delete_acc'])) 
    {
      $get_orders="Select * from `order_tbl` where User_Id=$user_id and 
      ord_status='pending'";
      $result_pending=mysqli_query($con,$get_orders);
      $pending_count= mysqli_num_rows($result_pending);
      if($pending_count>0)
      {
        echo "<h3 class='text-center'> You have <span class='text-danger'>$pending_count</span> pending orders for now.</h3>
        <p class='text-center mt-4'><a href='profile.php?order' class='btn btn-outline-success text-center'> Order Details</a></p>
        <p class='text-center mt-4'><a href='../index.php' class='btn btn-outline-primary text-center'> Shop More Products</a></p>
         ";
      }
      else{
        echo "<h3 class='text-center'> You have <span class='text-danger'>0</span> pending orders for now.</h3>
        <p class='text-center mt-4'><a href='../index.php' class='btn btn-outline-primary text-center'> Shop More Products</a></p> ";
      }
    }     
    }
    }
  }
}
 


  
   



?>