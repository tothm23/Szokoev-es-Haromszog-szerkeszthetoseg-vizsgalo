<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }
    form{
        text-align: center;
        padding: 5vh;
    }
    input{
        padding: 2vh 4vh;
        margin: 1vh;
        font-size: 3vh;
        border: 3px solid transparent;
        text-align: left;
    }
    input[type="number"]:hover{
        cursor: pointer;
        border: 3px solid;
    }
    input[type="submit"]{
        cursor: pointer;
        background-color: white;
    }
    input[type="submit"]:hover{
        background-color: black;
        color: white;
    }
</style>
<body>
    <form action="./masodik_toth_milan.php" method="post">
    <fieldset>
        <legend>Szökőév vizsgáló</legend>
        <input type="number" name="nbEv" placeholder="Írja be a születési évét!" min="<?php print (date('Y') - 100)?>" max="<?php print date('Y');?>" value="<?php print (date('Y') - 20)?>">
        <input type="submit" name="btnSzamol" value="Számold ki!">
        <br>
    </form>
    </fieldset>    
    
    <form action="./masodik_toth_milan.php" method="post">
        <fieldset>
            <legend>Háromszög szerkeszthetőség vizsgáló</legend>
            <input type="number" min="1" name="a" placeholder="a ="><br>
            <input type="number" min="1" name="b" placeholder="b ="><br>
            <input type="number" min="1" name="c" placeholder="c ="><br>
            <input type="submit" name="szamol" value="Számol">
        </fieldset>
    </form>
</body>
</html>

<?php
/*
    Az input name attribútuma alapján számol
    [] szelekciós operátor
    {} hatókör operátor
*/

// Az isset megvizsgálja, hogy létezik-e a változó
if (isset($_POST['btnSzamol'])) {
    $ev = (int) $_POST['nbEv'];

    szokoEv($ev);
}

function szokoEv($ev){

    if ($ev % 4 === 0 || $ev % 100 === 0 && $ev % 400  === 0) {
        print "A(z) " . $ev . " szökőév";
    }else {
        print "A(z) " . $ev . " nem szökőév";
    }
}
?>

<?php
/*
Házi feladat

Egy háromszög akkor szerkeszthető, ha bármely két oldalának összege nagyobb, mint mint a 3. oldal
*/

if(isset($_POST['szamol'])){
    $a = (int) $_POST['a'];
    $b = (int) $_POST['b'];
    $c = (int) $_POST['c'];

    szerkesztheto($a, $b, $c);
}

function szerkesztheto($a, $b, $c){

    if ($a + $b > $c && $a + $c > $b && $b + $c > $a){
        print "A háromszög Szerkeszthető";
    }else {
        print "A háromszög nem szerkeszthető";
    }
}
?>