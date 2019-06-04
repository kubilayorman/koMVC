
<div class="wrapper--top" id="wrapper--top">

    <div class="slogan">
        <a href="<?php echo URLROOT; ?>/pages/about" class="slogan__link">
            <p class="slogan__text1"><span>Kubilay Orman</span></p>
            <p class="slogan__text2"><span>Business & Web Developer</span> with an emphasis on user experiences.</p>
        </a>
    </div>

    <div class="header">
        <nav class="user-nav">

            <ul class="user-nav__list">
                <li class="user-nav__item"><a href="<?php echo URLROOT; ?>/pages/about" class="user-nav__link ">Who?</a></li>
                <li class="user-nav__item"><a href="<?php echo URLROOT; ?>/pages/services" class="user-nav__link">What?</a></li>
                <li class="user-nav__item"><a href="<?php echo URLROOT; ?>/cases/index" class="user-nav__link">When?</a></li>
                <li class="user-nav__item"><a href="<?php echo URLROOT; ?>/pages/process" class="user-nav__link">How?</a></li>
                <li class="user-nav__item user-nav__item--black"><a href="<?php echo URLROOT; ?>/insights/index" class="user-nav__link user-nav__link--black">Insights</a></li>
                <li class="user-nav__item user-nav__item--black"><a href="<?php echo URLROOT; ?>/pages/contact" class="user-nav__link user-nav__link--black">Contact</a></li>
            </ul>

        </nav>

        <form action="<?php echo URLROOT; ?>/searchs/index" method="post" class="search">
                <input type="text" class="search__input" placeholder="Search among insights..." name="search" autocomplete="off">
                <button class="search__button">
                    <svg class="search__icon">
                        <use xlink:href="<?php echo URLROOT; ?>/public/img/sprite.svg#icon-magnifying-glass"></use>  
                    </svg>
                </button>
        </form>
    </div>
    
</div>