<!-- DB -->
<?php include "includes/db.php"; ?>

<!-- HEADER -->
<?php include "includes/i_header.php"; ?>

<!-- NAVIGATION -->
<?php include "includes/i_navigation.php"; ?>

<!-- BACKGROUND IMAGE -->
<?php include "includes/i_background.php"; ?>


<style>
    table thead tr th 
    {
        font-size: 14px;
    }
    table tbody tr td 
    {
        font-size: 14px;
    }
</style>


      <div class="container">
<?php
if(isset($_GET['hotel_id']))
{
	$get_hotel_id = $_GET['hotel_id'];
}
?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb my-3">
          <li class="breadcrumb-item">
          	<a class="btn btn-sm btn-secondary rounded-0" href="index_hotel_users.php?hotel_id=<?php echo $get_hotel_id; ?>">Rooms</a>
          </li>
          <li class="breadcrumb-item active">
          	<a class="btn btn-sm btn-success rounded-0" href="index_hotel_users.php?source=add_room&hotel_id=<?php echo $get_hotel_id; ?>">Add Room</a>
          </li>

          <li class="breadcrumb-item active">
            <a class="btn btn-sm btn-outline-dark rounded-0" href="index_hotel_users.php?source=pending_reservations&hotel_id=<?php echo $get_hotel_id; ?>">Pending Reservations</a>
          </li>

          <li class="breadcrumb-item active">
            <a class="btn btn-sm btn-outline-dark rounded-0" href="index_hotel_users.php?source=approved_reservations&hotel_id=<?php echo $get_hotel_id; ?>">Approved Reservations</a>
          </li>

          <li class="breadcrumb-item active">
            <a class="btn btn-sm btn-outline-dark rounded-0" href="index_hotel_users.php?source=checkin_reservations&hotel_id=<?php echo $get_hotel_id; ?>">Check In Reservations</a>
          </li>

          <li class="breadcrumb-item active">
            <a class="btn btn-sm btn-outline-dark rounded-0" href="index_hotel_users.php?source=checkout_reservations&hotel_id=<?php echo $get_hotel_id; ?>">Check Out Reservations</a>
          </li>
          
        </ol>

<div class="row justify-content-center">
    <table class="float-right">
        <tbody>
<?php
if(isset($_GET['hotel_id']))
{
    $get_hotel_id = $_GET['hotel_id'];
    $query = "SELECT * FROM tbl_hotels WHERE id = {$get_hotel_id}";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
        die("Query Failed " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_assoc($result))
    {
        $db_hotel_id            = $row['id'];               
        $db_hotel_name          = $row['name']; 
        $db_hotel_address       = $row['address'];               
        $db_hotel_type          = $row['type'];   
        $db_hotel_email			= $row['email'];            
    } 
}
?>
            <tr>
                <th class="text-right">Hotel Name :</th>
                <td> <?php echo $db_hotel_name; ?></td>
            </tr>
            <tr>
                <th class="text-right">Hotel Address :</th>
                <td> <?php echo $db_hotel_address; ?></td>
            </tr>
            <tr>
                <th class="text-right">Hotel Type :</th>
                <td> <?php echo $db_hotel_type; ?></td>
            </tr>
            <tr>
				<th class="text-right">Email Address :</th>
				<td> <?php echo $db_hotel_email; ?></td>
			</tr>
        </tbody>
    </table>
</div>

<!-- SWITCHING STATEMENT -->
<?php 
if(isset($_GET['source'])){
    $source = $_GET['source'];
}else{
    $source = '';
}

switch($source){

    case 'add_room';
    include "includes/hotel_users_add_room.php";
    break;

    case 'edit_room';
    include "includes/hotel_users_edit_room.php";
    break;

    case 'add_amenities';
    include "includes/hotel_users_add_amenities.php";
    break;

    case 'pending_reservations';
    include "includes/reservations_pending.php";
    break;

    case 'approved_reservations';
    include "includes/reservations_approved.php";
    break;

    case 'checkin_reservations';
    include "includes/reservations_checkin.php";
    break;

    case 'checkout_reservations';
    include "includes/reservations_checkout.php";
    break;

    default:
    include "includes/hotel_users_view_rooms.php";
    break;
}
?>            
            
          </div>
		<br>





<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>


