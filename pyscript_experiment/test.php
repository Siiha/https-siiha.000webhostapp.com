<html>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <link rel="stylesheet" href="../styles.css">
        <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
        <title>test</title>
    </head>
    <?php
require_once('../menu2.php');
?>
<h1>RSP</h1>
<?php
$y = 'hands.txt';
$x = file_get_contents($y);
?>
<label>
    hand
</label>
<input type="text" id="hand">
<button id="submit-button" type="submit" pys-onClick="my_function">OK</button>
<div id="output">
<py-script>

y= list("rsp")
class player:
    def __init__(self,name):
        self.name = name
        self.hand = "r"
class people(player):
    def selection(self,h):
        self.hand = h
        f = open("hands.txt","a")
        f.write(self.hand)
        f.close()
class ai(player):
    def selection(self):
        x= []
        
        
        for i in y:
            x.append()
        self.hand=y[x.index(max(x)) - 1]
    def hands(self):
        if self.hand=="r":
            self.text="""
    _______
---'   ____)
      (_____)
      (_____)
      (____)
---.__(___)
"""
        if self.hand=="s":
            self.text="""
    _______
---'   ____)____
          ______)
       __________)
      (____)
---.__(___)
"""
        if self.hand=="p":
            self.text="""
     _______
---'    ____)____
           ______)
          _______)
         _______)
---.__________)
"""
def my_function(*args, **kwargs):
    #print('args:', args)
    #print('kwargs:', kwargs)

    console.log(f'args: {args}')
    console.log(f'kwargs: {kwargs}')
    people=people("YOU")
    h = Element('hand').element.value
    people.selection(h)
    AI=ai("ai")
    AI.selection()
    console.log(f'text: {text}')
    Element('output').element.innerText = str(AI.text)
    
</py-script>