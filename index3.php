<?php
   
?>

<pre>#I lost the original program! DANG!
#This program will take an equation and by moving only one match give 
#the corrected equation.

def checkEquation(firstDigit,operation,secondDigit,thirdDigit):
	newEquation = firstDigit + operation + secondDigit
	if eval(newEquation) == int(thirdDigit):
		print('Solved!')
		print(newEquation + '=' + thirdDigit)

def firstGainMatch(digitOne):
	if equation[2] == '6':
		digitTwo = '5'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '6':
		digitThree = '5'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '7':
		digitTwo = '1'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '7':
		digitThree = '1'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '8':
		digitTwo = '0'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '8':
		digitThree = '0'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '8':
		digitTwo = '6'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '8':
		digitThree = '6'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '8':
		digitTwo = '9'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '8':
		digitThree = '9'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '9':
		digitTwo = '3'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '9':
		digitThree = '3'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '9':
		digitTwo = '5'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '9':
		digitThree = '5'
		checkEquation(digitOne,equation[1],equation[2],digitThree)

def firstLoseMatch(digitOne):
	if equation[2] == '0':
		digitTwo = '8'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '0':
		digitThree = '8'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '1':
		digitTwo = '7'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '1':
		digitThree = '7'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '3':
		digitTwo = '9'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '3':
		digitThree = '9'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '5':
		digitTwo = '6'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '5':
		digitThree = '6'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '5':
		digitTwo = '9'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '5':
		digitThree = '9'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '6':
		digitTwo = '8'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '6':
		digitThree = '8'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '9':
		digitTwo = '8'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '9':
		digitThree = '8'
		checkEquation(digitOne,equation[1],equation[2],digitThree)

def firstDigit(equation):
	if equation[0] == '0':
		digitOne = '8'
		firstGainMatch(digitOne)
	if equation[0] == '1':
		digitOne = '7'
		firstGainMatch(digitOne)
	if equation[0] == '2':
		digitOne = '3'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
	if equation[0] == '3':
		digitOne = '2'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
		digitOne = '5'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
		digitOne = '6'
		firstGainMatch(digitOne)
		digitOne = '9'
		firstGainMatch(digitOne)
	if equation[0] == '4':
		print('Digit One: Four')
	if equation[0] == '5':
		digitOne = '3'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
		digitOne = '6'
		firstGainMatch(digitOne)
		digitOne = '9'
		firstGainMatch(digitOne)
	if equation[0] == '6':
		digitOne = '0'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
		digitOne = '5'
		firstLoseMatch(digitOne)
		digitOne = '8'
		firstGainMatch(digitOne)
		digitOne = '9'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
	if equation[0] == '7':
		digitOne = '1'
		firstLoseMatch(digitOne)
	if equation[0] == '8':
		digitOne = '0'
		firstLoseMatch(digitOne)
		digitOne = '6'
		firstLoseMatch(digitOne)
		digitOne = '9'
		firstLoseMatch(digitOne)
	if equation[0] == '9':
		digitOne = '0'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
		digitOne = '3'
		firstLoseMatch(digitOne)
		digitOne = '5'
		firstGainMatch(digitOne)
		digitOne = '6'
		checkEquation(digitOne,equation[1],equation[2],equation[4])
		digitOne = '8'
		firstGainMatch(digitOne)

def secondGainMatch(digitTwo):
	if equation[0] == '6':
		digitOne = '5'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '6':
		digitThree = '5'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[2] == '7':
		digitOne = '1'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '7':
		digitThree = '1'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[2] == '8':
		digitOne = '0'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '8':
		digitThree = '0'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[2] == '8':
		digitOne = '6'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '8':
		digitThree = '6'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[2] == '8':
		digitOne = '9'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '8':
		digitThree = '9'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '9':
		digitOne = '3'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '9':
		digitThree = '3'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '9':
		digitOne = '5'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '9':
		digitThree = '5'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)

def secondLoseMatch(digitTwo):
	if equation[0] == '0':
		digitOne = '8'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '0':
		digitThree = '8'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '1':
		digitOne = '7'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '1':
		digitThree = '7'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '3':
		digitOne = '9'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '3':
		digitThree = '9'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '5':
		digitOne = '6'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '5':
		digitThree = '6'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '5':
		digitOne = '9'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '5':
		digitThree = '9'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '6':
		digitOne = '8'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '6':
		digitThree = '8'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '9':
		digitOne = '8'
		checkEquation(digitOne,equation[1],digitTwo,equation[4])
	if equation[4] == '9':
		digitThree = '8'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)

def secondDigit(equation):
	if equation[2] == '0':
		digitTwo = '8'
		secondGainMatch(digitTwo)
	if equation[2] == '1':
		digitTwo = '7'
		secondGainMatch(digitTwo)
	if equation[2] == '2':
		digitTwo = '3'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
	if equation[2] == '3':
		digitTwo = '2'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
		digitTwo = '5'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
		digitTwo = '6'
		secondGainMatch(digitTwo)
		digitTwo = '9'
		secondGainMatch(digitTwo)
	if equation[2] == '4':
		print('Digit Two: Four')
	if equation[2] == '5':
		digitTwo = '3'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
		digitTwo = '6'
		secondGainMatch(digitTwo)
		digitTwo = '9'
		secondGainMatch(digitTwo)
	if equation[2] == '6':
		digitTwo = '0'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
		digitTwo = '5'
		secondLoseMatch(digitTwo)
		digitTwo = '8'
		secondGainMatch(digitTwo)
		digitTwo = '9'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
	if equation[2] == '7':
		digitTwo = '1'
		secondLoseMatch(digitTwo)
	if equation[2] == '8':
		digitTwo = '0'
		secondLoseMatch(digitTwo)
		digitTwo = '6'
		secondLoseMatch(digitTwo)
		digitOne = '9'
		secondLoseMatch(digitTwo)
	if equation[2] == '9':
		digitTwo = '0'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
		digitTwo = '3'
		secondLoseMatch(digitTwo)
		digitTwo = '5'
		secondLoseMatch(digitTwo)
		digitTwo = '6'
		checkEquation(equation[0],equation[1],digitTwo,equation[4])
		digitTwo = '8'
		secondGainMatch(digitTwo)

def thirdGainMatch(digitThree):
	if equation[0] == '6':
		digitOne = '5'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '6':
		digitTwo = '5'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '7':
		digitOne = '1'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '7':
		digitTwo = '1'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '8':
		digitOne = '0'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '8':
		digitTwo = '0'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '8':
		digitOne = '6'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '8':
		digitTwo = '6'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '8':
		digitOne = '9'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '8':
		digitTwo = '9'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '9':
		digitOne = '3'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '9':
		digitTwo = '3'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '9':
		digitOne = '5'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '9':
		digitTwo = '5'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)

def thirdLoseMatch(digitThree):
	if equation[0] == '0':
		digitOne = '8'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '0':
		digitTwo = '8'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '1':
		digitOne = '7'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '1':
		digitTwo = '7'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '3':
		digitOne = '9'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '3':
		digitTwo = '9'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '5':
		digitOne = '6'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '5':
		digitTwo = '6'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '5':
		digitOne = '9'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '5':
		digitTwo = '9'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '6':
		digitOne = '8'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '6':
		digitTwo = '8'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)
	if equation[0] == '9':
		digitOne = '8'
		checkEquation(digitOne,equation[1],equation[2],digitThree)
	if equation[2] == '9':
		digitTwo = '8'
		checkEquation(equation[0],equation[1],digitTwo,digitThree)

def thirdDigit(equation):
	if equation[4] == '0':
		digitThree = '8'
		thirdGainMatch(digitThree)
	if equation[4] == '1':
		digitThree = '7'
		thirdGainMatch(digitThree)
	if equation[4] == '2':
		digitThree = '3'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
	if equation[4] == '3':
		digitThree = '2'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
		digitThree = '5'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
		digitThree = '9'
		thirdGainMatch(digitThree)
	if equation[4] == '4':
		print('Digit Three: Four')
	if equation[4] == '5':
		digitThree = '3'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
		digitThree = '6'
		thirdGainMatch(digitThree)
		digitThree = '9'
		thirdGainMatch(digitThree)
	if equation[4] == '6':
		digitThree = '0'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
		digitThree = '5'
		thirdLoseMatch(digitThree)
		digitThree = '8'
		thirdGainMatch(digitThree)
		digitThree = '9'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
	if equation[4] == '7':
		digitThree = '1'
		thirdLoseMatch(digitThree)
	if equation[4] == '8':
		digitThree = '0'
		thirdLoseMatch(digitThree)
		digitThree = '6'
		thirdLoseMatch(digitThree)
	if equation[4] == '9':
		digitThree = '0'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
		digitThree = '3'
		thirdLoseMatch(digitThree)
		digitThree = '5'
		thirdLoseMatch(digitThree)
		digitThree = '6'
		checkEquation(equation[0],equation[1],equation[2],digitThree)
		digitThree = '8'
		thirdGainMatch(digitThree)

print ("Please enter equation:")
print ("Ex. 2+2=5")
equation = input(">")
while equation != 'q':
	firstDigit(equation)
	secondDigit(equation)
	thirdDigit(equation)

	print ("Please enter equation:")
	print ("Ex. 2+2=5")
	equation = input(">")
</pre>
