# Midia :: Image

## API

* GET : /api/midia/image/list[/{page:\d+}],
* ['GET', 'POST', 'PUT', 'DELETE'] : /api/midia/image[/{id:\d+}]
 
### GET

### POST
* Route: /api/midia/image

Request
```json
{
  "detail" : {
    "title" : "",
    "description" : "",
    "uri" : "",
    "width" : "",
    "height" : ""
  },
  "file" : {
    "image" : ""
  }       
}
```
      