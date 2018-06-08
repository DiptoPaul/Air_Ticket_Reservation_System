<?php
if (!isset($this->session->userdata['signed']))
$this->load->view('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
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
        <br>
        <form action = "" method = "POST">
            <b>ID</b> <input type = "number" name = "ID" required>
            <input type="submit" name="Details" value="Details">
            <input type="submit" name="Edit" value="Edit">
            <input type="submit" name="Delete" value="Delete" onclick="return confirm('Are You Sure You Want To Delete This Record?')">
        </form>

        <h1>Details of Specific Flight</h1>
        <hr>
        <table>
            <tr>
                <th>Flight ID</th>
                <th>Ticket No</th>
                <th>Passenger ID</th>
            </tr>
            
<?php
foreach ($query as $row)
echo "<tr><td>".$row['Flight_ID']."</td>
                <td>".$row['ID']."</td>
                <td>".$row['Passenger_ID']."</td></tr>";
?>
            
        </table>
    </body>
</html>