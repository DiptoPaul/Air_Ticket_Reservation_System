<?php
if (!isset($this->session->userdata['signed']))
$this->load->view('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
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
        <h1>Your Profile</h1>
        <hr>
        <table>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Country</th>
            </tr>
            
<?php
echo "<tr><td>".$this->session->userdata['signed']['Name']."</td>
                <td>".$this->session->userdata['signed']['Gender']."</td>
                <td>".$this->session->userdata['signed']['Email']."</td>
                <td>".$this->session->userdata['signed']['Telephone']."</td>
                <td>".$this->session->userdata['signed']['Country']."</td></tr>";
?>
            
        </table>
    </body>
</html>