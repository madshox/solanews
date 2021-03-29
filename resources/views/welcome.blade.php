<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>

<h2>News</h2>

<div class="row">
    @foreach($post_titles as $key => $post_title)
        <div class="column" style="background-color:#aaa;">
                <h2>{{ $post_title[0] }}</h2>
                <p>{!! implode($post_descriptions[$key]) !!}</p>
        </div>
    @endforeach
</div>

</body>
</html>
