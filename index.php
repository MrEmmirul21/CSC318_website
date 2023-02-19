<html>
<head>
    <link rel="stylesheet" href="indexstyle.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="logins()">Student</button>
                <button type="button" class="toggle-btn" onclick="loginad()">Admin</button>
            </div>
            <form id="logins" class="input-group" method= "post" action="login().php">
                <input type="number" name='username' class="input-field" placeholder="Student ID" required>
                <input type="password" name='password' class="input-field" placeholder="Password" required>
                <button type="submit" name='Submit' class="submit-btn" onclick="return checkEmptyFields()">Login</button>
            </form>
            <form id="loginad"class="input-group" method="post" action="login().php">
                <input type="number" name='username' class="input-field" placeholder="Admin ID" required>
                <input type="password" name='password' class="input-field" placeholder="Password" required>
                <button type="submit" name='Submit' class="submit-btn" onclick="return checkEmptyFields1()">Login</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("logins");
        var y = document.getElementById("loginad");
        var z = document.getElementById("btn");
        
        function loginad(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function logins(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
        function checkEmptyFields()
        {
            var username = document.logins.username.value;
            var password = document.logins.username.value;
            if(username == "" || password == "")
            {
                alert("Please enter username/password!");
		        return false;
	        }
	    else if(isNaN(username))
	    {
		    alert("Username should your student number!");
		    return false;
	    }
	    else if(username.length != 10)
	    {
		    alert("Student number should be 10 digits!");
		    return false;
	    }
	    else
		    return true;
        }
        function checkEmptyFields1()
        {
            var username = document.loginad.username.value;
            var password = document.loginad.username.value;
            if(username == "" || password == "")
            {
                alert("Please enter username/password!");
		        return false;
	        }
	    else if(isNaN(username))
	    {
		    alert("Username should your student number!");
		    return false;
	    }
	    else if(username.length != 7)
	    {
		    alert("Student number should be 7 digits!");
		    return false;
	    }
	    else
		    return true;
        }
    </script>
</body>
</html>
