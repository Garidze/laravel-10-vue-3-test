<template>
    <div>
        <button type="button" class="btn btn-primary" @click="uploadFile">Add photo</button>
        <div class="photoPreview"></div>
        <small v-if="fileTypeError">*file type must be an image</small>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fileTypeError: false,
        }
    },
    methods: {
        uploadFile() {
            let self = this;
            let input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("name", "image[]");
            input.setAttribute("hidden", "");
            input.setAttribute("accept", "image/*");
            let photoPreview = document.querySelector('.photoPreview');
            input.click();
            input.onchange = function () {
                if (this.files[0].type.startsWith('image/')) {
                    photoPreview.append(input);
                    self.fileTypeError = false;
                } else {
                    self.fileTypeError = true;
                }
            }
        },
    },
    computed: {

    }
    // mounted() {
    //     console.log('Component mounted.')
    // }
}
</script>

<style lang="scss" scoped>
.photoPreview {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 2px;
    gap: 2px;
}

input[name='image[]'] {
    width: 100%;
}

small {
    color: var(--text-danger);
}
</style>
