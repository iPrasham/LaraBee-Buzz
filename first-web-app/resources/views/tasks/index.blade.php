<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <ul>
            <!-- <h1>
                <?php //echo "Hello"; ?>
            </h1> -->


            @foreach ($tasks as $task)       <!--use @ notation for php code -->
            
                <li>
                    <a href="/tasks/{{ $task->id }}">
                        {{ $task->body }}
                    </a>
                </li>

            @endforeach
            
        </ul>

    </div>
</body>

</html>