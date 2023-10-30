<div class="alert-top">
    @if($isFavorite)
        <button  wire:click="addToFavorite({{ $proposalId }})"
                onclick="showMessage('Пропозиція була видалена зі списку улюблених.')">
            <svg  width="30" height="30" viewBox="0 0 24 22" fill="#356cff" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.8333 7.6005C22.8371 9.2675 22.1948 10.8711 21.0415 12.0747C18.3971 14.8166 15.8317 17.6755 13.0898 20.3167C12.4604 20.9125 11.4627 20.8908 10.8614 20.2679L2.95849 12.0758C0.569744 9.5993 0.569744 5.60175 2.95849 3.12633C3.52306 2.53375 4.20209 2.06198 4.95442 1.73964C5.70674 1.41729 6.51669 1.25108 7.33516 1.25108C8.15363 1.25108 8.96358 1.41729 9.7159 1.73964C10.4682 2.06198 11.1473 2.53375 11.7118 3.12633L12 3.42317L12.2871 3.12633C12.8528 2.53515 13.532 2.06425 14.2841 1.74184C15.0361 1.41942 15.8455 1.25214 16.6637 1.25C18.3104 1.25 19.8845 1.926 21.0404 3.12633C22.1942 4.32975 22.8368 5.93337 22.8333 7.6005Z"
                      stroke="#356cff" stroke-width="1.5" stroke-linejoin="round"/>
            </svg>
        </button>
    @else
        <button  wire:click="addToFavorite({{ $proposalId }})"
                onclick="showMessage('Пропозиція була додана до списку улюблених.')">
            <svg  width="30" height="30" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.8333 7.6005C22.8371 9.2675 22.1948 10.8711 21.0415 12.0747C18.3971 14.8166 15.8317 17.6755 13.0898 20.3167C12.4604 20.9125 11.4627 20.8908 10.8614 20.2679L2.95849 12.0758C0.569744 9.5993 0.569744 5.60175 2.95849 3.12633C3.52306 2.53375 4.20209 2.06198 4.95442 1.73964C5.70674 1.41729 6.51669 1.25108 7.33516 1.25108C8.15363 1.25108 8.96358 1.41729 9.7159 1.73964C10.4682 2.06198 11.1473 2.53375 11.7118 3.12633L12 3.42317L12.2871 3.12633C12.8528 2.53515 13.532 2.06425 14.2841 1.74184C15.0361 1.41942 15.8455 1.25214 16.6637 1.25C18.3104 1.25 19.8845 1.926 21.0404 3.12633C22.1942 4.32975 22.8368 5.93337 22.8333 7.6005Z"
                      stroke="#356cff" stroke-width="1.5" stroke-linejoin="round"/>
            </svg>
        </button>
    @endif
</div>

<style>
    .custom-message {
        font-family: Montserrat;
        position: fixed;
        top: 160px;
        left: 50%;
        transform: translateX(-50%);
        padding: 10px 20px;
        background-color: #356cff;
        color: white;
        border-radius: 5px;
        animation: fadeOut 3s ease-in-out forwards;
        z-index: 9999;
        animation-duration: 3s;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
</style>

<script>
    function showMessage(message) {
        var customMessage = document.createElement('div');
        customMessage.className = 'custom-message';
        customMessage.innerHTML = message;

        document.body.appendChild(customMessage);

        setTimeout(function () {
            customMessage.remove();
        }, 4000);
    }
</script>
