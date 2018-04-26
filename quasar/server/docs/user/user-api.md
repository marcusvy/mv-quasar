# Routes

## Auth
* path: /api/auth
* allowed methods: GET, POST

---

## Register
* path: /api/user/register
* allowed method: POST

---

## Activation            
* path: /api/user/activate/for/{credential}/by/{key}
* allowed method: GET
* parameters:
    * credential: (string) : the credential registered
    * key: (string) :the activation code on database

---
## User (REST)
 * path: /api/user[/{id:\d+}]
 * allowed methods: GET, POST, PUT, PATCH, DELETE
 * parameters:
    * id: (integer) : the id
### List
* path: /api/user
* method: GET
### List (pagination)
* path: /api/user/page[/{page:\d+}]'
* method: GET
* parameters:
    * page: (integer) : page number
### Fetch
* path: /api/user/1
* method: GET
### Create
* path: /api/user
* method: POST
* data: 
```json
{
    "identity": "marcusvy",
    "credential": "senha123",
    "email": "valid.mail@mail.com"
}
```
### Update
* path: /api/user/3
* method: POST
* data: 
```json
{
    "email": "valid.mail@mail.com"
}
```
###Delete
* path: /api/user/1
* method: DELETE

---

## User Perfil REST
 * path: /api/user-perfil[/{id:\d+}]
 * allowed methods: GET, POST, PUT, PATCH, DELETE
 * parameters:
    * id: (integer) : the id
### List
* path: /api/user-perfil
* method: GET
### List (pagination)
* path: /api/user-perfil/page[/{page:\d+}]'
* method: GET
* parameters:
    * page: (integer) : page number
### Fetch
* path: /api/user-perfil/1
* method: GET
### Create
* path: /api/user-perfil
* method: POST
* data: 
```json
{
    "name": "Marcus Vinicius",
    "birthday": null,
    "birth_place": null,
    "nationality": null,
    "address_number": null,
    "address_street": null,
    "address_district": null,
    "postal_code": null,
    "city": null,
    "state": null,
    "country": null,
    "sociallinks": null,
    "contact_phone_personal": null,
    "contact_phone_home": null,
    "contact_phone_work": null,
    "avatar": null
}
```
### Update
* path: /api/user-perfil/3
* method: POST
* data: 
```json
{
    "name": "Marcus Vinicius",
}
```
###Delete
* path: /api/user-perfil/1
* method: DELETE

---

## User Role REST
 * path: /api/user-role[/{id:\d+}]
 * allowed methods: GET, POST, PUT, PATCH, DELETE
 * parameters:
    * id: (integer) : the id
### List
* path: /api/user-role
* method: GET
### List (pagination)
* path: /api/user-role/page[/{page:\d+}]'
* method: GET
* parameters:
    * page: (integer) : page number
### Fetch
* path: /api/user-role/1
* method: GET
### Create
* path: /api/user-role
* method: POST
* data: 
```json
{
    "name": "editor"
},
```
### Update
* path: /api/user-role/3
* method: POST
* data: 
```json
{
    "name": "editor"
},
```
###Delete
* path: /api/user-role/1
* method: DELETE
