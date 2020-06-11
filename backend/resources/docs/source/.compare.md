---
title: API Reference

language_tabs:
- bash
- javascript
- php
- python

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#Account & Users


<!-- START_88b062eee88f2a61e086b4f52f2d19ea -->
## Register user

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/account/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/account/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/account/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/account/register'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/account/register`


<!-- END_88b062eee88f2a61e086b4f52f2d19ea -->

#Authentication


<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Login &amp; get token

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"trelingo@trelingo.com","password":"xXxXxXxXx"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "trelingo@trelingo.com",
    "password": "xXxXxXxXx"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/auth/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'trelingo@trelingo.com',
            'password' => 'xXxXxXxXx',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/auth/login'
payload = {
    "email": "trelingo@trelingo.com",
    "password": "xXxXxXxXx"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200):

```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5MDMzMjk0MCwiZXhwIjoxNTkwMzM2NTQwLCJuYmYiOjE1OTAzMzI5NDAsImp0aSI6InEzVGlNTWxiYlprNGVhWlIiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.0CsugnkKWmH6PDRrYswCRkRM-f5eLftHBN_2IR0tZMc",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 1,
        "name": "John",
        "surname": "Doe",
        "email": "trelingo@trelingo.com",
        "email_verified_at": null,
        "role": "Admin",
        "environment": "test",
        "account_id": 1,
        "created_at": "2020-05-10T18:37:04.000000Z",
        "updated_at": "2020-05-10T18:37:04.000000Z"
    }
}
```
> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`POST api/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | User email address.
        `password` | string |  required  | User password.
    
<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
## Refresh token

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/auth/refresh',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/auth/refresh'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/auth/refresh`


<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## Logout &amp; invalidate token

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/auth/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/auth/logout'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

#Contacts


<!-- START_543b0b80e8dc51d2d3ad7e2a327eed26 -->
## List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/contacts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/contacts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/contacts',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/contacts'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/contacts`


<!-- END_543b0b80e8dc51d2d3ad7e2a327eed26 -->

<!-- START_e1625404aaf762aa591c10b259222b07 -->
## Create new

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/contacts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/contacts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/contacts',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/contacts'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/contacts`


<!-- END_e1625404aaf762aa591c10b259222b07 -->

<!-- START_a44483465b9aa8cdb47a73e922b4dd91 -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/contacts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/contacts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/contacts/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/contacts/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/contacts/{contact}`


<!-- END_a44483465b9aa8cdb47a73e922b4dd91 -->

<!-- START_6855fa612757e2be32b2250d88260a29 -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/contacts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/contacts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/contacts/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/contacts/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/contacts/{contact}`

`PATCH api/contacts/{contact}`


<!-- END_6855fa612757e2be32b2250d88260a29 -->

<!-- START_1143a8051a00b1611603a8cda0683f09 -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/contacts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/contacts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/contacts/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/contacts/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/contacts/{contact}`


<!-- END_1143a8051a00b1611603a8cda0683f09 -->

#Customers


<!-- START_96ed66d9e6531df9b49e02d84ca5a619 -->
## List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/customers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/customers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/customers',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/customers'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/customers`


<!-- END_96ed66d9e6531df9b49e02d84ca5a619 -->

<!-- START_089467e7ea475fb2aca445b2d23f6e7d -->
## Create new

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/customers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Alan D Rosenburg Cpa Pc","vat":"X12345678","type":"Customer","status":"Active","address_info":"{\"address\": \"85 Bridgewater St\", \"city\": \"Shard End Ward\", \"province\": \"West Midlands\", \"postal_code\": \"B34 7BP\", \"country\": \"United Kingdom\"}","contact_info":"{\"phone1\": \"01689-253476\", \"phone2\": \"01376-851958\", \"email\": \"info@barajasbustamantearchl.co.uk\", \"web\": \"http:\/\/www.barajasbustamantearchl.co.uk\"}"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/customers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Alan D Rosenburg Cpa Pc",
    "vat": "X12345678",
    "type": "Customer",
    "status": "Active",
    "address_info": "{\"address\": \"85 Bridgewater St\", \"city\": \"Shard End Ward\", \"province\": \"West Midlands\", \"postal_code\": \"B34 7BP\", \"country\": \"United Kingdom\"}",
    "contact_info": "{\"phone1\": \"01689-253476\", \"phone2\": \"01376-851958\", \"email\": \"info@barajasbustamantearchl.co.uk\", \"web\": \"http:\/\/www.barajasbustamantearchl.co.uk\"}"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/customers',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'Alan D Rosenburg Cpa Pc',
            'vat' => 'X12345678',
            'type' => 'Customer',
            'status' => 'Active',
            'address_info' => '{"address": "85 Bridgewater St", "city": "Shard End Ward", "province": "West Midlands", "postal_code": "B34 7BP", "country": "United Kingdom"}',
            'contact_info' => '{"phone1": "01689-253476", "phone2": "01376-851958", "email": "info@barajasbustamantearchl.co.uk", "web": "http://www.barajasbustamantearchl.co.uk"}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/customers'
payload = {
    "name": "Alan D Rosenburg Cpa Pc",
    "vat": "X12345678",
    "type": "Customer",
    "status": "Active",
    "address_info": "{\"address\": \"85 Bridgewater St\", \"city\": \"Shard End Ward\", \"province\": \"West Midlands\", \"postal_code\": \"B34 7BP\", \"country\": \"United Kingdom\"}",
    "contact_info": "{\"phone1\": \"01689-253476\", \"phone2\": \"01376-851958\", \"email\": \"info@barajasbustamantearchl.co.uk\", \"web\": \"http:\/\/www.barajasbustamantearchl.co.uk\"}"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200):

```json
{
    "id": 5,
    "name": "Alan D Rosenburg Cpa Pc",
    "vat": "X12345678",
    "type": "Customer",
    "status": "Active",
    "address_info": {
        "address": "85 Bridgewater St",
        "city": "Shard End Ward",
        "province": "West Midlands",
        "postal_code": "B34 7BP",
        "country": "United Kingdom"
    },
    "contact_info": {
        "phone1": "01689-253476",
        "phone2": "01376-851958",
        "email": "info@barajasbustamantearchl.co.uk",
        "web": "http:\/\/www.barajasbustamantearchl.co.uk"
    }
}
```
> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`POST api/customers`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | String |  optional  | Company's name.
        `vat` | String |  optional  | Company's organisation number.
        `type` | String |  optional  | Type.
        `status` | String |  optional  | Status.
        `address_info` | String |  optional  | Stringified JSON Address information.
        `contact_info` | String |  optional  | Stringified JSON Contact information.
    
<!-- END_089467e7ea475fb2aca445b2d23f6e7d -->

<!-- START_51260396e2d6bf23a957126f249c5ee9 -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/customers/5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/customers/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/customers/5',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/customers/5'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "id": 5,
    "name": "Alan D Rosenburg Cpa Pc",
    "vat": "X12345678",
    "type": "Customer",
    "status": "Active",
    "address_info": {
        "address": "85 Bridgewater St",
        "city": "Shard End Ward",
        "province": "West Midlands",
        "postal_code": "B34 7BP",
        "country": "United Kingdom"
    },
    "contact_info": {
        "phone1": "01689-253476",
        "phone2": "01376-851958",
        "email": "info@barajasbustamantearchl.co.uk",
        "web": "http:\/\/www.barajasbustamantearchl.co.uk"
    }
}
```
> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/customers/{customer}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | id of the Customer.

<!-- END_51260396e2d6bf23a957126f249c5ee9 -->

<!-- START_9c3d56ca438bc61f264f75d157cf51bd -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/customers/5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Alan D Rosenburg Cpa Pc","vat":"X12345678","type":"Customer","status":"Active","address_info":"{\"address\": \"85 Bridgewater St\", \"city\": \"Shard End Ward\", \"province\": \"West Midlands\", \"postal_code\": \"B34 7BP\", \"country\": \"United Kingdom\"}","contact_info":"{\"phone1\": \"01689-253476\", \"phone2\": \"01376-851958\", \"email\": \"info@barajasbustamantearchl.co.uk\", \"web\": \"http:\/\/www.barajasbustamantearchl.co.uk\"}"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/customers/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Alan D Rosenburg Cpa Pc",
    "vat": "X12345678",
    "type": "Customer",
    "status": "Active",
    "address_info": "{\"address\": \"85 Bridgewater St\", \"city\": \"Shard End Ward\", \"province\": \"West Midlands\", \"postal_code\": \"B34 7BP\", \"country\": \"United Kingdom\"}",
    "contact_info": "{\"phone1\": \"01689-253476\", \"phone2\": \"01376-851958\", \"email\": \"info@barajasbustamantearchl.co.uk\", \"web\": \"http:\/\/www.barajasbustamantearchl.co.uk\"}"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/customers/5',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'Alan D Rosenburg Cpa Pc',
            'vat' => 'X12345678',
            'type' => 'Customer',
            'status' => 'Active',
            'address_info' => '{"address": "85 Bridgewater St", "city": "Shard End Ward", "province": "West Midlands", "postal_code": "B34 7BP", "country": "United Kingdom"}',
            'contact_info' => '{"phone1": "01689-253476", "phone2": "01376-851958", "email": "info@barajasbustamantearchl.co.uk", "web": "http://www.barajasbustamantearchl.co.uk"}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/customers/5'
payload = {
    "name": "Alan D Rosenburg Cpa Pc",
    "vat": "X12345678",
    "type": "Customer",
    "status": "Active",
    "address_info": "{\"address\": \"85 Bridgewater St\", \"city\": \"Shard End Ward\", \"province\": \"West Midlands\", \"postal_code\": \"B34 7BP\", \"country\": \"United Kingdom\"}",
    "contact_info": "{\"phone1\": \"01689-253476\", \"phone2\": \"01376-851958\", \"email\": \"info@barajasbustamantearchl.co.uk\", \"web\": \"http:\/\/www.barajasbustamantearchl.co.uk\"}"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```


> Example response (200):

```json
{
    "id": 5,
    "name": "Alan D Rosenburg Cpa Pc",
    "vat": "X12345678",
    "type": "Customer",
    "status": "Active",
    "address_info": {
        "address": "85 Bridgewater St",
        "city": "Shard End Ward",
        "province": "West Midlands",
        "postal_code": "B34 7BP",
        "country": "United Kingdom"
    },
    "contact_info": {
        "phone1": "01689-253476",
        "phone2": "01376-851958",
        "email": "info@barajasbustamantearchl.co.uk",
        "web": "http:\/\/www.barajasbustamantearchl.co.uk"
    }
}
```
> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`PUT api/customers/{customer}`

`PATCH api/customers/{customer}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | id of the Customer.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | String |  optional  | Company's name.
        `vat` | String |  optional  | Company's organisation number.
        `type` | String |  optional  | Type.
        `status` | String |  optional  | Status.
        `address_info` | String |  optional  | Stringified JSON Address information.
        `contact_info` | String |  optional  | Stringified JSON Contact information.
    
<!-- END_9c3d56ca438bc61f264f75d157cf51bd -->

<!-- START_92d13d95887bbc9f105182378dcca720 -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/customers/5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/customers/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/customers/5',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/customers/5'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "success": true
}
```
> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`DELETE api/customers/{customer}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | id of the Customer.

<!-- END_92d13d95887bbc9f105182378dcca720 -->

#Invoices


<!-- START_6e77697180e70f015dfee414f13ab0d0 -->
## List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/invoices" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/invoices"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/invoices',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/invoices'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/invoices`


<!-- END_6e77697180e70f015dfee414f13ab0d0 -->

<!-- START_f2f394df170a47d8b09cedffd5e7ade2 -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/invoices/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/invoices/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/invoices/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/invoices/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/invoices/{invoice}`


<!-- END_f2f394df170a47d8b09cedffd5e7ade2 -->

<!-- START_6c94c487ccbf03c34e1e7e401bec1a05 -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/invoices/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/invoices/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/invoices/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/invoices/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/invoices/{invoice}`

`PATCH api/invoices/{invoice}`


<!-- END_6c94c487ccbf03c34e1e7e401bec1a05 -->

<!-- START_e411af646252d46c41c2636689c82599 -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/invoices/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/invoices/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/invoices/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/invoices/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/invoices/{invoice}`


<!-- END_e411af646252d46c41c2636689c82599 -->

#Orders


<!-- START_f9301c03a9281c0847565f96e6f723de -->
## List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/orders',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/orders'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/orders`


<!-- END_f9301c03a9281c0847565f96e6f723de -->

<!-- START_285c87403b6cfdebe26bc357f22e870f -->
## Create new

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/orders',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/orders'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/orders`


<!-- END_285c87403b6cfdebe26bc357f22e870f -->

<!-- START_7e6be1b9dd04564a7b1298dd260f3183 -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/orders/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/orders/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/orders/{order}`


<!-- END_7e6be1b9dd04564a7b1298dd260f3183 -->

<!-- START_37f7b8cec13991c44b134bb2186e9d1e -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/orders/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/orders/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/orders/{order}`

`PATCH api/orders/{order}`


<!-- END_37f7b8cec13991c44b134bb2186e9d1e -->

<!-- START_c280b55cf267ef09fc12c6b09ac78ede -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/orders/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/orders/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/orders/{order}`


<!-- END_c280b55cf267ef09fc12c6b09ac78ede -->

#Preferences


<!-- START_d840b1887c6fa58257d72b258c65239d -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/preferences/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/preferences/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/preferences/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/preferences/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/preferences/{preference}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `preferences` |  required  | Id of preference

<!-- END_d840b1887c6fa58257d72b258c65239d -->

<!-- START_97b920581046ed15829fc8a92a2bb6f0 -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/preferences/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/preferences/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/preferences/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/preferences/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/preferences/{preference}`

`PATCH api/preferences/{preference}`


<!-- END_97b920581046ed15829fc8a92a2bb6f0 -->

#Products


<!-- START_86e0ac5d4f8ce9853bc22fd08f2a0109 -->
## List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/products',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/products'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/products`


<!-- END_86e0ac5d4f8ce9853bc22fd08f2a0109 -->

<!-- START_05b4383f00fd57c4828a831e7057e920 -->
## Create new

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/products',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/products'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/products`


<!-- END_05b4383f00fd57c4828a831e7057e920 -->

<!-- START_a285e63bc2d1a5b9428ae9aed745c779 -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/products/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/products/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/products/{product}`


<!-- END_a285e63bc2d1a5b9428ae9aed745c779 -->

<!-- START_b7842ce7893c09eb3c53713f82c2e12d -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/products/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/products/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/products/{product}`

`PATCH api/products/{product}`


<!-- END_b7842ce7893c09eb3c53713f82c2e12d -->

<!-- START_1d809ca5e8b10fa7fdc75d04506a55ea -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/products/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/products/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/products/{product}`


<!-- END_1d809ca5e8b10fa7fdc75d04506a55ea -->

#Quotes


<!-- START_56ba292f581ed455975d8ec6af1d8f08 -->
## List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/quotes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/quotes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/quotes',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/quotes'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/quotes`


<!-- END_56ba292f581ed455975d8ec6af1d8f08 -->

<!-- START_26a1da690bab0a9919b2b75870728658 -->
## Create new

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/quotes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/quotes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/quotes',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/quotes'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/quotes`


<!-- END_26a1da690bab0a9919b2b75870728658 -->

<!-- START_81618ac61fbe322199edf55cc9be79d8 -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/quotes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/quotes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/quotes/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/quotes/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/quotes/{quote}`


<!-- END_81618ac61fbe322199edf55cc9be79d8 -->

<!-- START_ccbed30888b2eab22decbbd01623fc2a -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/quotes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/quotes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/quotes/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/quotes/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/quotes/{quote}`

`PATCH api/quotes/{quote}`


<!-- END_ccbed30888b2eab22decbbd01623fc2a -->

<!-- START_fb1d7e996a3deaa44fe579cb1ab58466 -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/quotes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/quotes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/quotes/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/quotes/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/quotes/{quote}`


<!-- END_fb1d7e996a3deaa44fe579cb1ab58466 -->

#Value Lists


<!-- START_6ebe0f328dfe946144ae42d01cd2af4f -->
## List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/vl" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"list":"Categories"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/vl"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "list": "Categories"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/vl',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'list' => 'Categories',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/vl'
payload = {
    "list": "Categories"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers, json=payload)
response.json()
```


> Example response (401):

```json
{
    "error": "Non authorized"
}
```

### HTTP Request
`GET api/vl`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `list` | String |  required  | List name.
    
<!-- END_6ebe0f328dfe946144ae42d01cd2af4f -->

<!-- START_8f99230c0e246c32b0cf343763408474 -->
## Create value

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/vl" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/vl"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/vl',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/vl'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/vl`


<!-- END_8f99230c0e246c32b0cf343763408474 -->

<!-- START_c8232288f491c69e35eb8766784fe62f -->
## Update value

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/vl/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/vl/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/vl/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/vl/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/vl/{vl}`

`PATCH api/vl/{vl}`


<!-- END_c8232288f491c69e35eb8766784fe62f -->

<!-- START_e69b6ccd6b4c28393ed458462586db5f -->
## Delete value

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/vl/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/vl/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/vl/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/vl/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/vl/{vl}`


<!-- END_e69b6ccd6b4c28393ed458462586db5f -->


