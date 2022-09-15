# Instalation required

    1. Built with PHP 8.1
    2. Composer install
    3. Run database script

## API Endpoints

### Request

    POST /api/users

### Body

    {
    	"first_name": "Elvis",
    	"last_name": "Pinares",
    	"email" : "epinaresg@gmail.com",
    	"password": "12345678"
    }

### Response 200

    {
    	"first_name": "Elvis",
    	"last_name": "Pinares",
    	"email" : "epinaresg@gmail.com"
    }

### Request

    POST /api/auth/login

### Body

    {
    	"email" : "epinaresg@gmail.com",
    	"password": "12345678"
    }

### Response 200

    {
    	"first_name": "Elvis",
    	"last_name": "Pinares",
    	"email": "epinaresg@gmail.com"
    }

### Request

    GET /api/users/conversations

### Body

    {
    	"uid": 1
    }

### Response 200

    {
    	"code": 200,
    	"payload": [
    		{
    			"id": "1",
    			"messageFrom": "From 1",
    			"value": "Hola soy 1",
    			"timestamp": 12345678
    		}
    	]
    }
