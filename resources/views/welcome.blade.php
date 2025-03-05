<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
        
    </head>
    <body class="">
    <livewire:comments/>
    @livewireScripts
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('image').addEventListener('change', function (event) {
            let file = event.target.files[0];
            // console.log(typeof Livewire.emit);

            if (file) {
                let reader = new FileReader();
                
                reader.onloadend = function () {
                    // console.log('File Read Complete:', reader.result);
                    Livewire.dispatch('fileUpload', { data: reader.result }); // Emit the event with file data
                    // console.log(reader.result);
                };
                
                reader.readAsDataURL(file);
            }
        });
    });
</script>
    </body>
</html>
