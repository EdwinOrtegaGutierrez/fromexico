import mariadb

class Conector():
    def __init__(self) -> None:
        pass
    def host(self):
        try:
            conexion = mariadb.connect(
                host = 'localhost',
                user = 'root',
                password = '',
                db = 'fromexico',
                autocommit=True
            )

        except mariadb.Error as e:
            print('Error al conectarse a la base de datos', e)
            pass

        self.cur = conexion.cursor()
        
    def conector(self):
        return self.cur