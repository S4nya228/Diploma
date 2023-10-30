@vite(['resources/sass/verify-email.scss'])
@if(session('message'))
    <div class="main__info-field">
        <div class="main__info-content">
            {{ session('message') }}
        </div>
    </div>
@endif
<div class="verification-form">
    <form action="{{route('verification.send')}}" method="POST">
        @csrf
        @method('POST')
        <h2>Підтвердження електронної пошти</h2>
        <p>На вашу електронну пошту було надіслано посилання для підтвердження облікового запису.</p>
        <p>Будь ласка, перевірте свою поштову скриньку та перейдіть за посиланням, щоб підтвердити свою електронну пошту.</p>
        <p>Якщо ви не отримали листа з посиланням, перевірте папку "Спам" або <button class="button-submit" type="submit">Натисніть тут</button> щоб надіслати повторне посилання.</p>
    </form>

</div>


