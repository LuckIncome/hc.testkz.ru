require('./vueApp');
import axios from 'axios';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
    

$(function () {
    $('.header-slider').slick({
        slidesToShow: 1,
        arrows: true,
        swipe: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: `<div class="top__slider-arrows arrow-left"><svg width="26" height="47" viewBox="0 0 26 47" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="23.5" width="3.42203" height="33.234" rx="1.71102" transform="rotate(45 23.5 0)" fill="#DBDBDB"/>
        <rect x="25.8052" y="44.6949" width="3.2599" height="33.234" rx="1.62995" transform="rotate(135 25.8052 44.6949)" fill="#DBDBDB"/>
        </svg></div>`,
        nextArrow: `<div class="top__slider-arrows arrow-right"><svg width="26" height="47" viewBox="0 0 26 47" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="3.42203" height="33.234" rx="1.71102" transform="matrix(-0.707107 0.707107 0.707107 0.707107 2.41992 0)" fill="#DBDBDB"/>
        <rect width="3.2599" height="33.234" rx="1.62995" transform="matrix(0.707107 0.707107 0.707107 -0.707107 0.114746 44.6949)" fill="#DBDBDB"/>
        </svg>
        </div>`,
        responsive: [{
            breakpoint: 991,
            settings: {
                arrows: false,
                swipe: true,
                dots: true
            }
        }]
    });

    $('.slider-dots .slider-dots__item').click(function () {
        var $this = $(this);
        $('.header-slider').slick('slickGoTo', $this.data('index'));
        if (!$this.hasClass('active')) {
            $this.siblings().removeClass('active');
            $this.addClass('active');
        }
    });


    $('.top__slider-arrows').click(function () {
        var $dot = $('.slick-current').data('slick-index');
        var items = $('.slider-dots__item');
        jQuery.each(items, function (index) {
            if (index == $dot) {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            }

        });
    });

    $('.gallery__slider').slick({
        slidesToShow: 5,
        arrows: true,
        dots: false,
        variableWidth: true,
        prevArrow: `<div class="gallery__slider-arrows arrow-left"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="10.9424" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(45 10.9424 0)" fill="#C4C4C4"/>
        <rect x="12.1582" y="20.6691" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(135 12.1582 20.6691)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        nextArrow: `<div class="gallery__slider-arrows arrow-right"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(-0.707107 0.707107 0.707107 0.707107 11.0576 0)" fill="#C4C4C4"/>
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(0.707107 0.707107 0.707107 -0.707107 9.8418 20.6691)" fill="#C4C4C4"/>
        </svg>
        </div>`,
    });
    $('.method__slider').slick({
        slidesToShow: 1,
        arrows: true,
        dots: true,
        prevArrow: `<div class="method__slider-arrows arrow-left"><svg width="26" height="47" viewBox="0 0 26 47" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="23.5" width="3.42203" height="33.234" rx="1.71102" transform="rotate(45 23.5 0)" fill="#DBDBDB"/>
        <rect x="25.8052" y="44.6949" width="3.2599" height="33.234" rx="1.62995" transform="rotate(135 25.8052 44.6949)" fill="#DBDBDB"/>
        </svg></div>`,
        nextArrow: `<div class="method__slider-arrows arrow-right"><svg width="26" height="47" viewBox="0 0 26 47" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="3.42203" height="33.234" rx="1.71102" transform="matrix(-0.707107 0.707107 0.707107 0.707107 2.41992 0)" fill="#DBDBDB"/>
        <rect width="3.2599" height="33.234" rx="1.62995" transform="matrix(0.707107 0.707107 0.707107 -0.707107 0.114746 44.6949)" fill="#DBDBDB"/>
        </svg>
        </div>`,
    });

    $('.about-inner__slider').slick({
        slidesToShow: 1,
        arrows: false,
        dots: true
    });

    $('.about-inner__certificates-slider').slick({
        slidesToShow: 6,
        arrows: true,
        dots: false,
        variableWidth: true,
        prevArrow: `<div class="about-inner-cert__slider-arrows arrow-left"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="10.9424" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(45 10.9424 0)" fill="#C4C4C4"/>
        <rect x="12.1582" y="20.6692" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(135 12.1582 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        nextArrow: `<div class="about-inner-cert__slider-arrows arrow-right"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(-0.707107 0.707107 0.707107 0.707107 11.0576 0)" fill="#C4C4C4"/>
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(0.707107 0.707107 0.707107 -0.707107 9.8418 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        responsive: [{
            breakpoint: 767,
            settings: {
                arrows: false,
                dots: true
            }
        }]
    });

    $('.corporate-info__slider').slick({
        slidesToShow: 3,
        arrows: true,
        dots: true,
        centerMode: true,
        variableWidth: true,
        prevArrow: `<div class="corporate-slider-arrows arrow-left"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="10.9424" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(45 10.9424 0)" fill="#C4C4C4"/>
        <rect x="12.1582" y="20.6692" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(135 12.1582 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        nextArrow: `<div class="corporate-slider-arrows arrow-right"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(-0.707107 0.707107 0.707107 0.707107 11.0576 0)" fill="#C4C4C4"/>
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(0.707107 0.707107 0.707107 -0.707107 9.8418 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        responsive: [{
            breakpoint: 1200,
            settings: {
                // slidesToShow:2,
                centerMode: false
            },
            breakpoint: 650,
            settings: {
                arrows: false,
            },
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                arrows: false,
                variableWidth: true,
                centerMode: true
            }
        }]
    });
    $('.corporate-slider-dots .corporate-slider-dots__item').click(function () {
        var $this = $(this);
        $('.corporate-info__slider').slick('slickGoTo', $this.data('index'));
        if (!$(this).hasClass('active')) {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        }
    });
    $('.corporate__news-slider').slick({
        slidesToShow: 3,
        arrows: true,
        centerMode:true,
        variableWidth:true,
        prevArrow: `<div class="corporate-slider-arrows news-slider-left arrow-left"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="10.9424" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(45 10.9424 0)" fill="#C4C4C4"/>
        <rect x="12.1582" y="20.6692" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(135 12.1582 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        nextArrow: `<div class="corporate-slider-arrows news-slider-right arrow-right"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(-0.707107 0.707107 0.707107 0.707107 11.0576 0)" fill="#C4C4C4"/>
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(0.707107 0.707107 0.707107 -0.707107 9.8418 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        responsive: [{
            breakpoint:9999,
            settings: {
                slidesToShow:2,
            }
        }]
    });

    $('.corporate__video-slider').slick({
        slidesToShow: 3,
        arrows: false,
        dots: false,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1345,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
              }
            }
        ]
    });
    $('.corporate__brand-slider').slick({
        slidesToShow: 6,
        arrows: true,
        loop:true,
        dots: false,
        variableWidth: true,
        prevArrow: `<div class="corporate-slider-arrows arrow-left"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="10.9424" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(45 10.9424 0)" fill="#C4C4C4"/>
        <rect x="12.1582" y="20.6692" width="1.71944" height="15.4749" rx="0.859718" transform="rotate(135 12.1582 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
        nextArrow: `<div class="corporate-slider-arrows arrow-right"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(-0.707107 0.707107 0.707107 0.707107 11.0576 0)" fill="#C4C4C4"/>
        <rect width="1.71944" height="15.4749" rx="0.859718" transform="matrix(0.707107 0.707107 0.707107 -0.707107 9.8418 20.6692)" fill="#C4C4C4"/>
        </svg>
        </div>`,
    });


    $('.burger').click(function () {
        $('.hidden__menu').toggleClass('hide-menu');
    });

    $('.header__top-shedule').hover(function () {
        $('.shedule-inner').toggleClass('hide');
        return false;
    });

    $(document).hover(function (event) {
        if ($(event.target).closest(".shedule-inner").length) return;
        $('.shedule-inner').addClass('hide');
    });

    //menu hide btn
    $('.analyses-all__hidden-btn').click(function () {
        $('.analyses-all__left').toggleClass('show-hidden');
        return false;
    });


    $(document).click(function (event) {
        if ($(event.target).closest(".analyses-all__left").length) return;
        $(".analyses-all__left").removeClass('show-hidden');
        event.stopPropagation();
    });


    $('[type="tel"]').mask('+7 (999) 999-99-99');

    $('.methods .btn-lrg .container-hc .btn-request').click(function (event) {
        event.stopPropagation();
    });
    $('.c-modal').click(function (e) {
        e.preventDefault();
        $('#m-call').modal();
        $('#m-call').find('input[name=page]').val($(this).data('page'));
    });
    $('.t-modal').click(function (e) {
        e.preventDefault();
        $('#m-thanks').modal();
    });

    $('#nav-tab input').on('keyup',function (event) {
        let href = $('#nav-tab .links__item.active a').attr('href');
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault(); // Trigger the button element with a click
            location.href = `${href}?search=${this.value}`;
        }
    });

    $('form:not(.page__search)').submit(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        let $form = $(this);
        let url = $form.attr('action');
        let type = $form.attr('method');
        let $inputs = $form.find("input, select, button, textarea");
        let fd = new FormData($form[0]);
        $inputs.prop("disabled", true);
        axios.post(url, fd).then(res => {
            if (res.status === 200) {
                $('#m-call').modal('hide');
                if ($($form).attr('id') === 'subscription'){
                    $('#m-subscribed').modal('show');
                }else {
                    $('#m-thanks').modal('show');
                }
            }
            $inputs.prop("disabled", false);
            $inputs.val("");
            $inputs.prop("checked",false);
        })
    });

    $('.checkup__content a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

function changeLocale(val) {
    axios.get(`/locale/${val}`).then((data) => location.reload());
}

function searchPageFunc(input){
    console.log(document.querySelector('#nav-tab .links__item.active').childNodes)
    if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        location.href = input;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    //Change the top language
    let langSelect = document.querySelectorAll('.lang');
    let langImage = document.querySelectorAll('.top-flag');
    langSelect.forEach((elem) => {
        elem.addEventListener('change', (e) => {
            langImage.forEach((item) => {
                if (e.target.value == 'ru') {
                    item.setAttribute('src', 'img/icons/ru-flag-icon.svg');
                }
                if (e.target.value == 'kz') {
                    item.setAttribute('src', 'img/icons/kz-flag-icon.svg');
                }
                changeLocale(e.target.value);
            });

        });
    });

    //Chanding the weight on the shedule text by date
    let date = new Date();
    const sheduleItem = document.querySelectorAll('.shedule-inner__item');
    sheduleItem.forEach((elem) => {
        if (elem.dataset.day == date.getDay()) {
            elem.children[0].style.cssText = 'font-weight:500;color:#000;';
            elem.children[1].style.cssText = 'font-weight:500;color:#000;';
        }
    });

    const newsItem = document.querySelectorAll('.news__content .item__subtitle');
    newsItem.forEach((elem) => {
        if (elem.innerText.length > 140) {
            elem.innerText = elem.innerText.substr(0, 120) + '...';
        } else {
            elem.innerText = elem.innerText;
        }
    });


    let step = document.querySelectorAll('.step');
    step.forEach((elem) => {
        elem.addEventListener('click', () => {
            if (elem.classList.contains('t-step')) {
                elem.previousElementSibling.classList.add('color-need');
            } else if (!elem.classList.contains('t-step')) {
                elem.classList.remove('color-need');
            }
        });


    });
});
