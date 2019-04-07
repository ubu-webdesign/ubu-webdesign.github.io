# I wanted to see if I could write a simple Ceaser cipher.
# It only translates Upper and Lower case letters, 
# leaving everything else alone.
# David Romanski 08/27/18

import random
print('Please enter phrase:')
uncyphered = input('>')
cyphered = []
pseudorandom = random.randint(1,26)
for x in range(len(uncyphered)):
	ascii = ord(uncyphered[x])
	if (ascii >= 65) and (ascii <= 90):
		ascii += pseudorandom
		if (ascii > 90):
			ascii -= 26
	elif (ascii >= 97) and (ascii <= 122):
		ascii += pseudorandom
		if (ascii > 122):
			ascii -= 26
	cyphered.append(chr(ascii))
print("".join(cyphered))

