from conectorMariaDB import Conector

myConector = Conector()
myConector.host()
cursor = myConector.conector()

class Configuration():
    def __init__(self, name="", lastName="", codeAccount="", typeAccount="", adminCode="", password="", 
                creditCard="", house="", phone="") -> None:
        self.name, self.lastName, self.codeAccount, self.typeAccount = name, lastName, codeAccount, typeAccount
        self.adminCode, self.password, self.creditCard, self.house = adminCode, password, creditCard, house
        self.phone = phone
    
    def changeName(self, name, id):
        self.name = name
        userID = str(id)
        dbName = 'UPDATE usuarios SET nombre_usuario = "'+self.name+'"  WHERE codigo_cuenta = '+userID+';'
        cursor.execute(dbName)
        
    def changeLastName(self, lastName, id):
        self.lastName = lastName
        userID = str(id)
        dbLastName = 'UPDATE usuarios SET apellidos_usuario = "'+self.lastName+'"  WHERE codigo_cuenta = '+userID+';'
        cursor.execute(dbLastName)
    
    def changeCodeAccount(self, codeAccount, id):
        self.codeAccount = codeAccount
       
        userID = id
        dbCodeAccount = ('UPDATE usuarios SET codigo_cuenta = '
                    +str(self.codeAccount)+'  WHERE codigo_cuenta = '+str(userID)+';')
        cursor.execute(dbCodeAccount)

        return self.codeAccount, self.adminCode
    
    def changeGeneralData(self, name, lastName, codeAccount, id):
        self.name = name
        self.lastName = lastName
        self.codeAccount = codeAccount
        userID = id
        dbGeneralData = ('UPDATE usuarios SET nombre_usuario = "'+self.name+'", apellidos_usuario = "'
                    +self.lastName+'", codigo_cuenta = '+str(self.codeAccount)+' WHERE codigo_cuenta = '+str(userID)+';')
        cursor.execute(dbGeneralData)
        return (self.name, self.lastName, self.codeAccount, userID)
    
    def changeTypeAccount(self, typeAccount, adminCode, id):
        self.typeAccount = typeAccount
        self.adminCode = adminCode
        if (self.browseAdmin(self.adminCode) == True):
            userID = id
            dbTypeAccount = ('UPDATE usuarios SET tipo_cuenta = "'
                          +self.typeAccount+'" WHERE codigo_cuenta = '+str(userID)+';')
            cursor.execute(dbTypeAccount)
        else:
            print("No eres administrador")
        return (self.typeAccount, self.adminCode)
   
    def changePassword(self, password, newPassword, id):
        self.password = password
        newPW = newPassword
        
        if(self.browsePassword(self.password, id) == True):
            print("Welcome...")
            
            userID = id
            dbPW= ('UPDATE usuarios SET password = "'
                          +newPW+'" WHERE codigo_cuenta = '+str(userID)+';')
            cursor.execute(dbPW)
        else:
            print("Error")
        return (self.password, newPW)
    
    def addCreditCard(self, creditCard, id):
        self.creditCard = creditCard
        userID = id
        dbCC = ('UPDATE usuarios SET tarjeta = "'
                        +str(self.creditCard)+'", credito = 10000 WHERE codigo_cuenta = '+str(userID)+';')
        cursor.execute(dbCC)
        return (self.creditCard, 10000)

    def addHouse(self, house, id):
        self.house = house
        userID = id
        dbHouse = ('UPDATE usuarios SET direccion_usuario = "'+str(self.house)+'" WHERE codigo_cuenta = '
            +str(userID)+';')
        cursor.execute(dbHouse)
        pass
    
    def addPhone(self, phone, id):
        self.phone = phone
        userID = id
        dbPhone = ('UPDATE usuarios SET telefono_usuario = '+str(self.phone)+' WHERE codigo_cuenta = '
                        +str(userID)+';')
        cursor.execute(dbPhone)
        pass
    
    def browseAdmin(self, adminCode):
        myAdmin = adminCode
        dbAdminCode = "SELECT tipo_cuenta FROM usuarios WHERE codigo_cuenta = "+str(myAdmin)+";"
        cursor.execute(dbAdminCode)
        admin = cursor.fetchall()

        if admin != []:
            code = ""+str(admin[0])
            admin = str(code[2:-3])

            if admin == 'admin': 
                return True
            else:
                return False
        else:
            print(admin)
            return False
    def browsePassword(self, pw, id):
        dbPassword = "SELECT password FROM usuarios WHERE codigo_cuenta = "+str(id)+";"
        cursor.execute(dbPassword)
        passwords = cursor.fetchall()
        if passwords != []:
            
            myPassword = ""+str(passwords[0])
            password = myPassword[2:-3]
            if password == pw: 
                return True
            else:
                return False
        else:
            return False
        
    def browseCode(self, codeAccount, id):
        self.codeAccount = codeAccount
        
        dbCode = "SELECT codigo_cuenta FROM usuarios WHERE codigo_cuenta = "+str(id)+";"
        cursor.execute(dbCode)
        codes = cursor.fetchall()
        if codes != []:
            
            myCode = ""+str(codes[0])
            code = myCode[1:-2]
            if int(code) == int(codeAccount): 
                return True
            else:
                return False
        else:
            return False
    
    def browseCreditUser(self, id):
        dbCode = "SELECT credito FROM usuarios WHERE codigo_cuenta = "+str(id)+";"
        cursor.execute(dbCode)
        codes = cursor.fetchall()
        if codes != []:
            
            myCode = ""+str(codes[0])
            code = myCode[1:-2]
            return code
        else:
            return False 
        
    def pay(self, id, pay):
        dbPay= ('UPDATE usuarios SET credito = "'+str(pay)+'" WHERE codigo_cuenta = '+str(id)+';')
        cursor.execute(dbPay)