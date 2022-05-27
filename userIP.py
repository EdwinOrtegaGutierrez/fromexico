class UserIP():
    def extract_ip():
        from flask import request   
        return request.environ.get('HTTP_X_REAL_IP', request.remote_addr)