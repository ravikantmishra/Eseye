<?php session_start();?>
<!DOCTYPE HTML>
    <html> 
    <head> 
        <title>Log In</title> 
    </head> 
    <body id="body-color"> 
        <div id="Sign-In" align="center"> 
            <form method="POST" action="action.php?action=login"> 
            <fieldset style="width:30%">
                <legend>Log In</legend> 
                    <table border="0" cellpadding="5" cellspacing="2"> 
                    	<tr> 
                            <td style="color:red"><?php if(isset($_SESSION['msg'])){
                            	echo $_SESSION['msg'];unset($_SESSION['msg']);
                            }
                            ?></td>
                            <td></td> 
                        </tr>
                        <tr> 
                            <td>Email</td>
                            <td> <input type="text" name="email"></td> 
                        </tr> 
                        <tr> 
                            <td>Password</td>
                            <td> <input type="password" name="pass"></td> 
                        </tr> 
                        <tr> 
                            <td><a href="registration.php">New User</a></td>
                            <td><input id="button" type="submit" name="submit" value="Sign-in"></td>
                        </tr>                         
                    </table> 
             </fieldset> 
             </form>
         </div> 
    </body> 
 </html>