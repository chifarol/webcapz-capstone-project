<?php ?>
<script>
    const newCategoryField = document.querySelector('#new-category-field');
    const parentCategoryField = document.querySelector('#parent-category-field');
    const createCategoryButton = document.querySelector('#create-new-category');
    const categoriesList = document.querySelector('#categories-list');
    const imageUploadForm = document.querySelector('#image-upload-form');
    const imageUploadInput = document.querySelector('#image-upload-input');
    const imageUploadUrlInput = document.querySelector('#image-upload-url-input');
    const postImage = document.querySelector('#post-image');
    const imageList = document.querySelector('#image-list');
    const uploadFeedback = document.querySelector('#upload-feedback');
    const basicModal = document.querySelector('#basicModal');

    createCategoryButton.addEventListener('click', () => {
        const newCategoryName = newCategoryField.value
        const parentCategoryid = parentCategoryField.value

        fetch(
            `functions/categories-handler.php?new-category=${newCategoryName}&parent-category=${parentCategoryid}`
        )
            .then((response) => response.json())
            .then((data) => {
                console.log(data, newCategoryName, parentCategoryid)
                if (data.successful) {
                    categoriesList.innerHTML += `
            <div class='form-check mt-3'>
            <input class='form-check-input' type='checkbox' value="${data.new_category_id}" id='defaultCheck1' name='category' form='create-post-form'>

            <label class='form-check-label' for='defaultCheck1'>${newCategoryName}</label>
            </div>`;
                    parentCategoryField.innerHTML += `<option value="${data.new_category_id}">${newCategoryName}</option>`;
                }
            });


        // fetch post method equivalent

        // fetch(
        // `functions/categories-handler.php`,
        // {
        // method: 'POST',
        // headers: {
        //   'Accept': 'application/json',
        //   'Content-Type': 'application/json'
        // },
        // body:JSON.stringify({"new-category":newCategoryName,"parent-category":parentCategoryid})
        // }
        // )
        // .then((response) => response.json())
        // .then((data) => console.log(data));


    })
    // upload image
    imageUploadInput.addEventListener('change', event => {
        const formData = new FormData()
        for (const file of event.target.files) {
            formData.append('files[]', file)
        }
        fetch('functions/image-upload-handler.php', {
            method: 'POST',
            body: formData
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.successful) {
                    uploadFeedback.innerHTML = data.message
                    uploadFeedback.className = "text-success";
                    imageList.innerHTML += `
                <img src="/webcapz-capstone-project/dashboard-admin/php/${data.image_path}" style="width:120px;height:120px;object-fit:cover" />
                `
                    attachImageUrlUpdateFxn()
                } else {
                    uploadFeedback.innerHTML = data.message
                    uploadFeedback.className = "text-danger";
                }
                console.log(data)
            });
    });
    function attachImageUrlUpdateFxn() {
        const images = document.querySelectorAll('#image-list img');
        images.forEach(image => {
            image.addEventListener('click', (event) => {
                const imgSrc = event.target.src
                console.dir(imgSrc)
                imageUploadUrlInput.value = imgSrc;
                basicModal.click()
                postImage.src = imgSrc;
            })
        })
    }
    attachImageUrlUpdateFxn()
</script>