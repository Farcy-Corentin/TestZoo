const btnValidated = document.querySelector('.btn-validated')
const btnRejected = document.querySelector('.btn-rejected')
const divReview = document.querySelector('.card-content-review')



async function updateReview(event, status){
    event.preventDefault()
    const response = await fetch(`/api/admin/zoo/reviews/edit/${divReview.dataset.id}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
        },
        body: JSON.stringify({
            status: status
        }),
    })
    if (response.ok){
        location.reload()
    }
}

if(btnRejected){
    btnRejected.addEventListener(
        'click',
        (e) => updateReview(e, 'rejected')
    )
}

if (btnValidated){
    btnValidated.addEventListener(
        'click',
        (e) => updateReview(e, 'validated')
    )
}

