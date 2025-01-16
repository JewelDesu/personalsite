function handleSubmit(event) {
    event.preventDefault();
    const url = './';
    const formData = new FormData(form)
    fetch(url,{
        method: 'post',
        body: formData
    });
}