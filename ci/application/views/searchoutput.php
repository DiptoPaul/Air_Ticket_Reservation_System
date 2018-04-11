<?php
if (!isset($this->session->userdata['signed']))
$this->load->view('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search Result</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/Sieses.css">
    </head>
    <body>
        <ul>
            <li><a href="<?php echo site_url('auth/show') ?>">View Profile</a></li>
            <li><a href="<?php echo site_url('auth/edit') ?>">Edit Profile</a></li>
            <li><a href="<?php echo site_url('auth/book') ?>">Book Flight</a></li>
            <li style="float:right"><a href="<?php echo site_url('auth/logout') ?>">Log Out</a></li>
            <li style="float:right"><a href="#"><?php echo "Signed In As : ".$this->session->userdata['signed']['Name'] ?></a></li>
        </ul>
        <h4>Search Results</h4>
        <hr>
        <table>
            <tr>
                <th>Flight-ID</th>
                <th>From</th>
                <th>To</th>
                <th>Date</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Seat</th>
            </tr>
            
<?php
foreach ($query as $row)
echo "<tr><td>".$row['ID']."</td>
                <td>".$row['FFrom']."</td>
                <td>".$row['TTo']."</td>
                <td>".$row['Date']."</td>
                <td>".$row['Departure']."</td>
                <td>".$row['Arrival']."</td>
                <td>".$row['Duration']."</td>
                <td>".$row['Price']."</td>
                <td>".$row['Seat']."</td></tr>";
?>
            
        </table>
        <h5>Please remember the Flight-ID because you will need it for booking</h5>
        <h5>Check your profile information carefully before booking</h5>
        <h5>Press the button below to make payment</h5>
        <a href="<?php echo site_url('auth/pay') ?>" class="waves-effect waves-light btn red"><i class="material-icons right">send</i>Make Payment</a>
    </body>
</html>