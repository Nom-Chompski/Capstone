<div class="container">
	<h1>Please enter all required information.</h1>
	<form method='post' action='verify.php'><br>
		<table>
			<tr>
				<td>Enter your email:</td>
				<td><input type="text" name="email"/></td>
				<?php if(isset($_SESSION['goodemail'])){ echo "<td class = 'ui-state-highlight'> ".$_SESSION['goodemail']." </td>";}else{echo "<td> </td>";} ?>
				<?php if(isset($_SESSION['bademail'])){ echo "<td class = 'ui-state-error'> ".$_SESSION['bademail']." </td>";}else{echo "<td> </td>";} ?>
			</tr>
			<td></td>
			<tr>
				<td>Enter a password:</td>
				<td><input type="password" name="pass"/></td>
				<?php if(isset($_SESSION['passmessage'])){ echo "<td class = 'ui-state-error'> ".$_SESSION['passmessage']." </td>";}else{echo "<td> </td>";} ?>
			</tr>
			<tr>
				<td>Re-enter your password:</td>
				<td><input type="password" name="passconfirm"/></td>
				<td><input type="submit" value="Submit"/></td>
			</tr>
		</table></br>
		<div class="g-recaptcha" data-sitekey="6Ldg5AUTAAAAAGgnCFx4b7HPkuhYnbzjbLxuwIDt" data-theme="dark"></div>
	</form>
</div>

<?php
    unset($_SESSION['goodemail']);
    unset($_SESSION['bademail']);
    unset($_SESSION['passmessage']);
?>