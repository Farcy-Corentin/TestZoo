let error = ""
const carouselContent = document.querySelector(".carousel-content")
const section = document.querySelector(".section-reviews")
const carousel = document.querySelector(".carousel")
const errorContainer = document.getElementById("error-container")
let currentIndex = 0
const btnPrevious = document.querySelector(".btn-previous")
const btnNext = document.querySelector(".btn-next")

let reviews = []

async function getReviews() {
    try {
        const response = await fetch("/api/admin/zoo/reviews")
        reviews = await response.json()
        makeCarousel(reviews, currentIndex)
    } catch (e) {
        errorContainer.textContent = `Erreur: ${e.message}`
        carouselContent.innerHTML = ""
    }
}

function makeCarousel(reviews, index) {
    if (reviews.length === 0) {
        carouselContent.innerHTML = "<p>Aucun avis disponible.</p>"
        return
    }

    carouselContent.innerHTML = ""

    const title = document.createElement("h3")
    title.textContent = reviews[index].author

    const rating = document.createElement("p")
    rating.textContent = `Rating: ${reviews[index].rating}`

    const content = document.createElement("p")
    content.textContent = reviews[index].content

    carouselContent.appendChild(title)
    carouselContent.appendChild(rating)
    carouselContent.appendChild(content)
}

function previous() {
    if (currentIndex <= 0) {
        currentIndex = reviews.length - 1
    } else {
        currentIndex -= 1
    }
    makeCarousel(reviews, currentIndex)
}

function next() {
    if (currentIndex >= reviews.length - 1) {
        currentIndex = 0
    } else {
        currentIndex += 1
    }
    makeCarousel(reviews, currentIndex)
}

btnPrevious.addEventListener("click", previous)
btnNext.addEventListener("click", next)

void getReviews()
