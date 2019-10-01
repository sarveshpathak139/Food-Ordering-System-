<?php

function load_typeoffood(){
    $connect = mysqli_connect("localhost","root","","orderingsystem");
    $output = '';
    $sql = "SELECT * from typeoffood";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result)){
        $output .= '<option value="'.$row["countryid"].'">'.$row["countrywisefood"].'</option>';
    }

    return $output;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="jquery.js"></script>
<style>
    h1{
        margin-left:380px;
    }
    h1:hover{
        color:red;
    }
    
    .form{
        margin-left:600px;
        margin-right:250px;
        border:3px solid red;
        border-radius:5px;
        box-shadow:5px 5px gray;
    }

    footer{
        margin-top:10px;
    }
    
    input,
    select{
        border-radius:3px;
        margin:8px;
        margin-top:10px;
        padding:4px;
    }

    select{
        margin-left:10px;
    }

    label{
        margin-left:10px;
    }

    button{
        margin-left:57px;
        background-color:red;
        border:1px solid red;
        color:white;
        position:relative;

    }

    div.image{
        float:left;
        margin-left:30px;
    }
    
    
    
</style>
</head>
<body>
    <h1>Food Ordering System</h1>
    <br>
    <div class="image">
        <img src="burger.jpg" alt="" width="500" height="400">
    </div>
    <div class="form">
    <form action="#" class="mainform" onsubmit="return placeorder()">
        <input type="text" placeholder="Enter Name Here"><br>
        <br>
        <input type="text" placeholder="Enter Email Here"><br>
        <br>
        <input type="text" placeholder="Enter Mobile Number"><br>
        <br>
        <div class="form-group">
        <label for="Type Of Food">Type of food you want:</label><br>
        <select name="typeoffood" id="typeoffood">
        <option value="">Select Type Of Food</option>
        <?php echo load_typeoffood(); ?>
        </select>
        </div>

        <div class="form-group">
        <label for="Select Food">Select Food:</label><br>
        <select name="food" id="food">
        <option value="">Select Food</option>
        </select>
        </div>

        <div class="button">
            <button type="submit">Place Order</button>
            <br>
        </div>
        
        </form>
        </div>

        <footer>
            <div class="footer">
            <hr>
            <h3 align="center">&copy; TheCodingCompany</h3>
            
            </div>
        </footer>
</body>
</html>

<script>

    function placeorder(){
        window.alert("Order Placed..");
    }
$(document).ready(function(){
    $('#typeoffood').change(function(){
        var country_id = $(this).val();
        $.ajax({
            url:"fetch_food.php",
            method:"POST",
            data:{countrywisefoodid:country_id},
            dataType:"text",
            success:function(data)
            {
                $('#food').html(data);
            }
        });
    });
});
</script>