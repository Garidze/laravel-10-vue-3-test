<template>
    <button type="button" class="btn btn-primary" @click="createElem">Add</button>
    <div class="photoPreview">
        <transition-group name="fade">
            <div class="photoPreview__item" v-for="(img,n) in images" :key="img">
                <img :src="urlImage(img)" alt="" class="photoPreview__img">
                <img src="img/close-black.png" alt="" class="photoPreview__close" @click="removeElem(n)">
            </div>
        </transition-group>
    </div>
    <div class="inputRender"><!-- append input file --></div>
</template>

<script>
export default {
    data() {
        return {
            images: [],
        }
    },
    watch: {
        images: {
            handler(val, oldVal) {
                this.renderInputs();
            },
            // immediate: true,
            deep: true
        },
    },
    methods: {
        createElem() {
            let self = this;
            let inputFile = document.createElement('input');
            inputFile.type = 'file';
            inputFile.accept = 'image/*';
            inputFile.click();
            inputFile.onchange = function () {
                if(this.files[0].type.startsWith('image/')) {
                    // let [file] = this.files; // let file = this.files[0];
                    self.images.push(this.files[0]);
                }
            };
        },
        urlImage(el) {
            return URL.createObjectURL(el);
        },
        removeElem(el) {
            this.images = this.images.filter((i, n) => {
                return n !== el;
            });
            console.log(this.images);
        },
        renderInputs() {
            let inputRender = document.querySelector('.inputRender');
            inputRender.innerHTML = '';

            let inputImage = document.createElement('input');
            inputImage.type = 'file';
            inputImage.name = 'images[]';
            inputImage.hidden = true;

            let dataTransfer = new DataTransfer();
            this.images.forEach(i => {
                dataTransfer.items.add(i);
            })
            inputImage.files = dataTransfer.files;
            inputRender.append(inputImage);
        },
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
