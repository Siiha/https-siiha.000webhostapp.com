<html>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <link rel="stylesheet" href="../styles.css">
        <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
        <title>travel price</title>
    </head>
    <?php
require_once('../menu2.php');
?>
<body>
    <h1>Fuel costs</h1>
    <label>distance km</label>
    <input type="text" id="distance"></input>
    <label>price per liter</label>
    <input type="text" id="price_per_liter"></input>
    <label>fuel consuption (100km)</label>
    <input type="text" id="fuel_consumption"></input>
    <button id="submit-button" type="submit" pys-onClick="my_function">OK</button>

    <div id="test-output">in one direction</div>
    <div id="test-output2">back and forth</div>
    <py-script>
        from js import console
        def my_function(*args, **kwargs):
            console.log(f'args: {args}')
            console.log(f'kwargs: {kwargs}')
            d = float(Element('distance').element.value)
            prl = float(Element('price_per_liter').element.value)
            fl = float(Element('fuel_consumption').element.value)
            text = str(round(((fl*d)/100)*prl,2))
            console.log(f'text: {text}')
            Element('test-output').element.innerText = text
            text = str(round(((fl*d)/100)*prl*2,2))
            console.log(f'text: {text}')
            Element('test-output2').element.innerText = text
    </py-script>
</body>