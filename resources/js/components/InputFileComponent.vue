<template>
    <button type="button" class="btn btn-primary" @click="createElem">Add</button>
    <div class="photoPreview">
        <!--append section-->
    </div>
</template>

<script>
export default {
    data() {
        return {
            images: []
        }
    },
    methods: {
        createElem() {
            let self = this;
            let inputFile = document.createElement('input');
            inputFile.setAttribute("type", "file");
            inputFile.setAttribute("hidden", "");
            inputFile.setAttribute("accept", "image/*");
            inputFile.click();
            inputFile.onchange = function () {
                if(this.files[0].type.startsWith('image/')) {
                    // let [file] = this.files; // let file = this.files[0];
                    self.images.push(this.files[0]);
                    console.log(self.images);
                    let imgSrc = URL.createObjectURL(this.files[0]);
                    let photoPreviewItem = document.createElement('div');
                    photoPreviewItem.classList.add('photoPreview__item');
                    photoPreviewItem.innerHTML = `<img src="${imgSrc}" alt="" class="photoPreview__img">`;
                    let btnClose = document.createElement('img');
                    btnClose.classList.add('photoPreview__close');
                    btnClose.src = 'img/close-black.png';
                    btnClose.addEventListener('click', function () {
                        this.closest('.photoPreview__item').remove();
                    });
                    photoPreviewItem.append(btnClose);

                    let inputImage = document.createElement('input');
                    inputImage.type = 'file';
                    inputImage.name = 'images[]';
                    inputImage.files = this.files;
                    inputImage.hidden = true;
                    photoPreviewItem.append(inputImage);

                    let photoPreview = document.querySelector('.photoPreview');
                    photoPreview.append(photoPreviewItem);
                }
            };
        }
    },
    // computed: {
    //     //
    // },
    // mounted() {
    //     console.log('Component mounted.')
    // }
}
</script>

<style lang="scss">

input[name='image[]'] {
    width: 100%;
}

small {
    color: var(--text-danger);
}

</style>
