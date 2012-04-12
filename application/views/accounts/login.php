<table width="750" border="0">
  <tr>
     <td>
        <form id="login_form" name="login_form" method="post" action="<?php echo base_url();?>accounts/login">
           <label>
           	<p align="center">Please enter your username and password.</p>
           </label>
           <table width="400" align="center" border="0">
  		   		<tr>
    				<td>Username:</td>
    				<td><input name="username" type="text" id="username" /></td>
  				</tr>
  				<tr>
    				<td>Password:</td>
    				<td><input type="password" name="password" id="password" /></td>
  				</tr>
  				<tr>
    				<td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Sumbit" />
      				<a href="../accounts/register">Register?</a></td>
    			</tr>
            </table>
         </form>
      </td>
    </tr>
</table>
