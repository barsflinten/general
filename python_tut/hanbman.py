import random #inport namspace

#definitioni einer Funktion




def contol_entry(entry,select,index_count):





    wright =0
    wrong=0
    
    
    
            
    
    for  i  in select:
   
        
        if entry == i: 
            
                print()
                wright+=1
                
        else:
                    print("-")
                    wrong+=1
     

  
            

    
    
    return  wrong
        
        
        
        
        
        
print("Galgen Raten \n")

index=["Hotell","Karnakenhaus","Corona","Mutter","Heliumbalon"]

index_count=len(index)




prompt ="Gib einen Buchstaben ein"
select =random.choice(index)
index_count=len(select)

print("Das gesuchte Wort hat "+ str(index_count) +" Buchstaben\n")


prompt ="Gib einen Buchstaben ein: "
u_input=input(prompt)

contol_entry(u_input,select,index_count)
 


