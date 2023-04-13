<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;1,300;1,400&amp;family=Roboto+Condensed:wght@300;400;700&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Main page</title>
</head>
<body>
<div class="content" id="app">
    <form action="{{ route('store') }}" class="form" method="post" enctype="multipart/form-data" id="form">
        @csrf
        <div class="form__title">
            <h3>Create post</h3>
        </div>

        <!--Standard inputs-->
        <div class="form__item">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" @error('title') class="error" @enderror value="{{ old('title') }}">
            @error('title')
                <small>*{{ $message }}</small>
            @enderror
        </div>

        <div class="form__item">
            <input-file></input-file>
        </div>

{{--        <div class="form__item">--}}
{{--            <label for="image">Image</label>--}}
{{--            <input type="file"--}}
{{--                   name="image[]"--}}
{{--                   id="image"--}}
{{--                   multiple--}}
{{--                   @error('image') class="error" @enderror--}}
{{--                   @error('image.0') class="error" @enderror--}}
{{--            >--}}
{{--            @error('image')<small>*{{ $message }}</small>@enderror--}}
{{--            @error('image.0')<small>*{{ $message }}</small>@enderror--}}
{{--            <img id="preview" src="#" alt="your image" class="mt-3" style="display:none;"/>--}}
{{--        </div>--}}

        <button class="form__btnSend">Create</button>

{{--        @if($errors->get('image.*'))--}}
{{--            {{ dd($errors->get('image.*')) }}--}}
{{--        @endif--}}

    </form>
</div>
<script>

    // let image = document.getElementById('image');
    // console.log(image);
    // image.onchange = evt => {
    //     preview = document.getElementById('preview');
    //     preview.style.display = 'block';
    //     const [file] = image.files
    //     console.log(URL.createObjectURL(file));
    //     if (file) {
    //         preview.src = URL.createObjectURL(file)
    //     }
    // }

    // let images = document.querySelectorAll('input[name="image[]"]');
    //
    // images.forEach(el => {
    //     el.onchange = () => {
    //         const [file] = el.files
    //         console.log(URL.createObjectURL(file));
    //     }
    // })

</script>
</body>
</html>
