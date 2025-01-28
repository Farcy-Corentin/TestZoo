const form = document.querySelector('.form')

async function handleSubmit(event){
    event.preventDefault()
    const reviewData = Object.fromEntries(new FormData(form))

    const response = await fetch("/api/admin/zoo/reviews/create", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
        },
        body: JSON.stringify(reviewData)
    })
    if(response.ok){
        location.reload()
    }
}

form.addEventListener('submit', handleSubmit)

document.querySelector('.menu-burger').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.nav-header').classList.toggle('menu-active');
});
