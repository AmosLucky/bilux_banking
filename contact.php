<?php

require "header.php";

?>
            
                <section id="video" class="how-it-works animate"> 
                            <h3 class="how-it-works__title animate__item animate__item_opacity animate__item_top">
                                Contact Us</h3> 
                            <p class="how-it-works__posttitle animate__item animate__item_opacity animate__item_top animate__item_delay_1">
				Whether you have a specific question or need assistance, we're here for you.
			</p> 
                        <div class=" how-it-works__row"> 
                            <div class="col-lg-6 animate"> 
                                <div class="how-it-works__col animate__item animate__item_opacity animate__item_top"> 
                                    <div class="how-it-works__text"> 
                                        <h3>Help Center</h3>
                                    </div> 
                                    <div class="how-it-works__cards"> 
                                        <div class="how-it-works__decor"> 
                                            <div class="how-it-works__decor-item"></div> 
                                            <div class="how-it-works__decor-item"></div> 
                                        </div> 
                                        <div class="how-it-works__card how-it-works__card_first animate__item animate__item_opacity animate__item_right animate__item_delay_1"> 
                                            <img class="how-it-works__avatar" src="images/contact/email.png" alt=" "> 
                                            <div class="how-it-works__description"> 
                                                <div class="how-it-works__name">Email</div> 
                                                <p class="how-it-works__action"></p>
                                            </div> 
                                        </div> 
                                        <a href="#"><div class="how-it-works__card how-it-works__card_second animate__item animate__item_opacity animate__item_left animate__item_delay_2"> 
                                            <img class="how-it-works__avatar" src="images/contact/telegram.png" alt=" "> 
                                            <div class="how-it-works__description"> 
                                                <div class="how-it-works__name">Telegram</div> 
                                                <p class="how-it-works__action"></p> 
                                            </div> 
                                        </div> </a>
                                        <div class="how-it-works__card how-it-works__card_third animate__item animate__item_opacity animate__item_right  animate__item_delay_3"> 
                                            <img class="how-it-works__avatar" src="images/contact/phone.png" alt=" ">  
                                            <div class="how-it-works__description"> 
                                                <div class="how-it-works__name">Phone</div> 
                                                <p class="how-it-works__action"></p> 
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                        </section> 
                <div class="auth-content"> 
                            <div class="auth-content__title auth-content__title_form">Contact Us</div> 
                            <form action="" method="post" class="form validator auth_form"> 
                                                                <div class="field"> 
                                        <label class="field__label">Name</label> 
                                    <input class="field__input" type="text" name="name" value="" required> 
                                </div>  
                                <div class="field"> 
                                    <label class="field__label">Email Address</label> 
                                    <input class="field__input" type="text" name="email" value="" required> 
                                </div>
                                <div class="field"> 
                                    <label class="field__label">Subject</label> 
                                    <input class="field__input" type="text" name="subject" value="" required> 
                                </div>
                                <div class="field"> 
                                    <label class="field__label">Message</label> 
                                    <textarea class="field__input" type="text" name="msg" rows="6" value="" required> </textarea>
                                </div>
                                <div class="buttons-row"> 
                                    <button type="submit" name="send" class="auth-content__button auth-content__button_md">send</button>   
                                </div> 
                            </form> 
                        </div>
        </div> 
    </main> 
    
    <!-- Footer -->
    <?php

    require "footer.php";
    
    ?>