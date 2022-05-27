from conectorMariaDB import Conector
from datetime import datetime

myConector = Conector()
myConector.host()
cursor = myConector.conector()

class Factura():
    def browseName(self, id):
        dbName = "SELECT nombre_usuario FROM usuarios WHERE codigo_cuenta = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()

        if name != []:
            return name[0][0]
        else:
            pass
        pass
    def browseLastName(self, id):
        dbName = "SELECT apellidos_usuario FROM usuarios WHERE codigo_cuenta = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()

        if name != []:
            return name[0][0]
        else:
            pass
        pass
    def getClient(self, id):
        client = self.browseName(id) + " " + self.browseLastName(id)
        return client
    def codigoPedido(self, id):
        dbName = "SELECT codigo_carrito FROM carrito WHERE codigo_usuario = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()
        lista = []
        for i in range(len(name)):
            lista.append(name[i][0])
        return lista
    def codigoProducto(self, id):
        dbName = "SELECT codigo_producto FROM carrito WHERE codigo_usuario = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()
        lista = []
        
        for i in range(len(name)):
            lista.append(name[i][0])
        return lista 
    def producto(self, id):
        dbName = "SELECT nombre FROM producto WHERE codigo_producto = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()

        if name != []:
            return name
        else:
            pass
    def getProduct(self, id):        
        lista = self.codigoProducto(id)
        myList = []
        for i in range(len(lista)):
            if (i < int(len(lista))):
                aux = self.producto(lista[i])
                myList.append(aux[0][0])
        return myList
    def fechaFactura(self):
        x = datetime.today().strftime('%Y-%m-%d')
        return x
        #2022-05-09    
        
    def browseTotal(self, id):
        dbName = "SELECT total FROM carrito WHERE codigo_usuario = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()

        if name != []:
            return name
        else:
            pass
        pass
    
    def getTotal(self, id):
        lista = []
        for i in range(int(len(self.browseTotal(id)))):
            aux = self.browseTotal(id)[i]
            lista.append(aux[0])
        return lista
    
    def calculateTotal(self, id):
        num = 0
        for i in self.getTotal(id):
            num = num + i
        return num
    # forma_pago, id_factura, fecha_factura, total
    def facturar(self, fVencimiento, total, user, codigoCarrito):
        formaPago = "En linea"
        fv = fVencimiento
        t = total 
        u = user
        carrito = codigoCarrito[0]
        print(carrito)
        for i in carrito:
            if (int(len(carrito)) <= 1):
                query = ('INSERT INTO pago (forma_pago, id_factura, fecha_factura, fecha_vencimiento, total, '
                    +'codigo_usuario, codigo_carrito) VALUES ("'+formaPago+'", NULL, "'
                    +self.fechaFactura()+'", "'+fv+'", '+str(t)+', '+str(u)+', '+str(i[0])+');')
            if (int(len(carrito)) > 1):
                query = ('INSERT INTO pago (forma_pago, id_factura, fecha_factura, fecha_vencimiento, total, '
                    +'codigo_usuario, codigo_carrito) VALUES ("'+formaPago+'", NULL, "'
                    +self.fechaFactura()+'", "'+fv+'", '+str(t)+', '+str(u)+', '+str(i)+');')
            print(query)
            cursor.execute(query)