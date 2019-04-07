# This is a decoder that takes in a phrase (hard coded for now) and allows you
# to substitue letters in it. The smart part (ok, not so smart) is that it always
# checks with the original phrase and not the changed phrase.
# I hope to add:
#	inputing the phrase! (I know, right?)
# I may change the solved to be blank, unless a letter is substitued. Later.

import collections
from collections import Counter

def help1(phrase):
	tempPhrase = phrase
	tempPhrase = tempPhrase.replace(' ','')
	print('Sometimes the most common cryptic letter transfer to one of the most common letters!')
	print(collections.Counter(tempPhrase).most_common(1)[0])
	print('You may want to substitue that letter for E or T.')

def help2(phrase):
	tempList = phrase.split()
	print(Counter(tempList))
	print('The most common words in English are THE, BE, TO, OF, and AND!')

phrase = 'IWT FJXRZ QGDLC UDM YJBETS DKTG IWT APON SDV'
#         THE QUICK BROWN FOX JUMPED OVER THE LAZY DOG
solved = phrase

print('Coded  : ', phrase)
print('Decoded: ', solved)

answer = input('Please enter letter to replace (Ex. A=B): ')
answer = answer.upper()
print(answer)

while (answer != 'Q'):
	if answer[1] == '=':
		# solved = solved.replace(answer[0],answer[2])

		solved = list(solved)

	#	print( [pos for pos, char in enumerate(phrase) if char == answer[0]] )
		foo = ( [pos for pos, char in enumerate(phrase) if char == answer[0]])
	#	print(foo)
		for x in foo:
			solved[x] = str(answer[2])
	else:
		if answer == 'HELP1':
			help1(phrase)
		elif answer == 'HELP2':
			help2(phrase)
		else:
			print('What?')
			print('I can give you help if you like. Please enter help1 or help2 for some help.')

	print('Coded  : ', phrase)
	tmpSolved = ''.join(solved)
	solved = tmpSolved
	print('Decoded: ', solved)
	answer = input('Please enter letter to replace (Ex. A=B): ')
	answer = answer.upper()

print(tmpSolved)
