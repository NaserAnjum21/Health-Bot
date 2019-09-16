---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Admin Functionalities


APIs for managing admin side
<!-- START_c00ef9263a2b957d255a16ee8e98417d -->
## Get all the statistics for the admin

> Example request:

```bash
curl -X GET -G "http://localhost/admin_report" 
```

```javascript
const url = new URL("http://localhost/admin_report");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET admin_report`


<!-- END_c00ef9263a2b957d255a16ee8e98417d -->

<!-- START_e945125cab1984eb7d311d80b3657c10 -->
## Show Posts page for admin

> Example request:

```bash
curl -X GET -G "http://localhost/admin_post" 
```

```javascript
const url = new URL("http://localhost/admin_post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET admin_post`


<!-- END_e945125cab1984eb7d311d80b3657c10 -->

<!-- START_328a5d9715cefaecaf17bf4f57080a6c -->
## Create a post

> Example request:

```bash
curl -X POST "http://localhost/createPost" 
```

```javascript
const url = new URL("http://localhost/createPost");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST createPost`


<!-- END_328a5d9715cefaecaf17bf4f57080a6c -->

<!-- START_8fabfa6a257c8e489dfe2a9036848860 -->
## Remove posts

> Example request:

```bash
curl -X GET -G "http://localhost/removePost/1" 
```

```javascript
const url = new URL("http://localhost/removePost/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET removePost/{id}`


<!-- END_8fabfa6a257c8e489dfe2a9036848860 -->

#Appointment Management


APIs for managing appointment logics
<!-- START_fbed80fa46f5b0a94881170ca29e98d9 -->
## Create and store an appointment.

> Example request:

```bash
curl -X POST "http://localhost/appointments" \
    -H "Content-Type: application/json" \
    -d '{"dr_id":4}'

```

```javascript
const url = new URL("http://localhost/appointments");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "dr_id": 4
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST appointments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    dr_id | integer |  optional  | the ID of the appointed doctor

<!-- END_fbed80fa46f5b0a94881170ca29e98d9 -->

<!-- START_e5aa202a236c5ece23d581dd2a90f2bf -->
## Create and store an appointment.

> Example request:

```bash
curl -X POST "http://localhost/storeApp/1" \
    -H "Content-Type: application/json" \
    -d '{"dr_id":18}'

```

```javascript
const url = new URL("http://localhost/storeApp/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "dr_id": 18
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST storeApp/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    dr_id | integer |  optional  | the ID of the appointed doctor

<!-- END_e5aa202a236c5ece23d581dd2a90f2bf -->

<!-- START_daae9086e48eed150b57514ad0a52361 -->
## Confirm an appointment.

> Example request:

```bash
curl -X POST "http://localhost/confirm/1" 
```

```javascript
const url = new URL("http://localhost/confirm/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST confirm/{id}`


<!-- END_daae9086e48eed150b57514ad0a52361 -->

<!-- START_dedadd2cb936412b51b6727483445c36 -->
## Reschedule an appointment from doctor side

> Example request:

```bash
curl -X POST "http://localhost/reschedule/1" \
    -H "Content-Type: application/json" \
    -d '{"app_id":5}'

```

```javascript
const url = new URL("http://localhost/reschedule/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "app_id": 5
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST reschedule/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    app_id | integer |  optional  | the ID of the appointment to be rescheduled

<!-- END_dedadd2cb936412b51b6727483445c36 -->

<!-- START_c8ba88167742bf209ecf45d9d0f626ef -->
## Cancel an Appointment from Patient

> Example request:

```bash
curl -X POST "http://localhost/cancelFromPat/1" \
    -H "Content-Type: application/json" \
    -d '{"app_id":17}'

```

```javascript
const url = new URL("http://localhost/cancelFromPat/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "app_id": 17
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST cancelFromPat/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    app_id | integer |  optional  | the ID of the appointment to be cancelled

<!-- END_c8ba88167742bf209ecf45d9d0f626ef -->

<!-- START_f64011a5e529c248c7fb6b1d8429a865 -->
## Show Patient Appointments

> Example request:

```bash
curl -X GET -G "http://localhost/show_pat_appointments" 
```

```javascript
const url = new URL("http://localhost/show_pat_appointments");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET show_pat_appointments`


<!-- END_f64011a5e529c248c7fb6b1d8429a865 -->

<!-- START_50c04482df6adc05dd7078fffadee226 -->
## Show Patient Prescriptions

> Example request:

```bash
curl -X GET -G "http://localhost/show_pat_prescriptions" 
```

```javascript
const url = new URL("http://localhost/show_pat_prescriptions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET show_pat_prescriptions`


<!-- END_50c04482df6adc05dd7078fffadee226 -->

<!-- START_a5d7ebead4ad4ed9aceb45d713053ae8 -->
## Show Doctor Appointments

> Example request:

```bash
curl -X GET -G "http://localhost/show_doc_appointments" 
```

```javascript
const url = new URL("http://localhost/show_doc_appointments");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET show_doc_appointments`


<!-- END_a5d7ebead4ad4ed9aceb45d713053ae8 -->

<!-- START_ab10d1218508f8d9dbde443ed77225ae -->
## Show Doctor Prescriptions

> Example request:

```bash
curl -X GET -G "http://localhost/show_doc_prescriptions" 
```

```javascript
const url = new URL("http://localhost/show_doc_prescriptions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET show_doc_prescriptions`


<!-- END_ab10d1218508f8d9dbde443ed77225ae -->

#Disease Management


APIs for managing diseases
<!-- START_76e3d0768ca020e40cbee251b50022df -->
## pickdisease
> Example request:

```bash
curl -X GET -G "http://localhost/pickdisease" 
```

```javascript
const url = new URL("http://localhost/pickdisease");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "name": "Rhinitis"
    },
    {
        "name": "Sinusitis"
    }
]
```

### HTTP Request
`GET pickdisease`


<!-- END_76e3d0768ca020e40cbee251b50022df -->

#Doctor Functionalities


APIs for managing doctor related methods
<!-- START_34060b7ea238096ebd642929ae36b723 -->
## Display a list of doctors

> Example request:

```bash
curl -X GET -G "http://localhost/doctors" 
```

```javascript
const url = new URL("http://localhost/doctors");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET doctors`


<!-- END_34060b7ea238096ebd642929ae36b723 -->

<!-- START_d18cc08b26d472ef2a0bd46d7bcdbbe9 -->
## doctors/{doctor}/edit
> Example request:

```bash
curl -X GET -G "http://localhost/doctors/1/edit" 
```

```javascript
const url = new URL("http://localhost/doctors/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET doctors/{doctor}/edit`


<!-- END_d18cc08b26d472ef2a0bd46d7bcdbbe9 -->

<!-- START_3a62d06cb3fe76b8c6aa62576dde2ba0 -->
## Update doctor profile

> Example request:

```bash
curl -X PUT "http://localhost/doctors/1" 
```

```javascript
const url = new URL("http://localhost/doctors/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT doctors/{doctor}`

`PATCH doctors/{doctor}`


<!-- END_3a62d06cb3fe76b8c6aa62576dde2ba0 -->

<!-- START_aa701c451c4f1df651f29f22b0f26c20 -->
## Show sorted doctor list to patient

> Example request:

```bash
curl -X GET -G "http://localhost/select_doctor" 
```

```javascript
const url = new URL("http://localhost/select_doctor");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET select_doctor`


<!-- END_aa701c451c4f1df651f29f22b0f26c20 -->

<!-- START_f62431f547d73e200e91e82142b9e428 -->
## Approve a doctor (by admin)

> Example request:

```bash
curl -X GET -G "http://localhost/approve/1" 
```

```javascript
const url = new URL("http://localhost/approve/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET approve/{id}`


<!-- END_f62431f547d73e200e91e82142b9e428 -->

<!-- START_6b3e7e6fda15c2af876e1b8155040296 -->
## Disapprove a doctor (by admin)

> Example request:

```bash
curl -X GET -G "http://localhost/disapprove/1" 
```

```javascript
const url = new URL("http://localhost/disapprove/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET disapprove/{id}`


<!-- END_6b3e7e6fda15c2af876e1b8155040296 -->

<!-- START_60e23eac1d9fee98af6a2b54efd4754d -->
## Refer a doctor (by other registered doctors)

> Example request:

```bash
curl -X GET -G "http://localhost/refer/1" 
```

```javascript
const url = new URL("http://localhost/refer/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET refer/{id}`


<!-- END_60e23eac1d9fee98af6a2b54efd4754d -->

<!-- START_c8541930af928112694a816f16164967 -->
## searchDoctor
> Example request:

```bash
curl -X GET -G "http://localhost/searchDoctor" 
```

```javascript
const url = new URL("http://localhost/searchDoctor");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response:

```json
null
```

### HTTP Request
`GET searchDoctor`


<!-- END_c8541930af928112694a816f16164967 -->

<!-- START_de5d5e5993797dfe16662c5e44b52966 -->
## Update doctor profile

> Example request:

```bash
curl -X POST "http://localhost/updateDoc" 
```

```javascript
const url = new URL("http://localhost/updateDoc");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST updateDoc`


<!-- END_de5d5e5993797dfe16662c5e44b52966 -->

<!-- START_c29604372a94cb764c58135d204af0ec -->
## Rating and giving feedback to doctor

> Example request:

```bash
curl -X POST "http://localhost/rate/1" \
    -H "Content-Type: application/json" \
    -d '{"dr_id":7}'

```

```javascript
const url = new URL("http://localhost/rate/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "dr_id": 7
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST rate/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    dr_id | integer |  optional  | the ID of the rated doctor

<!-- END_c29604372a94cb764c58135d204af0ec -->

<!-- START_5d3a87a12aa7db84035604f197c02e3d -->
## Search Doctors

Patient can search by name, location, speciality

> Example request:

```bash
curl -X GET -G "http://localhost/doctorSearch" 
```

```javascript
const url = new URL("http://localhost/doctorSearch");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET doctorSearch`

`POST doctorSearch`

`PUT doctorSearch`

`PATCH doctorSearch`

`DELETE doctorSearch`

`OPTIONS doctorSearch`


<!-- END_5d3a87a12aa7db84035604f197c02e3d -->

#Medicine Functionalities


APIs for managing medicine and medicine logs
<!-- START_3d60dc42e580dada82bc38a066d97df5 -->
## Show medicine info of the patient

> Example request:

```bash
curl -X GET -G "http://localhost/show_pat_medicines/1" \
    -H "Content-Type: application/json" \
    -d '{"patient_id":8}'

```

```javascript
const url = new URL("http://localhost/show_pat_medicines/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "patient_id": 8
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET show_pat_medicines/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    patient_id | integer |  optional  | the ID of the patient

<!-- END_3d60dc42e580dada82bc38a066d97df5 -->

#Patient Functionalities


APIs for managing patient related methods
<!-- START_3b8aa393c70749e5ee650c3aa85850d3 -->
## Display a listing of patients

> Example request:

```bash
curl -X GET -G "http://localhost/patients" 
```

```javascript
const url = new URL("http://localhost/patients");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET patients`


<!-- END_3b8aa393c70749e5ee650c3aa85850d3 -->

<!-- START_1dc24064976726738a0eb620a38d2ec3 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/patients/create" 
```

```javascript
const url = new URL("http://localhost/patients/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET patients/create`


<!-- END_1dc24064976726738a0eb620a38d2ec3 -->

<!-- START_b44a6f256a52859d517180ca4bdecee7 -->
## patients
> Example request:

```bash
curl -X POST "http://localhost/patients" 
```

```javascript
const url = new URL("http://localhost/patients");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST patients`


<!-- END_b44a6f256a52859d517180ca4bdecee7 -->

<!-- START_2219d9ea499b5f43086e5d0014b58f78 -->
## patients/{patient}
> Example request:

```bash
curl -X GET -G "http://localhost/patients/1" 
```

```javascript
const url = new URL("http://localhost/patients/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET patients/{patient}`


<!-- END_2219d9ea499b5f43086e5d0014b58f78 -->

<!-- START_acc24fc2b8d2d886b6fc89354ca784bd -->
## patients/{patient}/edit
> Example request:

```bash
curl -X GET -G "http://localhost/patients/1/edit" 
```

```javascript
const url = new URL("http://localhost/patients/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET patients/{patient}/edit`


<!-- END_acc24fc2b8d2d886b6fc89354ca784bd -->

<!-- START_cd7f4e6549330969c9bdd75a4d61b9f7 -->
## Update patient profile

> Example request:

```bash
curl -X PUT "http://localhost/patients/1" 
```

```javascript
const url = new URL("http://localhost/patients/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT patients/{patient}`

`PATCH patients/{patient}`


<!-- END_cd7f4e6549330969c9bdd75a4d61b9f7 -->

<!-- START_cdca394843cb69779981a896be9ca3a4 -->
## patients/{patient}
> Example request:

```bash
curl -X DELETE "http://localhost/patients/1" 
```

```javascript
const url = new URL("http://localhost/patients/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE patients/{patient}`


<!-- END_cdca394843cb69779981a896be9ca3a4 -->

<!-- START_93925e2fc670b59bcb67a60a286ada31 -->
## Update patient profile

> Example request:

```bash
curl -X POST "http://localhost/updatePat" 
```

```javascript
const url = new URL("http://localhost/updatePat");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST updatePat`


<!-- END_93925e2fc670b59bcb67a60a286ada31 -->

<!-- START_add27f3ea8dd7bb99e71fa63f5836968 -->
## Show health overview to patient

> Example request:

```bash
curl -X GET -G "http://localhost/my_health/1" \
    -H "Content-Type: application/json" \
    -d '{"patient_id":1}'

```

```javascript
const url = new URL("http://localhost/my_health/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "patient_id": 1
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET my_health/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    patient_id | integer |  optional  | the ID of the patient user

<!-- END_add27f3ea8dd7bb99e71fa63f5836968 -->

#Prescription Management


APIs for handling prescription functionalities
<!-- START_e0bdc5d0f8b40c40794bbffad54f5005 -->
## Display a listing of the Prescriptions.

> Example request:

```bash
curl -X GET -G "http://localhost/prescriptions" 
```

```javascript
const url = new URL("http://localhost/prescriptions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET prescriptions`


<!-- END_e0bdc5d0f8b40c40794bbffad54f5005 -->

<!-- START_83a75f5f9bc5bf0c133b54b386331ffb -->
## prescriptions/create
> Example request:

```bash
curl -X GET -G "http://localhost/prescriptions/create" 
```

```javascript
const url = new URL("http://localhost/prescriptions/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET prescriptions/create`


<!-- END_83a75f5f9bc5bf0c133b54b386331ffb -->

<!-- START_beb551dc683bf4ca64cb0df295a23ac0 -->
## Create and store an prescription

This also stores values to Medicine and Disease Log table

> Example request:

```bash
curl -X POST "http://localhost/prescriptions" \
    -H "Content-Type: application/json" \
    -d '{"app_id":6}'

```

```javascript
const url = new URL("http://localhost/prescriptions");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "app_id": 6
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST prescriptions`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    app_id | integer |  optional  | the ID of the corresponding appointment

<!-- END_beb551dc683bf4ca64cb0df295a23ac0 -->

<!-- START_ca158f03f9db9949fb525435bc1273e1 -->
## prescriptions/{prescription}
> Example request:

```bash
curl -X GET -G "http://localhost/prescriptions/1" 
```

```javascript
const url = new URL("http://localhost/prescriptions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\prescription]."
}
```

### HTTP Request
`GET prescriptions/{prescription}`


<!-- END_ca158f03f9db9949fb525435bc1273e1 -->

<!-- START_c3c474ff0e03e759f3129a79d125b46b -->
## prescriptions/{prescription}/edit
> Example request:

```bash
curl -X GET -G "http://localhost/prescriptions/1/edit" 
```

```javascript
const url = new URL("http://localhost/prescriptions/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\prescription]."
}
```

### HTTP Request
`GET prescriptions/{prescription}/edit`


<!-- END_c3c474ff0e03e759f3129a79d125b46b -->

<!-- START_10b36134726e17463d62f23e11d52586 -->
## prescriptions/{prescription}
> Example request:

```bash
curl -X PUT "http://localhost/prescriptions/1" 
```

```javascript
const url = new URL("http://localhost/prescriptions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT prescriptions/{prescription}`

`PATCH prescriptions/{prescription}`


<!-- END_10b36134726e17463d62f23e11d52586 -->

<!-- START_7624075c27c23e4954901c88c3f07c20 -->
## prescriptions/{prescription}
> Example request:

```bash
curl -X DELETE "http://localhost/prescriptions/1" 
```

```javascript
const url = new URL("http://localhost/prescriptions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE prescriptions/{prescription}`


<!-- END_7624075c27c23e4954901c88c3f07c20 -->

<!-- START_6c7c7c85ca1a0b4171c93a1a19a3f98a -->
## Create and store an prescription

This also stores values to Medicine and Disease Log table

> Example request:

```bash
curl -X POST "http://localhost/storePresc/1" \
    -H "Content-Type: application/json" \
    -d '{"app_id":12}'

```

```javascript
const url = new URL("http://localhost/storePresc/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "app_id": 12
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST storePresc/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    app_id | integer |  optional  | the ID of the corresponding appointment

<!-- END_6c7c7c85ca1a0b4171c93a1a19a3f98a -->

<!-- START_9873d2680ee803f8e5a5597161270bec -->
## Show a presctiption form to doctor

> Example request:

```bash
curl -X GET -G "http://localhost/showPrescForm/1" 
```

```javascript
const url = new URL("http://localhost/showPrescForm/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET showPrescForm/{id}`


<!-- END_9873d2680ee803f8e5a5597161270bec -->

<!-- START_dff72f0e2c8daf37be0b327584de1eef -->
## Show Prescription Details

> Example request:

```bash
curl -X GET -G "http://localhost/showPresc/1" 
```

```javascript
const url = new URL("http://localhost/showPresc/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET showPresc/{id}`


<!-- END_dff72f0e2c8daf37be0b327584de1eef -->

#general


<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET -G "http://localhost/" 
```

```javascript
const url = new URL("http://localhost/");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "http://localhost/logout" 
```

```javascript
const url = new URL("http://localhost/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://localhost/password/email" 
```

```javascript
const url = new URL("http://localhost/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset/1" 
```

```javascript
const url = new URL("http://localhost/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_251f615cf72ce13685e4f8602f739719 -->
## Below methods are added for different login of patients and doctors

> Example request:

```bash
curl -X GET -G "http://localhost/login/patient" 
```

```javascript
const url = new URL("http://localhost/login/patient");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login/patient`


<!-- END_251f615cf72ce13685e4f8602f739719 -->

<!-- START_95a1d74f96ad128d613db99a33b51051 -->
## login/doctor
> Example request:

```bash
curl -X GET -G "http://localhost/login/doctor" 
```

```javascript
const url = new URL("http://localhost/login/doctor");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login/doctor`


<!-- END_95a1d74f96ad128d613db99a33b51051 -->

<!-- START_decc5f3e5012239c4a797c8bdaa5ef6e -->
## register/patient
> Example request:

```bash
curl -X GET -G "http://localhost/register/patient" 
```

```javascript
const url = new URL("http://localhost/register/patient");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register/patient`


<!-- END_decc5f3e5012239c4a797c8bdaa5ef6e -->

<!-- START_9206414d2821fd630ff7dd3147bac43b -->
## register/doctor
> Example request:

```bash
curl -X GET -G "http://localhost/register/doctor" 
```

```javascript
const url = new URL("http://localhost/register/doctor");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register/doctor`


<!-- END_9206414d2821fd630ff7dd3147bac43b -->

<!-- START_d3d55c30c8ec7b3cff00d409666700aa -->
## login/patient
> Example request:

```bash
curl -X POST "http://localhost/login/patient" 
```

```javascript
const url = new URL("http://localhost/login/patient");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login/patient`


<!-- END_d3d55c30c8ec7b3cff00d409666700aa -->

<!-- START_fd9c3d68ff9aa9591d708e26d5aacba7 -->
## login/doctor
> Example request:

```bash
curl -X POST "http://localhost/login/doctor" 
```

```javascript
const url = new URL("http://localhost/login/doctor");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login/doctor`


<!-- END_fd9c3d68ff9aa9591d708e26d5aacba7 -->

<!-- START_183eb840a3dc222f77503f4f0666383b -->
## register/patient
> Example request:

```bash
curl -X POST "http://localhost/register/patient" 
```

```javascript
const url = new URL("http://localhost/register/patient");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register/patient`


<!-- END_183eb840a3dc222f77503f4f0666383b -->

<!-- START_716b208ef288108fb33d42ec9ef5ef47 -->
## register/doctor
> Example request:

```bash
curl -X POST "http://localhost/register/doctor" 
```

```javascript
const url = new URL("http://localhost/register/doctor");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register/doctor`


<!-- END_716b208ef288108fb33d42ec9ef5ef47 -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET -G "http://localhost/home" 
```

```javascript
const url = new URL("http://localhost/home");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_30328edff5a8d67c26641767d58db740 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET -G "http://localhost/doctor" 
```

```javascript
const url = new URL("http://localhost/doctor");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET doctor`


<!-- END_30328edff5a8d67c26641767d58db740 -->

<!-- START_8d9cc74802fb146ad999bfb804873ea1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/medicines" 
```

```javascript
const url = new URL("http://localhost/medicines");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET medicines`


<!-- END_8d9cc74802fb146ad999bfb804873ea1 -->

<!-- START_2332bd81f7047716d4717b5b723beaa1 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/medicines/create" 
```

```javascript
const url = new URL("http://localhost/medicines/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET medicines/create`


<!-- END_2332bd81f7047716d4717b5b723beaa1 -->

<!-- START_70922779dc9992c9296038d25a618b7e -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/medicines" 
```

```javascript
const url = new URL("http://localhost/medicines");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST medicines`


<!-- END_70922779dc9992c9296038d25a618b7e -->

<!-- START_81374c1264a20bf7588dcc7d70cdc5ae -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/medicines/1" 
```

```javascript
const url = new URL("http://localhost/medicines/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response:

```json
null
```

### HTTP Request
`GET medicines/{medicine}`


<!-- END_81374c1264a20bf7588dcc7d70cdc5ae -->

<!-- START_7b9fb5970de076ddb91f21ff30088e27 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/medicines/1/edit" 
```

```javascript
const url = new URL("http://localhost/medicines/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response:

```json
null
```

### HTTP Request
`GET medicines/{medicine}/edit`


<!-- END_7b9fb5970de076ddb91f21ff30088e27 -->

<!-- START_4ec76dda4a032c27c169f8ecd5e0e637 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/medicines/1" 
```

```javascript
const url = new URL("http://localhost/medicines/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT medicines/{medicine}`

`PATCH medicines/{medicine}`


<!-- END_4ec76dda4a032c27c169f8ecd5e0e637 -->

<!-- START_29ff0805c1d64ddae42a2331deb572d1 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/medicines/1" 
```

```javascript
const url = new URL("http://localhost/medicines/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE medicines/{medicine}`


<!-- END_29ff0805c1d64ddae42a2331deb572d1 -->

<!-- START_a6fbbcffcf6a41e260c17339eedf3a0b -->
## Suggest medicine

> Example request:

```bash
curl -X GET -G "http://localhost/pickmedicine" 
```

```javascript
const url = new URL("http://localhost/pickmedicine");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET pickmedicine`


<!-- END_a6fbbcffcf6a41e260c17339eedf3a0b -->


