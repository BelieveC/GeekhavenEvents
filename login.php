<?php
	
	if($_POST)
	{
		function chk_user( $uid, $pwd ) {

			if ($pwd) {
				$ds = ldap_connect("172.31.1.42");
				ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
				$a = ldap_search($ds, "dc=iiita,dc=ac,dc=in", "uid=$uid" );
				$b = ldap_get_entries( $ds, $a );
				$dn = $b[0]["dn"];
				$ldapbind=@ldap_bind($ds, $dn, $pwd);
				if ($ldapbind) {
					return 1;
				} else {
					return 0;
				}
				ldap_close($ds);
			} else {
				return 0;
			}
		}
		function get_name($uid) {
			$ds=ldap_connect("172.31.1.42");
			

			ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
			if ($ds)
			{
				$bnd=ldap_bind($ds);
				$srch=ldap_search($ds, "dc=iiita,dc=ac,dc=in", "uid={$uid}");
				$info=ldap_get_entries($ds, $srch);
				ldap_close($ds);

				$userdn=$info[0]["dn"];
				$usernm=$info[0]["cn"][0];

				return $info[0]["cn"][0];
			} else {
				return "Not available";
			}
		}
		$user=$_POST[username];
		$pass=$_POST[password];
		$true=chk_user($user, $pass);
		$data = "";
		if($true){
	
			$name=get_name($user);
			$arr = explode("-",$name);
			$fname1=substr($name, 0, strrpos($name, "-"));
			$fname=str_replace("-", " ", $fname1);
			$_SESSION['name']=$name;
			$_SESSION['fname']=$fname;
			$new="";
			
		
			$data = $user;
			
		}
		else{
			$data = "invalid credentials";
		}

		echo $data;

	}	
?>


<form action="login.php" method="post" class="form-horizontal" role="form" id="signup-form">
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" placeholder="Username" class="form-control">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" placeholder="Password" class="form-control">
	</div>
	<div class="form-group">
		<label for="dob">DOB:</label>
		<input id="dob" name="dob" class="form-control" placeholder="DOB">
	</div>
	<div class="form-group">
		<label for="sex">Sex:</label>
		<input for="sex" type="radio" value="male" name="sex" checked>Male
		<input for="sex" type="radio" value="female" name="sex">Female
	</div>
	<input type="hidden" value="1" name="submitted">
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Submit" name="submit">
	</div>
</form>