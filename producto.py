from conectorMariaDB import Conector

myConector = Conector()
myConector.host()
cursor = myConector.conector()

class Productos():
    
    def changeStock(self, id, number):
        dbName = 'UPDATE producto SET stock = "'+str(number)+'"  WHERE codigo_producto = '+str(id)+';'
        cursor.execute(dbName)
    
    def price(self, id):
        price = self.browsePrice(id)
        return price + 150
    
    def browseName(self, id):
        dbName = "SELECT nombre FROM producto WHERE codigo_producto = "+str(id)+";"
        cursor.execute(dbName)
        name = cursor.fetchall()

        if name != []:
            code = ""+str(name[0])
            name = str(code[2:-3])

            return name
        else:
            pass
    def browseDescription(self, id):
        db = "SELECT descripcion FROM producto WHERE codigo_producto = "+str(id)+";"
        cursor.execute(db)
        descripcion = cursor.fetchall()

        if descripcion != []:
            code = ""+str(descripcion[0])
            descripcion = str(code[2:-3])

            return descripcion
        else:
            pass
    def browseStock(self, id):
        db = "SELECT stock FROM producto WHERE codigo_producto = "+str(id)+";"
        cursor.execute(db)
        stock = cursor.fetchall()

        if stock != []:
            code = ""+str(stock[0])
            stock = str(code[1:-2])

            return int(stock)
        else:
            pass
    def browsePrice(self, id):
        db = "SELECT precio_proveedor FROM producto WHERE codigo_producto = "+str(id)+";"
        cursor.execute(db)
        precio = cursor.fetchall()

        if precio != []:
            code = ""+str(precio[0])
            precio = str(code[1:-2])

            return float(precio)
        else:
            pass
    def browseProduct(self, product):
        db = "SELECT codigo_producto FROM producto WHERE nombre = '"+product+"';"
        cursor.execute(db)
        producto = cursor.fetchall()

        if producto != []:
            code = ""+str(producto[0])
            producto = str(code[1:-2])

            return int(producto)
        else:
            pass
        pass
     
    def addProduct(self, product, price):
        query = ("INSERT INTO producto (nombre, codigo_producto, id_proveedor, descripcion, " 
                 +"stock, precio_proveedor) VALUES ('"+str(product)+"', NULL, 1, 'Excelente para tus necesidades', "
                 +"10, '"+str(price)+"');")
        cursor.execute(query)
        pass
    def changePrice(self, product, price):
        dbName = 'UPDATE producto SET precio_proveedor = '+str(price)+'  WHERE nombre = "'+str(product)+'";'
        cursor.execute(dbName)
        pass
    def deleteProduct(self, id):
        dbName = 'DELETE FROM producto WHERE codigo_producto = '+str(id)+';'
        cursor.execute(dbName)
        pass
    def addToCart(self, id, producto, cantidad, entrega):
        product = self.browseProduct(producto)
        precio = self.price(product)
        c = float(cantidad)
        total = float(precio) * c
        query = ("INSERT INTO carrito (codigo_usuario, codigo_producto, total, codigo_carrito, " 
                 +"cantidad, entrega) VALUES ("+str(id)+", "+str(product)+", "+str(total)+", NULL, "
                 +str(cantidad)+", '"+str(entrega)+"');")
        cursor.execute(query)
        pass