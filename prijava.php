		<form action="" method="POST">
			<label>Email</label><br/>
			<input type="email" id="email" name="email"/><br/>
			<label>Lozinka</label><br/>
			<input type="password" id="password" name="password"><br/><br/>
			<input type="submit" value="Prijavi me" id="prijava"/><br/>
		</form>			
		<br/>
		<?php prijava($connection)?>