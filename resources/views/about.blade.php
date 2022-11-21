<?php
    $world = 'Ir para: ';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Page</title>
</head>
<body>
    <main>
        <section>
            <h1>About Page</h1>
            <p>
                {{$world}} <a href="{{url('/contact')}}">Contact Page</a>
            </p>
        </section>
    </main>
</body>
</html>
