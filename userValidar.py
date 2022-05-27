from conectorMariaDB import Conector

myConector = Conector()
myConector.host()
cursor = myConector.conector()

class Validation():
    
    pwValidado = None
    emailValidado = None
    
    def __init__(self, myEmail, myPassword) -> None:
        self.myEmail = myEmail
        self.myPassword = myPassword
    
    def validando(self):
        dbCorreo = "SELECT correo FROM `usuarios`"
        cursor.execute(dbCorreo)
        correos = cursor.fetchall()
        
        for correo in correos:
            if str(correo) == f"('{self.myEmail}',)":
                self.setEmailValidado(True)
                break
            else:
                self.setEmailValidado(False)

        dbPW = 'SELECT password FROM `usuarios` WHERE correo = "'+self.myEmail+'";'
        cursor.execute(dbPW)
        passwords = cursor.fetchall()

        for password in passwords:
            if str(password) == f"('{self.myPassword}',)":
                self.setPwValidado(True)
                break
            else:
                self.setPwValidado(False)
                
    def getPwValidado(self):
        return self.pwValidado
    
    def getEmailValidado(self):
        return self.emailValidado
    
    def setPwValidado(self, nuevo):
        self.pwValidado=nuevo
        
    def setEmailValidado(self, nuevo):
        self.emailValidado=nuevo