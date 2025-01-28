const contactForm = document.querySelector('.form-contact-us')

async function handleSubmit(event) {
    event.preventDefault()

    const formData = new FormData(contactForm)
    const contactData = Object.fromEntries(formData)
    const response = await fetch("/api/contact", {
        method: 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(contactData),
    })

    if (response.ok) {
        location.reload()
    }
}

contactForm.addEventListener('submit', handleSubmit)
