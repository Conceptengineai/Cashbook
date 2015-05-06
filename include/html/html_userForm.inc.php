	<div id="userFormContainer">
		<ul>
			<li>logined&nbsp;:&nbsp;<span><?php if 
				( array_get_value ($_SESSION, 
				'user_name', "") ) { 
					echo $_SESSION ['user_name'] ;
				} ?></span></li>
			<li><a href="logout();">logout</a></li>
		</ul>
		<form>
			<select name="userConfig" size="1">
				<option value="changepw">change password</option>
				<option value="adduser">add user</option>
			</select>
		</form>
	</div>
