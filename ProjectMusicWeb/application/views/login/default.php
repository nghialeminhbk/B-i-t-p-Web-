<div class="container">
    <div class="login login-left">
        <h2>Login</h2>
        <form action="http://localhost:8080/ProjectMusicWeb/register/login" method="POST">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Login">
            </div>  
        </form>
    </div>
    <div class="login login-right">
        <h2>Register</h2>
        <form action="http://localhost:8080/ProjectMusicWeb/register/default" method="POST">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="username" onchange="checkUser(this.value)" required>
            </div>
            <div class="form-group">    
                <label for="">Password</label>
                <input type="text" name="password" id="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Register" >
            </div>
        </form>
    </div>
</div>

<script>
    var user = document.getElementById("username");
    var pass = document.getElementById("password");
    function checkUser(str){
            if(str.length == 0){
                return;
            }else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        var res = this.responseText;
                        if(res == '.0'){
                            alert('Valid username!');
                        }else{
                            alert("Username existed!");
                        }
                    }
                }

                xmlhttp.open("GET","http://localhost:8080/ProjectMusicWeb/register/checkRegister/"+str, true);
                xmlhttp.send();
            }

        }
</script>
