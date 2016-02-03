<h2 class="title">Login</h2>
<form action="login.php" method="post" class="form">
<p><label class="label" for="name">Name:</label>
<input id="name" type="text" name="name" size="30" maxlength="60" 
value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required> </p>

<p><label class="label" for="password">Password:</label>
<input id="psword" type="password" name="password" size="12" maxlength="12" 
value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" required> 
</p>
<p><input id="submit" type="submit" name="submit" value="Login"></p>
</form><br>