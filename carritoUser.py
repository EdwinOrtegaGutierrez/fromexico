from conectorMariaDB import Conector

myConector = Conector()
myConector.host()
cursor = myConector.conector()

# ENTREGA
# entrega

class Carrito():
    def producto(self, id):
        dbName = "SELECT nombre FROM producto WHERE codigo_producto = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()

        if name != []:
            return name
        else:
            pass
        
    def codigoProducto(self, id):
        dbName = "SELECT codigo_producto FROM carrito WHERE codigo_usuario = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()
        lista = []
        
        for i in range(len(name)):
            lista.append(name[i][0])
        
        return lista
    def getProduct(self, id):        
        lista = self.codigoProducto(id)
        myList = []
        for i in range(len(lista)):
            if (i < int(len(lista))):
                aux = self.producto(lista[i])
                myList.append(aux[0][0])
        return myList
        
    def cantidad(self, id):
        dbName = "SELECT cantidad FROM carrito WHERE codigo_usuario = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()
        myList = []
        for i in range(int(len(name))):
            if (i < int(len(name))):
                aux = name[i]
                myList.append(aux[0])
        return myList
    
    def total(self, id):
        dbName = "SELECT total FROM carrito WHERE codigo_usuario = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()
        myList = []
        for i in range(int(len(name))):
            if (i < int(len(name))):
                aux = name[i]
                myList.append(aux[0])
        return myList
    
    def entrega(self, id):
        dbName = "SELECT entrega FROM carrito WHERE codigo_usuario = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()
        myList = []
        for i in range(int(len(name))):
            if (i < int(len(name))):
                aux = name[i]
                myList.append(aux[0])
        return myList
    