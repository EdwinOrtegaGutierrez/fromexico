class UserLogin():
    def __init__(self, email="", password="") -> None:
        self.email = email
        self.password = password
        
    def userEmail(self):
        return self.email
    
    def userPassword(self):
        return self.password
    
    def login(self):
        if((len(self.email) != 0) and (len(self.password) != 0)):
            return True
        else:
            return False