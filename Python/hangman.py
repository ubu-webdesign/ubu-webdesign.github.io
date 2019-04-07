# I found a python hangman game from https://www.pythonforbeginners.com/games/
# and I wanted to add ascii graphics and more words and update it for python3.
# I mean that came out in 2008! Let's jump into the future!!!
# David Romanski
# 08/30/2018
# It's a little tough for me to edit someone's code, because they code differently.
# I like tab and single quotes for python, and I'm not a fan of a lot of comments. 
# If you can't tell what I'm doing by reading the code, then I'm not coding properly.

#importing the time module
import time
import os
import random

def selectWord():
	wordList = ['secret', 'purple', 'orange', 'family', 'twelve', 'silver', 'godard', 'thirty' , 'donate', 'people',
		'future', 'heaven', 'banana', 'office', 'nature', 'eleven', 'animal', 'middle', 'twenty', 'snitch',
		'father', 'yellow', 'poetry', 'broken', 'potato', 'circle', 'school', 'breath', 'moment', 'circus',
		'person', 'scarce', 'energy', 'sister', 'spring', 'change', 'monkey', 'system', 'pirate', 'turtle',
		'ninety', 'mother']
	x = random.randint(0,len(wordList))
	return wordList[x]

def printGallows(turns):
	#print(turns)
	if turns < 10:
		print('')
		if turns < 9:
			print('    _________')
		if turns < 8:
			print('    |       |')
		else:
			print('    |')
		if turns < 7:
			print('    |       0')
		else:
			print('    |')
		if turns < 4:
			print('    |      /|\\')
		elif turns < 5:
			print('    |      /|')
		elif turns < 6:
			print('    |      /')
		else:
			print('    |')
		if turns < 2:
			print('    |      / \\')
		elif turns < 3:
			print('    |      /')
		else:
			print('    |')
		if turns < 9:
			print('    |')
			print('    |')

#welcoming the user
name = input("What is your name? ")

print("Hello, " + name, ". Time to play hangman!")

print("")

#wait for 1 second
time.sleep(1)

print("Start guessing...")
time.sleep(0.5)

#here we set the secret
word = selectWord()

#creates an variable with an empty value
guesses = ''

#determine the number of turns
turns = 10

# Create a while loop

#check if the turns are more than zero
while turns > 0:         

    # make a counter that starts with zero
    failed = 0             

    printGallows(turns)

    # for every character in secret_word    
    for char in word:      

    # see if the character is in the players guess
        if char in guesses:    
    
        # print then out the character
            print(char, end=" ")

        else:
    
        # if not found, print a dash
            print("_", end=" ")
       
        # and increase the failed counter with one
            failed += 1    

    # if failed is equal to zero

    # print You Won
    if failed == 0:        
        print("Great job, "+ name, "You won!!!")

    # exit the script
        break              

    # print

    # ask the user go guess a character
    guess = input("Guess a character:") 

    # set the players guess to guesses
    guesses += guess                    

    os.system('cls' if os.name == 'nt' else 'clear') 

    # if the guess is not found in the secret word
    if guess not in word:  
 
     # turns counter decreases with 1 (now 9)
        turns -= 1        

    # print wrong
        print ('Sorry, ' + guess , " is wrong.")
 
    # how many turns are left
        print("You have", + turns, 'guesses left.')
 
    # If the turns are equal to zero print 'You lost'
        if turns == 0:           
            print("Sorry, " + name, ", you lost.")
