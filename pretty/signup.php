
            <div class="content2">
                <div class="signupform">
                    <div class="formaa">   
                    <?php if (isset($_SESSION['message'])) {
                        print $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                        <h2>Sign Up</h2>
                        <form action="trigger.php" name="regform" method="post" enctype="mulltipart/form-data">
                            <input type="hidden" id="action" name="action" value="registration">
                            <input type="text" id="username" name="username"  placeholder="Username" required/><br />
                            <input type="email" id="email2" name="email"  placeholder="E-mail" required/><br />
                            <input type="password" id="password" name="password"  placeholder="Password" required/><br />
                            <input type="password" id="password2" name="password2"  placeholder="Confirm Password" required/><br />
                            <input type="submit" id="signupnow" value="Sign Up Now" />
                            <input type="reset" id="cancelnow" value="Cancel" />
                        </form>
                        <p>Already have an account? <a href="index.php?menu=5">Login Here!</a></p>
                    </div>
                </div>
            </div>
            
  