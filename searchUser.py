from conectorMariaDB import Conector

myConector = Conector()
myConector.host()
cursor = myConector.conector()

class SearchingUser():
    def __init__(self, email) -> None:
        self.email = email

        # userEmail = self.email
    
    def searchEmail(self):
        return self.email
    
    def searchPassword(self):
        dbPW = 'SELECT password FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(dbPW)
        passwords = cursor.fetchall()
        password = ""+str(passwords[0])
        return password[2:-3]

    def passwordEncryption(self):
        userPassword = self.searchPassword()
        password_encryption = ""
        for data in userPassword:
            password_encryption = password_encryption  + "*"
        return password_encryption
        
    def searchName(self):
        dbName = 'SELECT nombre_usuario FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(dbName)
        names = cursor.fetchall()
        name = ""+str(names[0])
        return name[2:-3]
    
    def searchLastName(self):
        dbLastName = 'SELECT apellidos_usuario FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(dbLastName)
        last_name = cursor.fetchall()
        lastName = ""+str(last_name[0])
        return lastName[2:-3]

    def searchAccount(self):
        dbAccount = 'SELECT tipo_cuenta FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(dbAccount)
        type_account = cursor.fetchall()
        account = ""+str(type_account[0])
        return account[2:-3]
        
    def searchCreditCard(self):
        dbCreditCard = 'SELECT tarjeta FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(dbCreditCard)
        creditCards = cursor.fetchall()
        creditCard = ""+str(creditCards[0])
        newCC = ""
        x = [int(i) for i in str(creditCard[1:-2])]
        
        for i in x:
            if (i%1 == 0):
                newCC = newCC + "-" + str(i)
        return newCC[1::]

    def searchAccountCode(self):
        dbAccountCode = 'SELECT codigo_cuenta FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(dbAccountCode)
        accountCode = cursor.fetchall()
        return (str(accountCode)[2:-3])
    
    def accountCodeEncryption(self):
        accountCode = self.searchAccountCode()
        accountCode_encryption = ""
        for data in accountCode:
            accountCode_encryption = accountCode_encryption  + "*"
        return accountCode_encryption
    
    def searchCredit(self):
        credit = 'SELECT credito FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(credit)
        userCredit = cursor.fetchall()
        
        if userCredit != None:
            x = "$"+(str(userCredit)[2:-3])
            if x == "$None":
                return "$00.00"
            else:
                return x
            
    def searchHouse(self):
        house = 'SELECT direccion_usuario FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(house)
        houses = cursor.fetchall()
        myHouse = ""+(str(houses)[3:-4])
        return myHouse
    
    def searchPhone(self):
        phone = 'SELECT telefono_usuario FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(phone)
        phones = cursor.fetchall()
        myPhone = ""+(str(phones)[3:-4])
        return myPhone

    def searchID(self):
        userID = 'SELECT codigo_cuenta FROM `usuarios` WHERE correo = "'+self.email+'";'
        cursor.execute(userID)
        ID = cursor.fetchall()
        myID = ""+(str(ID)[2:-3])
        return myID
