
            <div class="content2">
                <div class="signupform">
                    <div class="formaa">   
                    <?php
                    if (isset($_SESSION['message'])) {
                        print $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                        <h2>Login</h2>
                        <form action="trigger.php" name ="loginform" method="post"  enctype="multipart/form-data">
                            <input type="hidden" id="action" name="action" value="login">
                            <input type="text" id="username" name="username"  placeholder="Username"/><br />
                            <input type="password" id="password" name="password"  placeholder="Password"/><br />
                            <input type="submit" id="signupnow" value="Sign In" />
                        </form>
                        <p>Don't have an account? <a href="index.php?menu=4">Click here to Sign Up!</a></p>
                    </div>
                </div>
            </div>
            
