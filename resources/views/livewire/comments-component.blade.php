<div>
    <div class="pet-page__content-bottom">
        <div class="pet-page__comments">
            <div class="pet-page__comments-top">
                <div class="pet-page__menu">
                    <div class="pet-page__menu-quantity">
                        <?= $this->totalCommentsCount ?> <?= $this->totalCommentsCount === 1 ? 'коментар' : ($this->totalCommentsCount > 1 && $this->totalCommentsCount < 5 ? 'коментарі' : 'коментарів') ?>
                    </div>
                    <div class="pet-page__menu-sort">
                        <div class="pet-page__dropdown-menu">
                            <ul class="pet-page__dropdown-menu-item">
                                <li wire:click="sortByDate" class="pet-page__dropdown-menu-item-link">За датою</li>
                                <li wire:click="sortByPopularity" class="pet-page__dropdown-menu-item-link">За
                                    популярністю
                                </li>
                            </ul>
                        </div>
                        <img src="{{asset("storage/images/sort-comment.svg")}}" alt=""
                             class="pet-page__menu-sort-icon">
                        <div class="pet-page__dropdown-menu-label">Впорядкувати</div>
                    </div>
                </div>
                @auth()
                    <div class="pet-page__send-comment">
                        <form wire:submit.prevent="addComment" class="pet-page__send-comment-form">
                            <div class="pet-page__comment-input">
                            <textarea wire:model.defer="commentContent" class="pet-page__comment-input-area" id="comment-textarea"
                      placeholder="Напишіть коментар">
                            </textarea>
                                @error('commentContent')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                                <div class="pet-page__comment-buttons" id="comment-buttons">
                                    <button class="pet-page__comment-buttons-cancel" id="cancel-button" type="button">
                                        Відміна
                                    </button>
                                    <button class="pet-page__comment-buttons-send" id="send-button" disabled>Відправити коментар</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endauth
                @guest
                    <div class="pet-page__guest">
                        <p>Для того, щоб додавати коментарі, Вам потрібно авторизуватися.</p>
                    </div>
                @endguest
            </div>

            <div class="pet-page__comments-bottom">
                @if($comments->isEmpty())
                    <div class="pet-page__no-comments">
                        <p>
                            На жаль, на дану пропозицію ще немає жодних коментарів. Ми закликаємо Вас бути першими, хто поділиться своїм відгуком.
                        </p>
                    </div>

                @else
                @foreach ($comments as $comment)
                    <div class="pet-page__top">
                        <div class="pet-page__label">
                            <div class="pet-page__top-name">
                                {{ $comment->user->name() }}
                            </div>
                            <div class="pet-page__top-data">
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="pet-page__delete-comment">
                            @auth
                                @if (auth()->user()->role->name === 'Адміністратор' || auth()->user()->id === $comment->user_id)
                                    <button class="pet-page__delete-comment-button"  onclick="showConfirmationModal({{ $comment->id }})">
                                        <i style="color: #356cff;" class="fas fa-trash-alt"></i>
                                    </button>
                                    <div id="confirmation-modal" class="confirmation-modal">
                                        <div class="confirmation-modal-content">
                                            <h5 class="confirmation-modal-title">Ви впевнені, що хочете видалити коментар?</h5>
                                            <div class="confirmation-modal-buttons">
                                                <button class="confirmation-modal-button confirmation-modal-button-no" onclick="hideConfirmationModal()">Відміна</button>
                                                <button id="delete-comment-button" class="confirmation-modal-button confirmation-modal-button-yes" wire:click="deleteComment({{ $comment->id }})">Видалити</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="pet-page__content-comment">
                        {{ $comment->content }}
                    </div>
                    <div class="pet-page__liked">
                        <div class="pet-page__like">
                            @auth
                                <button wire:click="likeComment({{ $comment->id }})" class="pet-page__like-button ">
                                    @if($comment->likeComment()->where('user_id', auth()->user()->id)->where('interaction_type', 'like')->get()->count() > 0)
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.77 11H14.54L16.06 6.06C16.38 5.03 15.54 4 14.38 4C13.8 4 13.24 4.24 12.86 4.65L7 11H3V21H7H8H17.43C18.49 21 19.41 20.33 19.62 19.39L20.96 13.39C21.23 12.15 20.18 11 18.77 11ZM7 20H4V12H7V20ZM19.98 13.17L18.64 19.17C18.54 19.65 18.03 20 17.43 20H8V11.39L13.6 5.33C13.79 5.12 14.08 5 14.38 5C14.64 5 14.88 5.11 15.01 5.3C15.08 5.4 15.16 5.56 15.1 5.77L13.58 10.71L13.18 12H14.53H18.76C19.17 12 19.56 12.17 19.79 12.46C19.92 12.61 20.05 12.86 19.98 13.17Z"
                                                  fill="black"/>
                                            <path d="M7 20H4V12H7V20Z" fill="#356CFF"/>
                                            <path d="M19.98 13.17L18.64 19.17C18.54 19.65 18.03 20 17.43 20H8V11.39L13.6 5.33C13.79 5.12 14.08 5 14.38 5C14.64 5 14.88 5.11 15.01 5.3C15.08 5.4 15.16 5.56 15.1 5.77L13.58 10.71L13.18 12H14.53H18.76C19.17 12 19.56 12.17 19.79 12.46C19.92 12.61 20.05 12.86 19.98 13.17Z"
                                                  fill="#356CFF"/>
                                        </svg>
                                    @else
                                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.77 11H14.54L16.06 6.06C16.38 5.03 15.54 4 14.38 4C13.8 4 13.24 4.24 12.86 4.65L7 11H3V21H7H8H17.43C18.49 21 19.41 20.33 19.62 19.39L20.96 13.39C21.23 12.15 20.18 11 18.77 11ZM7 20H4V12H7V20ZM19.98 13.17L18.64 19.17C18.54 19.65 18.03 20 17.43 20H8V11.39L13.6 5.33C13.79 5.12 14.08 5 14.38 5C14.64 5 14.88 5.11 15.01 5.3C15.08 5.4 15.16 5.56 15.1 5.77L13.58 10.71L13.18 12H14.53H18.76C19.17 12 19.56 12.17 19.79 12.46C19.92 12.61 20.05 12.86 19.98 13.17Z"
                                                  fill="black"/>
                                        </svg>
                                    @endif

                                </button>
                            @endauth
                                @guest
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.77 11H14.54L16.06 6.06C16.38 5.03 15.54 4 14.38 4C13.8 4 13.24 4.24 12.86 4.65L7 11H3V21H7H8H17.43C18.49 21 19.41 20.33 19.62 19.39L20.96 13.39C21.23 12.15 20.18 11 18.77 11ZM7 20H4V12H7V20ZM19.98 13.17L18.64 19.17C18.54 19.65 18.03 20 17.43 20H8V11.39L13.6 5.33C13.79 5.12 14.08 5 14.38 5C14.64 5 14.88 5.11 15.01 5.3C15.08 5.4 15.16 5.56 15.1 5.77L13.58 10.71L13.18 12H14.53H18.76C19.17 12 19.56 12.17 19.79 12.46C19.92 12.61 20.05 12.86 19.98 13.17Z"
                                              fill="black"/>
                                    </svg>
                                @endguest

                            <span class="theme-comment__like-count">{{ $comment->likesCount('like') }}</span>
                        </div>
                        <div class="pet-page__dislike">
                            @auth
                                <button wire:click="dislikeComment({{ $comment->id }})" class="pet-page__dislike-button">
                                    @if($comment->likeComment()->where('user_id', auth()->user()->id)->where('interaction_type', 'dislike')->get()->count() > 0)
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.23 13H9.46L7.94 17.94C7.62 18.97 8.46 20 9.62 20C10.2 20 10.76 19.76 11.14 19.35L17 13H21L21 3H17H16H6.57C5.51 3 4.59 3.67 4.38 4.61L3.04 10.61C2.77 11.85 3.82 13 5.23 13ZM17 4H20L20 12H17V4ZM4.02 10.83L5.36 4.83C5.46 4.35 5.97 4 6.57 4H16V12.61L10.4 18.67C10.21 18.88 9.92 19 9.62 19C9.36 19 9.12 18.89 8.99 18.7C8.92 18.6 8.84 18.44 8.9 18.23L10.42 13.29L10.82 12H9.47H5.24C4.83 12 4.44 11.83 4.21 11.54C4.08 11.39 3.95 11.14 4.02 10.83Z"
                                                  fill="black"/>
                                            <path d="M17 4H20L20 12H17V4Z" fill="#356CFF"/>
                                            <path d="M4.02 10.83L5.36 4.83C5.46 4.35 5.97 4 6.57 4H16V12.61L10.4 18.67C10.21 18.88 9.92 19 9.62 19C9.36 19 9.12 18.89 8.99 18.7C8.92 18.6 8.84 18.44 8.9 18.23L10.42 13.29L10.82 12H9.47H5.24C4.83 12 4.44 11.83 4.21 11.54C4.08 11.39 3.95 11.14 4.02 10.83Z"
                                                  fill="#356CFF"/>
                                        </svg>
                                    @else
                                        <svg width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.7501 4H16.7501H7.32007C6.25007 4 5.34007 4.67 5.13007 5.61L3.79007 11.61C3.52007 12.85 4.57007 14 5.98007 14H10.2101L8.69007 18.94C8.37007 19.97 9.21007 21 10.3701 21C10.9501 21 11.5101 20.76 11.8901 20.35L17.7501 14H21.7501V4H17.7501ZM11.1501 19.67C10.9601 19.88 10.6701 20 10.3701 20C10.1101 20 9.87007 19.89 9.74007 19.7C9.67007 19.6 9.59007 19.44 9.65007 19.23L11.1701 14.29L11.5701 13H10.2101H5.98007C5.57007 13 5.18007 12.83 4.95007 12.54C4.83007 12.39 4.70007 12.14 4.77007 11.82L6.11007 5.82C6.21007 5.35 6.72007 5 7.32007 5H16.7501V13.61L11.1501 19.67ZM20.7501 13H17.7501V5H20.7501V13Z"
                                                  fill="black"/>
                                        </svg>
                                    @endif
                                </button>
                            @endauth
                            @guest
                                    <svg width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.7501 4H16.7501H7.32007C6.25007 4 5.34007 4.67 5.13007 5.61L3.79007 11.61C3.52007 12.85 4.57007 14 5.98007 14H10.2101L8.69007 18.94C8.37007 19.97 9.21007 21 10.3701 21C10.9501 21 11.5101 20.76 11.8901 20.35L17.7501 14H21.7501V4H17.7501ZM11.1501 19.67C10.9601 19.88 10.6701 20 10.3701 20C10.1101 20 9.87007 19.89 9.74007 19.7C9.67007 19.6 9.59007 19.44 9.65007 19.23L11.1701 14.29L11.5701 13H10.2101H5.98007C5.57007 13 5.18007 12.83 4.95007 12.54C4.83007 12.39 4.70007 12.14 4.77007 11.82L6.11007 5.82C6.21007 5.35 6.72007 5 7.32007 5H16.7501V13.61L11.1501 19.67ZM20.7501 13H17.7501V5H20.7501V13Z"
                                              fill="black"/>
                                    </svg>
                                @endguest
                            <span class="theme-comment__dislike-count">{{ $comment->likesCount('dislike') }}</span>
                        </div>
                    </div>
                @endforeach
                @if (!$showMore && $comments->hasPages() && $comments->currentPage() < $comments->lastPage())
                    <button wire:click="showMore">Показати ще</button>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    let commentIdToDelete;

    function showConfirmationModal(commentId) {
        commentIdToDelete = commentId;
        const confirmationModal = document.getElementById('confirmation-modal');
        confirmationModal.style.display = 'block';
    }

    function hideConfirmationModal() {
        const confirmationModal = document.getElementById('confirmation-modal');
        confirmationModal.style.display = 'none';
    }

    function deleteComment() {
        hideConfirmationModal();
    }
</script>
