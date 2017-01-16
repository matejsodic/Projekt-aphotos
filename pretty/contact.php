
            <div class="content3"> 
                <div class="contactcc">
                    <div class="contactccc">
                        <h2>Contact</h2>
                        <div class="prvired">
                            <p>Through our social media</p>
                            <div class="iconz2">
                                <div class="iconz3">
                                    <img id="twittericon" src="slike/twicon.png" alt="Twitter" height="25" width="25">
                                    <span class="kek" style=""><a href="#">/imagesrc</a></span>
                                </div>
                                <br>
                                <div class="iconz3">
                                    <img id="instaicon" src="slike/instaicon.png" alt="Instagram" height="25" width="25">
                                    <span class="kek" style=""><a href="#">@imagesrc</a></span>
                                </div>
                                <br>
                                <div class="iconz3">
                                    <img id="faceicon" src="slike/fbicon.png" alt="Face" height="25" width="25">
                                    <span class="kek" style=""><a href="#">/imagesrc</a></span>
                                </div>
                                <br>
                                <p>Or through our email</p>
                                <div class="iconz3">
                                    <img id="emailicon" src="slike/emailicon.png" alt="Email" height="25" width="25">
                                    <span style="">imagesrc@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="karta">
                        <h2>Map</h2>
                        <p><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1424714.832471904!2d16.210267150842288!3d45.77828114692374!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shr!2shr!4v1477050575961" width="80%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                    </div>
                </div>
                <div class="contactform">
                    <div class="contactform2">   
                     <?php
                    if (isset($_SESSION['message'])) {
                        print $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                        <h2>Contact Us Directly</h2>
                        <form action="trigger.php"  name="contactf" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="action" name="action" value="contact">
                            <input type="text" id="msgname" name="msgname"  placeholder="Message Name" required/><br />
                            <input type="text" id="name" name="name"  placeholder="Your Name" required/><br />
                            <input type="email" id="email3" name="email3"  placeholder="E-mail" required/><br />
                              <select name="country" id="country" required>
                                        <option value="">Država</option>';

                                        <?php
                                        $row = @mysqli_fetch_array($result);
                                        $_query  = "SELECT * FROM countries";
                                        $_result = @mysqli_query($MySQL, $_query);
                                        while($_row = @mysqli_fetch_array($_result)) {
                                            print '<option value="' . $_row['country_code'] . '"';
                                                if ($row['user_country'] == $_row['country_code']) { print " selected"; }
                                            print '>' . $_row['country_name'] . '</option>';
                                        }
                                        ?>

                                    </select>
                            <textarea id="txtarea" name="message" placeholder="Write us a message" rows="10" cols="70" required></textarea>
                            <input type="submit" id="submit3" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
            
         