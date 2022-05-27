from conectorMariaDB import Conector

myConector = Conector()
myConector.host()
cursor = myConector.conector()

class Pedido():
    def browseUser(self):
        dbName = "SELECT codigo_usuario, codigo_carrito FROM carrito;"
        cursor.execute(dbName)
        name = cursor.fetchall()

        if name != []:
            return name
        else:
            pass

    def listaPedido(self):
        lista = self.browseUser()
        pedido = {}
        for i in range(int(len(lista))):
            if (i+1 < int(len(lista))):
                pedido[i+1] = (self.browseUser()[i])
            if (i+1 == int(len(lista))):
                pedido[i+1] = (self.browseUser()[i])
                pass
            
        return pedido
    
    def getCodeUser(self):
        lista = []
        for i in range(int(len(self.listaPedido()))):
            if (i+1 < int(len(self.listaPedido()))):
                aux = self.listaPedido()[i+1]
                lista.append(aux[0])
            if (i+1 == int(len(self.listaPedido()))):
                aux = self.listaPedido()[i+1]
                lista.append(aux[0])
                pass
        return lista
    
    def getCodeCarrito(self):
        lista = []
        for i in range(int(len(self.listaPedido()))):
            if (i+1 < int(len(self.listaPedido()))):
                aux = self.listaPedido()[i+1]
                lista.append(aux[1])
            if (i+1 == int(len(self.listaPedido()))):
                aux = self.listaPedido()[i+1]
                lista.append(aux[1])
                pass
        return lista