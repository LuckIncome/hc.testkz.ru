<!-- modal request start -->
<div class="modal fade modal__form call-modal" id="m-call" tabindex="-1" role="dialog"
     aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal__form__info call-modal__info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal__form__title call-modal__title">@lang('general.feedbackModalTitle')</div>
                <div class="form-c-block">
                    <form action="{{route('feedback')}}" method="POST">
                        @csrf
                        <label for="m-name">@lang('general.fullnameAbr')<sup>*</sup></label>
                        <input name="name" type="text" id="m-name" required>
                        <label for="m-phone">@lang('general.yourPhone')<sup>*</sup></label>
                        <input name="phone" type="tel" id="m-phone" required>
                        <div class="agreement">
                            <input name="agreement" type="checkbox" id="agreement" required>
                            <label for="agreement">@lang('general.agreementText')</label>
                        </div>
                        <input type="hidden" name="page" value="">
                        <input type="hidden" name="url" value="{{url()->current()}}">
                        <button type="submit" class="btn-request">@lang('general.send')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal request end -->
<!-- modal thanks start -->
<div class="modal fade modal__form thanks-modal" id="m-thanks" tabindex="-1" role="dialog"
     aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal__form__info thanks-modal__info">
                <picture>
                    <img src="/img/thanks-round.svg" alt="thanks">
                </picture>
                <div class="thanks-modal__title">@lang('general.thanks')</div>
                <div class="thanks-modal__subtitle">
                    @lang('general.requestSend')
                    @lang('general.callbackAns')
                </div>
                <a href="#" class="btn-request" data-dismiss="modal" aria-label="Close">@lang('general.close')</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal__form thanks-modal" id="m-subscribed" tabindex="-1" role="dialog"
     aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal__form__info thanks-modal__info">
                <picture>
                    <img src="/img/thanks-round.svg" alt="thanks">
                </picture>
                <div class="thanks-modal__title">@lang('general.thanks')</div>
                <div class="thanks-modal__subtitle">
                    @lang('general.subscribedThanks')
                </div>
                <a href="#" class="btn-request" data-dismiss="modal" aria-label="Close">@lang('general.close')</a>
            </div>
        </div>
    </div>
</div>
<!-- modal thanks end -->
