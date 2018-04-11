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
            <li><a href="<?php echo site_url('admin/insert') ?>">Create New Flight Schedule</a></li>
            <li><a href="<?php echo site_url('admin/show') ?>">View All Flights</a></li>
            <li><a href="<?php echo site_url('admin/search') ?>">Search Flights</a></li>
            <li style="float:right"><a href="<?php echo site_url('admin/logout') ?>">Log Out</a></li>
            <li style="float:right"><a href="#"><?php echo "Signed In As : ".$this->session->userdata['signed']['Name'] ?></a></li>
        </ul>
        <h4>Search Result</h4>
        <hr>
        <table>
            <tr>
                <th>ID</th>
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
    </body>
</html>