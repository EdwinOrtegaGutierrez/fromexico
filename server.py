from flask import Flask, render_template, request, redirect, flash
from producto import Productos
from userLogin import UserLogin
from conectorMariaDB import Conector
from userValidar import Validation
from searchUser import SearchingUser
from userIP import UserIP
from userConfig import Configuration
from pedidoUser import Pedido
from carritoUser import Carrito
from facturarUser import Factura

myPath = render_template
app = Flask(__name__)

myConector = Conector()
myConector.host()
cursor = myConector.conector()

myUser = UserLogin()
allUsers = {}
usersIP = UserIP

@app.route('/', methods=['GET','POST'])
def index():
    myUser.email = ""
    if request.method == 'POST':
        obtener = request.form
        myEmail = obtener.get('email')
        myPassword = obtener.get('password')

        if((myEmail != None) and (myPassword != None)):    
            myUser.email = myEmail
            myUser.password = myPassword
            myValidation = Validation(myEmail, myPassword)
            myValidation.validando()

            if ((myValidation.getEmailValidado() == True) and (myValidation.getPwValidado() == True)):
                allUsers[usersIP.extract_ip()] = myUser.userEmail()
                print(allUsers)
                print(allUsers[usersIP.extract_ip()])
                return redirect("/home", code=302)
            
            elif((myValidation.getEmailValidado() == False) or 
                (myValidation.getPwValidado() == False) or 
                ((myValidation.getEmailValidado() == False) and (myValidation.getPwValidado() == False))):
                flash("Error al iniciar sesión", "danger")
                return redirect("/", code=302)
    
    if request.method == 'POST':
        obtener = request.form
        
        name = obtener.get('name')
        lastName = obtener.get('lastName')
        
        newEmail = obtener.get('newEmail')
        newPassword = obtener.get('newPassword')
        
        adminCode = obtener.get('codigo')
    
        cargo = obtener.get('cargo')
        dataBase = "SELECT correo FROM `usuarios`"
        cursor.execute(dataBase)
        usuarios = cursor.fetchall()

        for dato in usuarios:
            if str(dato) == f"('{newEmail}',)":
                correoValidado = False
                break
            else:
                correoValidado = True

        if (correoValidado == True):
            if ((str(cargo) == 'admin') or (str(cargo) == 'vendedor')):
                config = Configuration()
                if (config.browseAdmin(adminCode) == True):
                    query = ("INSERT INTO usuarios (nombre_usuario, apellidos_usuario, codigo_cuenta, "
                            +"tipo_cuenta, correo, password, tarjeta, credito, direccion_usuario, telefono_usuario) "
                            +"VALUES ('"+str(name)+"', '"+str(lastName)+"', NULL, '"+str(cargo)+"','"
                            +str(newEmail)+"', '"+str(newPassword)+"', 0, 0, '?', '?');")
                    cursor.execute(query)
                    pass
                pass
            else:
                query = ("INSERT INTO usuarios (nombre_usuario, apellidos_usuario, codigo_cuenta, "
                        +"tipo_cuenta, correo, password, tarjeta, credito, direccion_usuario, telefono_usuario) "
                        +"VALUES ('"+str(name)+"', '"+str(lastName)+"', NULL, '"+str(cargo)+"','"
                        +str(newEmail)+"', '"+str(newPassword)+"', 0, 0, '?', '?');")
                cursor.execute(query)
            flash("Cuenta creada", "success")
            return redirect("/", code=302)
            
        elif (correoValidado == False):
            flash("Datos erroneos", "danger")
            return redirect("/", code=302)
        
    return myPath('/index.php')

@app.route('/home', methods=['GET','POST'])
def home():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        searchingUser.searchID()
        accountType=searchingUser.searchAccount()
        return myPath('/home.php', creditUser=searchingUser.searchCredit(), accountType=accountType)
    else:
        return redirect("/", code=302)

@app.route('/productos', methods=['GET','POST'])
def productos():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        accountType=searchingUser.searchAccount()
        
        producto = Productos()

        dic = {}

        for i in range(9):
            if i + 1 < 9:
                dic[i+1] = {'name':producto.browseName(i+1), 
                            'descripcion':producto.browseDescription(i+1),
                            'precio':producto.price(i+1)}
            if i + 1 == 9:
                dic[i+1] = {'name':producto.browseName(i+1), 
                            'descripcion':producto.browseDescription(i+1),
                            'precio':producto.price(i+1)}
        
        if request.method == 'POST':
            obtener = request.form
            product = obtener.get('producto')
            cantidad = obtener.get('cantidad')
            entrega = obtener.get('entrega')
            
            if entrega == 'domiciliar':
                id = searchingUser.searchID()
                domicilio = searchingUser.searchHouse()
                productoID = producto.browseProduct(product)
                c = producto.browseStock(productoID)
                can = int(cantidad)
                nuevaCantidad = c - can
                config = Configuration()
                credito = config.browseCreditUser(id)
                nuevoCredito = float(credito) - (producto.price(productoID) * can)
                config.pay(id, nuevoCredito)
                print(nuevoCredito)
                producto.changeStock(productoID, nuevaCantidad)
                producto.addToCart(id, product, cantidad, domicilio)
                pass
            if entrega == "tienda":
                id = searchingUser.searchID()
                entrega = "En tienda"
                productoID = producto.browseProduct(product)
                c = producto.browseStock(productoID)
                can = int(cantidad)
                nuevaCantidad = c - int(cantidad)
                config = Configuration()
                credito = config.browseCreditUser(id)
                nuevoCredito = float(credito) - (producto.price(productoID) * can)
                config.pay(id, nuevoCredito)
                print(nuevoCredito)
                producto.changeStock(productoID, nuevaCantidad)
                producto.addToCart(id, product, cantidad, entrega)
                pass
            else:
                pass
        
        return myPath('/productos.php', creditUser=searchingUser.searchCredit(), dic=dic, accountType=accountType)
    else:
        return redirect("/", code=302)

@app.route('/agregarProducto', methods=['GET','POST'])
def agregarProducto():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        accountType=searchingUser.searchAccount()
        
        if (accountType == 'cliente' or accountType == 'vendedor'):
            return redirect("/home", code=302)
            
        if request.method == 'POST':
            obtener = request.form
            productoNuevo = obtener.get('productoNuevo')
            precioNuevo = obtener.get('precioNuevo')
            producto = obtener.get('producto')
            precioCambiado = obtener.get('precioCambiado')
            idProducto = obtener.get('idProducto')
            adminCode = obtener.get('codigoAdministrador')
            
            if ((productoNuevo != "") and (precioNuevo != "")):
                if ((productoNuevo != None) and (precioNuevo != None)):
                    p = Productos()
                    p.addProduct(productoNuevo, precioNuevo)
                    pass
                pass
            if ((precioCambiado != "") and (producto != "")):
                if ((precioCambiado != None) and (producto != None)):
                    p = Productos()
                    p.changePrice(producto, precioCambiado)
                    pass
                pass
            if ((idProducto != "") and (adminCode != "")):
                if ((idProducto != None) and (adminCode != None)):
                    config = Configuration()
                    if (config.browseAdmin(adminCode) == True):
                        pass
                        p = Productos()
                        p.deleteProduct(int(idProducto))
                    pass
                pass
            pass
        
        return myPath('/agregar.php', creditUser=searchingUser.searchCredit(), accountType=accountType)
    else:
        return redirect("/", code=302)

@app.route('/factura', methods=['GET','POST'])
def factura():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        accountType=searchingUser.searchAccount()
        
        if (accountType == 'cliente'):
            return redirect("/home", code=302)
        
        cliente, productos, fVencimiento, codigoPedido, total = ["?"],["?"],["?"],["?"],['?']
        
        if request.method == 'POST':
            obtener = request.form
            usuarioID = obtener.get('idCliente')            
            vencimiento = obtener.get('vencimiento')
            button = obtener.get('facturar')
            if usuarioID != "" and fVencimiento != "":
                if usuarioID != None and fVencimiento != None:
                    factura = Factura()
                    cliente, productos, fVencimiento, codigoPedido, total = [],[],[],[],[]
                    cliente.append(factura.getClient(usuarioID))
                    productos.append(factura.getProduct(usuarioID))
                    codigoPedido.append(factura.codigoPedido(usuarioID))
                    fVencimiento.append(vencimiento)    
                    total.append(factura.calculateTotal(usuarioID))
                        
                    factura = Factura()
                    print(factura.facturar(fVencimiento[-1], total[-1], usuarioID, codigoPedido))
                    
        return myPath('/factura.php', 
                clientUser=cliente[-1], productos=productos[-1], fechaVencimiento=fVencimiento[-1],
                codigoPedido=codigoPedido[-1], total=total[-1], creditUser=searchingUser.searchCredit(),
                accountType=accountType)
    else:
        return redirect("/", code=302)

@app.route('/contactos', methods=['GET','POST'])
def contactos():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        accountType=searchingUser.searchAccount()
        
        if (accountType == 'cliente'):
            return redirect("/home", code=302)
        
        return myPath('/contactos.php', creditUser=searchingUser.searchCredit(), accountType=accountType)
    else:
        return redirect("/", code=302)
    
@app.route('/carrito', methods=['GET','POST'])
def carrito():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        id = searchingUser.searchID()
        accountType=searchingUser.searchAccount()
        user = Carrito()
                
        producto = user.getProduct(id)
        cantidad = user.cantidad(id)
        total = user.total(id)
        entrega = user.entrega(id)
        return myPath('/carrito.php', creditUser=searchingUser.searchCredit(), producto=producto, cantidad=cantidad,
                      total=total, entrega=entrega, accountType=accountType)
    else:
        return redirect("/", code=302)

@app.route('/pedido', methods=['GET','POST'])
def pedido():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        accountType=searchingUser.searchAccount()
        if (accountType == 'cliente'):
            return redirect("/home", code=302)
        
        pedido = Pedido()
        usuario = pedido.getCodeUser()
        carrito = pedido.getCodeCarrito()
        return myPath('/pedido.php', creditUser=searchingUser.searchCredit(), users=usuario, carrito=carrito,
                      accountType=accountType) 
    else:
        return redirect("/", code=302)

@app.route('/configuracion', methods=['GET','POST'])
def configuracion():
    if(myUser.login() == True):
        searchingUser = SearchingUser(allUsers[usersIP.extract_ip()])
        accountType=searchingUser.searchAccount()
                
        if request.method == 'POST':
            print("POST - CARGANDO DATOS...")
            obtener = request.form
            config = Configuration()
            name, lastName  = obtener.get('userName'), obtener.get('userLastName')
            accountCode, newAccountCode = obtener.get('userAccountCode'), obtener.get('newAccountCode')
            domicilio, telefono = obtener.get('domicilio'), obtener.get('telefono')
            newAccountType, adminCode = obtener.get('newAccount'), obtener.get('adminCode')
            password, newPassword = obtener.get('userPassword'), obtener.get('newPassword')
            tarjetaCredito = obtener.get('tarjetaCredito')
            if name != "":
                if name == None:
                    pass
                else:
                    id = searchingUser.searchID()
                    config.changeName(name, id)
            if lastName != "":
                if lastName == None:
                    pass
                else:
                    id = searchingUser.searchID()
                    config.changeLastName(lastName, id)
            if accountCode != "":
                if accountCode == None:
                    pass
                else:
                    id = searchingUser.searchID()
                    if (config.browseCode(accountCode, id) == True):
                        config.changeCodeAccount(newAccountCode, id)
                    else:
                        pass
            if domicilio != "":
                if domicilio == None:
                    pass
                else:
                    id = searchingUser.searchID()
                    config.addHouse(domicilio, id)
            if telefono != "":
                if telefono == None:
                    pass
                else:
                    id = searchingUser.searchID()
                    config.addPhone(telefono, id)
            if newAccountType != "" and str(adminCode) != "":
                if newAccountType == None and adminCode == None:
                    pass
                else:
                    if (config.browseAdmin(adminCode) == False):
                        pass
                    else:
                        id = searchingUser.searchID()
                        config.changeTypeAccount(newAccountType, adminCode, id)
            if (newPassword != "" and password != ""):
                if password == None and newPassword == None:
                    pass
                else:
                    id = searchingUser.searchID()
                    if (config.browsePassword(password, id) == True):
                        config.changePassword(password, newPassword, id)
                    else:
                        pass
            if tarjetaCredito != "":
                if tarjetaCredito == None:
                    pass
                else:
                    id = searchingUser.searchID()
                    config.addCreditCard(tarjetaCredito, id)
                
        return myPath('/configuracion.php', myEmail=searchingUser.searchEmail(), 
                    myPassword=searchingUser.passwordEncryption(), myName=searchingUser.searchName(), 
                    myLastName=searchingUser.searchLastName(), myAccount=searchingUser.searchAccount(), 
                    myAccountCode=searchingUser.accountCodeEncryption(), creditUser=searchingUser.searchCredit(), 
                    creditCard=searchingUser.searchCreditCard(), domicilio=searchingUser.searchHouse(),
                    telefono=searchingUser.searchPhone(), accountType=accountType)
    else:
        return redirect("/", code=302)

@app.route('/about')
def about():
    return myPath('/about.php')
    
@app.route('/desarrolladores')
def creadores():
    return myPath('/desarrolladores.php')


if __name__ == "__main__":
    app.secret_key = 'super secret key' #NECESARIO PARA MANDAR MENSAJES PRIVADOS
    app.run(host = '0.0.0.0', port=80, debug = True)