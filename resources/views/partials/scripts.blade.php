<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"
        integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="/js/app.js"></script>
@if(strpos(url()->current(),'korp') !== 0)
    <script>
        $(document).ready(function () {
            if ($(window).width() < 700) {
                let modalBtn = document.querySelectorAll('.mobile-link-change');
                for (let i = 0; i < modalBtn.length; i++) {
                    let newLink = document.createElement('a');
                    for (let cssClass of modalBtn[i].classList) {
                        if (cssClass !== 'c-modal' && cssClass !== 'mobile-link-change') {
                            newLink.classList.add(cssClass);
                        }
                    }
                    newLink.href = '{{setting('site.phone_korp')}}';
                    newLink.innerText = '{{__('general.call')}}';
                    modalBtn[i].parentNode.insertBefore(newLink, modalBtn[i].nextSibling);
                    modalBtn[i].style.display = 'none';
                }
            }
        });
    </script>
@else
    <script>
        $(document).ready(function () {
            if ($(window).width() < 700) {
                let modalBtn = document.querySelectorAll('.mobile-link-change');
                for (let i = 0; i < modalBtn.length; i++) {
                    let newLink = document.createElement('a');
                    for (let cssClass of modalBtn[i].classList) {
                        if (cssClass !== 'c-modal' && cssClass !== 'mobile-link-change') {
                            newLink.classList.add(cssClass);
                        }
                    }
                    newLink.href = '{{setting('site.phone_call')}}';
                    newLink.innerText = '{{__('general.call')}}';
                    modalBtn[i].parentNode.insertBefore(newLink, modalBtn[i].nextSibling);
                    modalBtn[i].style.display = 'none';
                }
            }
        });
    </script>
@endif
