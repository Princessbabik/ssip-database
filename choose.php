<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('Aura.jpg'); 
            background-size: cover;
            background-repeat: repeat; 
        }

        .container img {
            width: 500px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-primary {
        background-color: #cc8b8bb6;
        border-color: #cc8b8bb6;
        border-radius: 5px;
        width: 5%;
        padding: 3px;
        margin-left: 10px;
        margin-top: 10px;

        }

        .btn-primary:hover {
            background-color: #ac6b6bb6;
        }

        .btn-primary:focus {
            outline: none;
        }
    </style>
</head>
<body>
<button onclick="window.location.href='home.php'" class="btn btn-primary">Back</button>
    <div class="container">
        <div class="pic-1" >
           <img id="pic1" src="Participant List.png" alt="" onclick="window.location.href='player.php'">
        </div>
        <div class="pic-2">
            <img id="pic2" src="Sponsor List.png" alt="" onclick="window.location.href='sponsor.php'">
        </div>
        <div class="pic-3" >
            <img id="pic3" src="Committee List.png" alt="" onclick="window.location.href='comlist.php'">
        </div>
        <div class="pic-4" >
            <img id="pic4" src="Committee Activities.png" alt="" onclick="window.location.href='add_activity.php'">
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#pic1").fadeIn("fast");
            $("#pic2").delay(1000).fadeIn("slow");
            $("#pic3").delay(2000).fadeIn(3000);
            $("#pic4").delay(3000).fadeIn(3000);
        });
    </script>
</body>
</html>
