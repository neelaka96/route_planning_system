<?php include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Invoicebus Invoice Template">
    <meta name="author" content="Invoicebus">

    <meta name="template-hash" content="f3142bbb0a1696d5caa932ecab0fc530">

    <link rel="stylesheet" href="css/template.css">
  </head>
  <body>

<?php 
// $now = strtotime("2021-09-03");
// $your_date = strtotime("2021-09-03");
// $datediff = $now - $your_date;
// echo round($datediff / (60 * 60 * 24));
?>

    <div id="container">
      <section id="memo">
        <div class="company-name">
          <span>Explore Ceylon</span>
          <div class="right-arrow"></div>
        </div>
<!-- HOTEL DETAILS -->
<?php
  if(isset($_GET['hotel_id']))
  {
    $get_hotel_id = $_GET['hotel_id'];
    $get_room_id = $_GET['room_id'];
    $get_user_id = $_GET['user_id'];
    $get_reservation_id = $_GET['reservation_id'];
  }
  $query_hotel = "SELECT * FROM tbl_hotels WHERE id ={$get_hotel_id} ORDER BY id DESC";
  $result_hotel = mysqli_query($conn, $query_hotel);
  while($row = mysqli_fetch_assoc($result_hotel))
  {
    $hotel_id = $row['id'];       
    $hotel_name = $row['name'];       
    $hotel_address = $row['address'];       
    $hotel_dis_id = $row['district_id'];        
    $hotel_city = $row['city'];
    $hotel_image = $row['image'];
    $hotel_desc = $row['description'];
    $hotel_tel = $row['tel_no'];
    $hotel_lat = $row['lat'];       
    $hotel_lan = $row['lan'];       
    $hotel_type = $row['type'];       
    $hotel_status = $row['status'];       
    $hotel_date = $row['date'];
    $hotel_email = $row['email'];
}
  ?>
        <div class="company-info">
          <div>
            <span class="bold"><?php echo $hotel_name; ?></span>
          </div>
          <div>
            <span><?php echo $hotel_address; ?></span>
          </div>
          <div><?php echo $hotel_city; ?></div>
          <div><?php echo $hotel_email; ?></div>
          <div><?php echo $hotel_tel; ?></div>
        </div>
      </section>
      
      <section id="invoice-info">
        <div>
          <span>Date and Time</span>
        </div>
        
        <div>
          <span><?php echo $date = date('m/d/Y h:i:s a', time()); ?></span>
        </div>
      </section>

<?php 
$query_user = "SELECT * FROM tbl_users WHERE id = {$get_user_id}";
$result_user = mysqli_query($conn, $query_user);
if(!$result_user)
{
  die("Query Failed". mysqli_error($conn));
}
while($row = mysqli_fetch_array($result_user))
{
  $user_id            = $row['id'];
  $user_title         = $row['title'];
  $user_full_name     = $row['full_name'];
  $user_username      = $row['username'];
  $user_email         = $row['email'];
  $user_role          = $row['role'];
}

?>

      <section id="client-info">
        <span>Bill To: -</span>
        <div>
          <span class="bold"><?php echo $user_title. '. ' . $user_full_name; ?></span>
        </div>
        
        <div>
          <span><?php echo $user_email; ?></span>
        </div>
        
        <div>
          <span>+94 77 277 5721<span>
        </div>
      </section>

      <div class="clearfix"></div>
      
      <section id="invoice-title-number">
      
        <span id="title">Invoice</span>
        <!-- <span id="number">{invoice_number}</span> -->
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="items">
        
        <table cellpadding="0" cellspacing="0">
        
          <tr>
            <th>Number</th>
            <th>Room Description</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>No of Days</th>
            <th>Price (USD)</th>
            <th>Total Price (USD)</th>
          </tr>

<?php 
  $query_reservations = "SELECT * FROM tbl_reservations WHERE id = {$get_reservation_id} ORDER BY id DESC";
  $result_reservations = mysqli_query($conn, $query_reservations);
  while($row = mysqli_fetch_assoc($result_reservations))
  {
    $reservation_id = $row['id'];       
    $user_id        = $row['user_id'];        
    $hotel_id       = $row['hotel_id'];       
    $room_id        = $row['room_id'];        
    $check_in       = $row['check_in'];       
    $check_out      = $row['check_out'];
    $no_of_guests   = $row['no_of_guests'];
    $status         = $row['status'];       
    $date           = $row['date'];
    

    if($status == "CheckOut")
    {

    // No OF days of Checkin AND Checkout
    $no_of_days = ((strtotime($check_out) - strtotime($check_in))/(60*60*24));
    

      echo "<tr>";
        echo "<td>{item_row_number}</td>";

      // Room Details
      $query_room = "SELECT * FROM tbl_rooms WHERE id = {$get_room_id}";
      $result_room = mysqli_query($conn, $query_room);
      while($row = mysqli_fetch_assoc($result_room))
      {
      $room_id            = $row['id'];       
      $room_type          = $row['type'];       
      $room_price_per_day = $row['price_perday'];  

        echo "<td>Room {$room_type}</td>";
      } 
        
        echo "<td>{$check_in}</td>";
        echo "<td>{$check_out}</td>";
        echo "<td>{$no_of_days} days</td>";

        echo "<td>$ {$room_price_per_day}</td>";
        
        $total = $no_of_days * $room_price_per_day;

        echo "<td>$ {$total}.00</td>";
      echo "</tr>";
    } 
  } 
?>          
        </table>
      </section>

      <div class="currency">
        <span>*All prices are in</span> <span>USD</span>
      </div>
      
      <section id="sums">
      
        <table cellpadding="0" cellspacing="0">
          <tr class="amount-total">
            <th>TOTAL</th>
            <td>$ <?php echo $total; ?>.00</td>
          </tr>
        </table>
        
      </section>
      
      <div class="clearfix"></div>
      <section id="terms">
      
        <span>Contact Us</span>
        <div>www.ExploreCeylon.lk  ||  info@exploreceylon.lk</div>

      
        <span>Terms & Conditions</span>
        <div>Credits will only be authorized under the desecration of the Management</div>
        
      </section>

      <div class="payment-info">
        <div>Payment Methods:-</div>
        <div> *Cash </div>
        <div> *Master Cards </div>
        <div> *Crerdit Cards </div>
        <div> *Debit Card </div>
      </div>
    </div>

    <script src="http://cdn.invoicebus.com/generator/generator.min.js?data=data.js"></script>
  </body>
</html>
