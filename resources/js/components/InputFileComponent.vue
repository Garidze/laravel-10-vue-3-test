<template>
    <div class="photoPreview">
        <div class="photoPreview__item photoPreview__item-addButton">
            <label for="images">Add image</label>
            <input type="file"
                   name="images[]"
                   accept="image/*"
                   id="images"
                   @change="addImage"
                   multiple
            >
        </div>

        <div class="photoPreview__item" v-if="imageSrc.length > 0" v-for="(i, n) in imageSrc">
            <img :src="i" alt="" class="photoPreview__img">
            <img src="img/close-red.png" alt="" class="photoPreview__close" @click="delImage($event, n)">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dataTransfer: new DataTransfer(),
            imageSrc: [],
        }
    },
    methods: {

        addImage(e) {
            let [...file] = e.target.files;
            file.forEach(i=> {
                if(i.type.startsWith('image/')){
                    let imgSrc = URL.createObjectURL(i);
                    this.imageSrc.push(imgSrc);
                    this.dataTransfer.items.add(i);
                    // console.log(this.dataTransfer.items);
                    // console.log(inputImg.files);
                }
            });
            e.target.files = this.dataTransfer.files;
        },

        delImage(e, n) {
            this.imageSrc = this.imageSrc.filter((el, idx) => idx !== n );
            this.dataTransfer.items.remove(n);
            let inputImg = document.getElementById('images');
            inputImg.files = this.dataTransfer.files;
            //     [...files] = inputImg.files,
            //     dataTransfer = new DataTransfer();
            // files.forEach((el, idx) => {
            //     if(idx!==n) dataTransfer.items.add(el);
            // })
            // this.dataTransfer.items.clear();
            // console.log(this.dataTransfer.items);
        }

        // uploadFile() {
        //     let self = this;
        //     let input = document.createElement("input");
        //     input.setAttribute("type", "file");
        //     input.setAttribute("name", "image[]");
        //     input.setAttribute("hidden", "");
        //     input.setAttribute("accept", "image/*");
        //     input.click();
        //     input.onchange = function () {
        //         if (this.files[0].type.startsWith('image/')) {
        //             self.fileTypeError = false;
        //
        //             self.previewImage = false;
        //             let photoPreview = document.querySelector('.photoPreview'),
        //                 photoPreviewItem = document.createElement('div');
        //
        //                 imgPreview = document.createElement('img'),
        //                 imgClose = document.createElement('img'),
        //                 [file] = this.files;
        //             photoPreviewItem.setAttribute("class", "photoPreview__item");
        //             imgPreview.setAttribute("class", "photoPreview__img");
        //             imgPreview.setAttribute("src", URL.createObjectURL(file));
        //             imgClose.setAttribute("class", "photoPreview__close");
        //             imgClose.setAttribute("@click", self.delItem);//not work
        //             imgClose.setAttribute("src", "img/close-red.png");
        //
        //             photoPreviewItem.append(imgPreview);
        //             photoPreviewItem.append(imgClose);
        //             photoPreviewItem.append(this);
        //
        //             photoPreview.append(photoPreviewItem);
        //
        //         } else {
        //             self.fileTypeError = true;
        //         }
        //     }
        // },
    },
    computed: {

    }
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
