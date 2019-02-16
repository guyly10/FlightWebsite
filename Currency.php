<?php
session_start();
if (!isset($_SESSION['uname']) || ($_SESSION['uname'] == ""))
    header('Location: index.php');

$displayName = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/HeadPage.css">
    <link rel="stylesheet/less" type="text/css" href="css/UpdateDetails.less">
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>

    <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet'
          type='text/css'>
    <title>AGflights</title>
</head>
<body>
<div><b>
        <?php echo "Hello, " . $displayName . "!"; ?>
    </b></div>

<a href="HeadPage.php">
    <div class="imgcontainer">
        <img src="images/Flight_Logo.png" alt="Logo" class="Logo">
    </div>
</a>
<br>
<br>
<div id='menu'>
    <ul>
        <li><a href='HeadPage.php'>Home</a></li>
        <li class='active'><a href='AccountPage.php'>Account</a></li>
        <li><a href='#'>Currency</a></li>
        <li><a href='Reviews.php'>Write Review</a></li>
        <li><a href='UsersReviews.php'>Users Reviews</a></li>
        <li><a href='index.php'>Logout</a></li>
    </ul>
</div>
<div id="databinding" class='container'>
    <h1>Currency Changer</h1><br>
    <span>Enter Sum: </span><input type="number" v-model.number="amount" placeholder="Enter Sum"><br>
    <span>Convert From:</span>
    <select v-model="convertfrom" style="width:250px;">
        <option v-for="(a, index) in currencyfrom" v-bind:value="a.name">{{a.desc}}</option>
    </select><br>
    <span>To:</span>
    <select v-model="convertto" style="width:250px;">
        <option v-for="(a, index) in currencyfrom" v-bind:value="a.name">{{a.desc}}</option>
    </select><br>
    <span>{{amount}} {{convertfrom}} is {{finalamount}} {{convertto}}</span>
</div>
<script>
    new Vue({
        el:'#databinding',
        data: {
            name:'',
            currencyfrom : [
                {name : "USD", desc:"US Dollar"},
                {name:"EUR", desc:"Euro"},
                {name:"NIS", desc:"Israeli Shekel"},
                {name:"BGN", desc:"Bulgarian Lev"}
            ],
            convertfrom: "NIS",
            convertto:"USD",
            amount :""
        },
        computed :{
            finalamount:function() {
                var to = this.convertto;
                var from = this.convertfrom;
                var final;
                switch(from) {
                    case "NIS":
                        if (to == "USD") {
                            final = this.amount * 0.276;
                        }
                        if (to == "EUR") {
                            final = this.amount * 0.244;
                        }
                        if (to == "NIS") {
                            final = this.amount;
                        }
                        if (to == "BGN") {
                            final = this.amount * 0.478;
                        }
                        break;
                    case "USD":
                        if (to == "NIS") {
                            final = this.amount * 3.618;
                        }
                        if (to == "EUR") {
                            final = this.amount * 0.885;
                        }
                        if (to == "USD") {
                            final = this.amount;
                        }
                        if (to == "BGN") {
                            final = this.amount * 1.732;
                        }
                        break;
                    case "EUR":
                        if (to == "NIS") {
                            final = this.amount * 4.087;
                        }
                        if (to == "USD") {
                            final = this.amount * 1.129;
                        }
                        if (to == "EUR") {
                            final = this.amount;
                        }
                        if (to == "BGN") {
                            final = this.amount * 1.956;
                        }
                        break;
                    case "BGN":
                        if (to == "NIS") {
                            final = this.amount *2.089;
                        }
                        if (to == "USD") {
                            final = this.amount * 0.577;
                        }
                        if (to == "EUR") {
                            final = this.amount * 0.511;
                        }
                        if (to == "BGN") {
                            final = this.amount;
                        }
                        break
                }
                return final;
            }
        }
    });
</script>
<footer>
    <p style="text-align:center;"> Create by : 203371703 , 312233422
    <p>
</footer>
</body>
</html>