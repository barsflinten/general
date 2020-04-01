

import random#Imprt des Namespace
import itertools

print("Anangram-Generator ") 
input_user = input("Bitte geben Sie ein oder mehrere Worte ein: ") #Useriput
print("Die Eingabe lautet: " + input_user) #Kontrollausgabe der Eingabe

new_input = input_user.replace(" ","")#Entfernung der Leerzeichen 

print(new_input)#kontrollausgabe

def split(new_input):#definition einer Funktion
    return[char for char in new_input]


splitted = split(new_input)
print(split(new_input))#ausgeba des bereinigten Userinputs nach anwendung der split Funktion



stinglen = len(new_input)
#print(stinglen)





#print ("roll the dice")
#span =[1,2,3,4,5,6,7,8,9]


#start= 0
#stop = 6
#step = 1

#print(random.randrange(start, stop, step))