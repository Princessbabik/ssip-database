<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
    background-image: url('download (2).jpeg'); 
    background-size: cover;
    background-repeat: repeat; 
    }
        img {
            transition-delay: 0s;
            transition-property: width height background-image border-radius;
            transition-timing-function: linear;
        }

        img:hover{
            transform: rotate(2deg);
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 140px;
            width: 50%;
         }

         .container  {
        display: flex;
        }

        .col-6 button {
        background-color: rgb(240, 197, 234); 
        color: rgb(0, 0, 0);
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        
    }

        .col-6 button:hover {
            background-color: rgb(170, 136, 160); 
        }

        
    </style>
    
</head>
<body>
    <img src="pict register.png" alt="" class="center">
    <div class="container">
        <div class="col-6" >
            <button onclick="window.location.href='signin.php'">committee</button>
        </div>
        <div class="col-6">
            <button onclick="window.location.href='index.php'">Participant</button>
        </div>
    </div>
</body>
</html>