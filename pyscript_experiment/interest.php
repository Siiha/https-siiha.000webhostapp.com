<html>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <link rel="stylesheet" href="../styles.css">
        <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
        <title>interest</title>
    </head>
    <?php
require_once('../menu2.php');
?>

<body>
    <h1>Interest expectation</h1>
    <label for="balance">balance</label>
    <input type="text" id="balance" name="capital">
    <label for"interest">interest (%)</label>
    <input type="text" id="interest" name="interest">
    <label for="time">time</label>
    <input type="text" id="time" name="time">
    <button id="submit-button" type="submit" pys-onClick="my_function">OK</button>
    <div id="output"></div>
    <py-script>
        from js import console
        def my_function(*args, **kwargs):
            console.log(f'args: {args}')
            console.log(f'kwargs: {kwargs}')
            balance = float(Element('balance').element.value)
            interest = float(Element('interest').element.value)
            time = int(Element('time').element.value)
            text = ""
            for i in range(1,time+1):
                balance += balance*(interest/100)
                text += str(i)+" "+str(round(balance,2))+"\n"
            console.log(f'text: {text}')
            Element('output').element.innerText = text
    </py-script>
</body>