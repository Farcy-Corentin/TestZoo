const allStars = document.querySelectorAll('.rating-icon')
let currentRating = 0
const inputRating = document.querySelector('.input-rating')

function handleMouseEnter(event) {
    const reviewValue = parseInt(event.target.dataset.reviewValue)
    highlightStars(reviewValue)
}

function handleMouseLeave() {
    highlightStars(currentRating)
}

function handleClick(event) {
    currentRating = parseInt(event.target.dataset.reviewValue)
    const rating = highlightStars(currentRating)
    inputRating.value = rating
}

function highlightStars(rating) {
    allStars.forEach(star => {
        const starValue = parseInt(star.dataset.reviewValue)

        if (starValue <= rating) {
            star.classList.add('star-active')
            star.src = 'asset/icons/fill-star.svg'
        } else {
            star.classList.remove('star-active')
            star.src = 'asset/icons/empty-star.svg'
        }
    })
    return rating
}

allStars.forEach(star => {
    star.addEventListener('mouseenter', handleMouseEnter)
    star.addEventListener('mouseleave', handleMouseLeave)
    star.addEventListener('click', handleClick)
})


