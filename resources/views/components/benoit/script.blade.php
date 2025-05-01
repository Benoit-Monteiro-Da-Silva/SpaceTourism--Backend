<script>
    const oldImage = document.querySelector('.old-image')
    const newImage = document.querySelector('.new-image')
    newImage.addEventListener('change', e => {
        const file = e.target.files[0]
        if (file.type.startsWith('image/')) {
            oldImage.src = URL.createObjectURL(file)
        }
    })
</script>