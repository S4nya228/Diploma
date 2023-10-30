@vite(["resources/sass/footer.scss"])
<footer class="footer">
    <div class="footer__container">
        <div class="footer__top">
            <div class="footer__top-info">
                <div class="footer__logo">
                    <img src="{{asset("storage/images/home_logo.svg")}}" alt="" class="footer__logo-icon">
                </div>
                <div class="footer__content">
                    <div class="footer__list">
                        <ul class="footer__list-item-left">
                            <li class="footer__list-item-link"><a class="footer__list-item-link-hover" href="https://www.kmu.gov.ua/"><p>Урядовий портал</p></a></li>
                            <li class="footer__list-item-link"><a class="footer__list-item-link-hover" href="https://carpathia.gov.ua/"><p>Закарпатська ОДА</p></a></li>
                        </ul>
                        <ul class="footer__list-item-right">
                            <li class="footer__list-item-link"><a class="footer__list-item-link-hover" href="https://www.president.gov.ua/"><p>Президент України</p></a></li>
                            <li class="footer__list-item-link"><a class="footer__list-item-link-hover" href="https://www.rada.gov.ua/"><p>Верховна Рада України</p></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer__informations">
                <ul class="footer__informations-list">
                    <li class="footer__informations-list-item">(0312) 61-31-40</li>
                    <li class="footer__informations-list-item"><a class="footer__informations-list-item-email"
                                                                  href="mailto:admin@zak-rada.gov.ua">admin@zak-rada.gov.ua</a></li>
                    <li class="footer__informations-list-item">88008, м. Ужгород, пл. Народна, 4</li>
                </ul>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__copyright">
                <p>All rights reserved | Copyright © 2023</p>
            </div>
            <div class="footer__social-networks">
                <ul class="footer__social-networks-list">
                    <li class="footer__social-networks-item"><a href="https://www.facebook.com/odazakarpattya" class="footer__social-networks-link"><img
                                    src="{{asset("storage/images/facebook.svg")}}" alt="#" class="footer__social-networks-image"></a></li>
                    <li class="footer__social-networks-item"><a href="https://www.instagram.com/verkhovna_rada_of_ukraine/" class="footer__social-networks-link"><img
                                    src="{{asset("storage/images/inst.svg")}}" alt="#" class="footer__social-networks-image"></a></li>
                    <li class="footer__social-networks-item"><a href="https://twitter.com/verkhovna_rada" class="footer__social-networks-link"><img
                                    src="{{asset("storage/images/twiter.svg")}}" alt="#" class="footer__social-networks-image"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>