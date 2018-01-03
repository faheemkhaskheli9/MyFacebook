<?php
include('config.php');
require('includes/functions.php');
require_once('includes/validate.php');
if (isset($_SESSION['user']))
	header('Location: ./home');
	
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Social Site For MUET Students">
<meta name="keywords" content="Faheem Khaskheli,Meet New People,Make New Friends,Find Friends">
<meta name="author" content="Faheem Ali Khaskheli">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title>SSFMS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery.min.js"></script>
<script src="jquery.form.js"></script>
<script src="script.js"></script>
</head>

<body>

<?php 
include_once('includes/header.php');
?>

<center>
    <div id="nav" style="margin-top:50px">
<?php
    if (isset($_GET['page']))
        {
        if ($_GET['page'] == 'account')
            {
?>
            <div id="signin" class="tab">
            
            <div id="heading"><h2>Sign In</h2></div>
            <form method="post" action="login/validate.php">
            <center>
            <table cellpadding="5">
            <tr>
            <td width="60"><span>Email</span></td>
            <td width="200"><input type="email" name="email" id="email" class="inputfield" placeholder="Email"></td>
            </tr>
            <tr>
            <td width="60"><span>Password</span></td>
            <td width="20"><input type="password" name="password" id="password" class="inputfield" placeholder="Password"></td>
            </tr>
            
            <tr>
            <td width="260" colspan="2"><a href="#"><span>Forgot Your Password?</span></a></td>
            </tr>
            
            <tr>
            <td colspan="2"><center><input type="submit" value="Sign In" class="button"></center></td>
            </tr>
            </table>
            </center>
            </form>
            </div>
            
            <div id="signup" class="tab">
            
            <div id="heading"><h2>Sign Up</h2></div>
            <center>
            <form method="post" action="join/signup.php">
            <table cellpadding="5">
            <tr>
            <td width="60" rowspan="2"><span>Name</span></td>
            <td width="200"><input type="text" name="firstname" id="firstname" class="inputfield" placeholder="Firstname" required></td>
            </tr>
            <tr>
            <td width="200"><input type="text" name="lastname" id="lastname" class="inputfield" placeholder="Lastname" required></td>
            </tr>
            
            <tr>
            <td width="60"><span>Email</span></td>
            <td width="200"><input type="email" name="email" id="email" class="inputfield" placeholder="Email" required></td>
            </tr>
            <tr>
            <td width="60"><span>Password</span></td>
            <td width="20"><input type="password" name="password" id="password" class="inputfield" placeholder="Password" required></td>
            </tr>
            <tr>
            <td width="60"><span>Retype Password</span></td>
            <td width="20"><input type="password" name="repass" id="repass" class="inputfield" placeholder="Retype Password" required></td>
            </tr>
            <tr>
            <td colspan="2">
            <?php
            require_once('includes/recaptchalib.php');
            $publickey = "6LdwbPcSAAAAACwXsgTHVWxYu6pKY3_4B-zFyQTf"; // you got this from the signup page
            echo recaptcha_get_html($publickey);	
            ?>
            </td>
            </tr>
            <tr>
            <td colspan="2"><center><input type="submit" value="Sign Up" class="button"></center></td>
            </tr>
            </table>
            </form>
            </center>
            </div>
<?php	
            }
        }
    else
        {
?>
    
        <div class="tab" id="info">
        
        <div id="heading"><h2>Welcome</h2></div>
        <table cellpadding="5" cellspacing="5" style="padding:20px;">
        <tr>
        <td><span id="welcome_message">Join this Social Network to Bring the World closer to you ....</span></td>
        </tr>
        <tr>
        <td><span id="sub_message"><img src="images/icons/share.png" width="100" style="float:left;"><div>Share your thoughts, Experience, Picutres, Videos and Files Online For Free.</div></span></td>
        </tr>
        <tr>
        <td><span id="sub_message"><img src="images/icons/updates.png" width="100" style="float:left;"><div>Recieve Live Updates From those you care about Friends, Family, Favourite Brands ...</div></span></td>
        </tr>
        
        <tr>
        <td><div style="text-align:center;"><a href="?page=account"><div id="signin_button">Login</div></a></div></td>
        </tr>
        
        </table>
        
        </div>
    <?php
        }
include_once('./other.php');
?>

</div>
</center>

</body>
</html>