# **Tes Seleksi Fullstack Jagoan Hosting**
Tes fullstack programmer menggunakan laravel untuk menampilkan dynamic api.
<br>
## **Instalatation**

1.Clone project
```
git clone https://github.com/muhilhamfajar/jagoanhosting_tes_fullstack.git
```

2.Masuk ke project yang sudah diclone
``` 
cd project
```

3.Install dependency
```
composer install
````

4.Setup Environtment Variable
```
cp .env.example .env
```
Kemudian masukkan pengaturan yang perlu seperti database. Jika pada file .env tidak terdapat ```APP_KEY``` maka bisa digenerate dengan menjalankan perintah di terminal.
```
php artisan key:generate
```

5.Migrate & Seed
```
php artisan migrate --seed
```

6.Run Local Dev Server
```
php artisan serve
```
<br>

## **Documentation API**

### **Get all data**
Get data tanpa query.
* Method : GET
* API : http://127.0.0.1:8000/api/siswa
* Response :
```
{
    "limit": 10,
    "current_page": 1,
    "total_row": 10,
    "total_page": 6,
    "data": [
        {
            "id": 1,
            "firstname": "Almira",
            "lastname": "Manullang",
            "gender": "",
            "status": "Active",
            "email": "samosir.unjani@yahoo.com",
            "city": "Bandung",
            "phone": "(+62) 560 8108 916",
            "created_at": "2019-05-24 20:15:44",
            "updated_at": null
        },
        {
            "id": 2,
            "firstname": "Tari",
            "lastname": "Nuraini",
            "gender": "female",
            "status": "Banned",
            "email": "zsudiati@yahoo.com",
            "city": "Tanjung Pinang",
            "phone": "(+62) 236 1239 892",
            "created_at": "2019-04-26 03:12:21",
            "updated_at": null
        },
        {
            "id": 3,
            "firstname": "Patricia",
            "lastname": "Maheswara",
            "gender": "male",
            "status": "Banned",
            "email": "saadat14@farida.co",
            "city": "Tarakan",
            "phone": "0822 0852 7387",
            "created_at": "2019-05-20 17:46:47",
            "updated_at": null
        },
        {
            "id": 4,
            "firstname": "Asmadi",
            "lastname": "Suryatmi",
            "gender": "male",
            "status": "Loss",
            "email": "carla.pratama@widiastuti.ac.id",
            "city": "Singkawang",
            "phone": "0752 7190 259",
            "created_at": "2019-05-12 17:13:55",
            "updated_at": null
        },
        {
            "id": 5,
            "firstname": "Dina",
            "lastname": "Sinaga",
            "gender": "male",
            "status": "Loss",
            "email": "arta86@yahoo.co.id",
            "city": "Magelang",
            "phone": "0378 1315 4772",
            "created_at": "2019-05-28 21:42:47",
            "updated_at": null
        },
        {
            "id": 6,
            "firstname": "Virman",
            "lastname": "Hardiansyah",
            "gender": "male",
            "status": "Loss",
            "email": "pertiwi.restu@gmail.com",
            "city": "Tidore Kepulauan",
            "phone": "(+62) 754 5176 9220",
            "created_at": "2019-05-17 22:16:46",
            "updated_at": null
        },
        {
            "id": 7,
            "firstname": "Gaiman",
            "lastname": "Purnawati",
            "gender": "male",
            "status": "Loss",
            "email": "lazuardi.victoria@gmail.co.id",
            "city": "Banda Aceh",
            "phone": "(+62) 341 3294 6561",
            "created_at": "2019-04-26 04:52:43",
            "updated_at": null
        },
        {
            "id": 8,
            "firstname": "Reksa",
            "lastname": "Uyainah",
            "gender": "male",
            "status": "Active",
            "email": "npurwanti@gmail.com",
            "city": "Pagar Alam",
            "phone": "(+62) 865 3427 6986",
            "created_at": "2019-05-04 06:05:13",
            "updated_at": null
        },
        {
            "id": 9,
            "firstname": "Tina",
            "lastname": "Budiman",
            "gender": "female",
            "status": "Loss",
            "email": "teguh.aryani@ardianto.in",
            "city": "Jambi",
            "phone": "0254 4731 1398",
            "created_at": "2019-05-09 12:17:47",
            "updated_at": null
        },
        {
            "id": 10,
            "firstname": "Teddy",
            "lastname": "Hastuti",
            "gender": "female",
            "status": "Loss",
            "email": "narpati.bella@yahoo.co.id",
            "city": "Pagar Alam",
            "phone": "0742 3067 6459",
            "created_at": "2019-04-26 20:31:45",
            "updated_at": null
        }
    ]
}
```

### **Get data With Query**
Get data dengan query yang diinputkan
* Method : GET
* Example API : http://127.0.0.1:8000/api/siswa?firstname=suryatmi
* Response : 
```
{
    "limit": 10,
    "current_page": 1,
    "total_row": 2,
    "total_page": 1,
    "select": null,
    "order": [],
    "data": [
        {
            "id": 4,
            "firstname": "Asmadi",
            "lastname": "Suryatmi",
            "gender": "male",
            "status": "Loss",
            "email": "carla.pratama@widiastuti.ac.id",
            "city": "Singkawang",
            "phone": "0752 7190 259",
            "created_at": "2019-05-12 17:13:55",
            "updated_at": null
        },
        {
            "id": 23,
            "firstname": "Fitriani",
            "lastname": "Suryatmi",
            "gender": "male",
            "status": "Active",
            "email": "eka.yulianti@tampubolon.asia",
            "city": "Bekasi",
            "phone": "(+62) 804 8909 2551",
            "created_at": "2019-05-03 05:36:03",
            "updated_at": null
        }
    ],
    "conditions": [
        {
            "type": "whereColumn",
            "data": [
                {
                    "firstname": null
                },
                {
                    "lastname": "Suryatmi"
                }
            ]
        }
    ]
}
```
* Parameter :
<br>

| Name  | Data Type | Description | Example |
| ------------- | ------------- | ----- | ---- |
| limit  | number  | ```Limit``` dari data yang akan ditampilkan| limit=10 |
| page  | number  | Menampilkan data pada halaman sesuai ```page``` | page=3
| select  | string  | ```Select``` berdasarkan kolom yang ingin ditampilkan | select=id,firstname |
| firstname  | string  | Menampilkan data yang sesuai dengan ```firstname``` | firstname=ilham
| lastname  | string  | Menampilkan data yang sesuai dengan ```lastname``` | lastname=fajar |
| gender  | boolean  | Menyeleksi data jika gender bernilai ```true``` maka data yang memiliki gender bernilai ```null``` akan ditampilkan | gender=true
| statusNotIn  | string  | Menampilkan data yang memiliki status tidak sama dengan ```statusNotIn``` <br> value yang tersedia = active, loss, banned, pending | statusNotIn=banned,loss
| statusIn  | string  | Menampilkan data yang memiliki status yabg sama dengan ```statusIn``` <br> value yang tersedia = active, loss, banned, pending | statusIn=active,pending
| idNotBetween  | number  | Menampilkan data yang memiliki id diluar ```idNotBetween``` | idNotBetween=10,20
| idBetween  | string  | Menampilkan data yang memiliki id diluar ```idBetween``` | idBetween=10,30
| idOrWhere  | number  | Menampilkan juga data berdasarkan ```idOrWhere``` | idOrWhere=10
| sign  | string  | Simbol yang berhubungan dengan ```idOrWhere``` untuk menyeleksi apakah lebih besar atau lebih kecil <br> value yang tersedia = '>', '<' | sign=<
| statusOrIn  | string  | Menampilkan juga data berdasarkan ```statusOrIn``` <br> value yang tersedia = active, loss, banned, pending | statusOrIn=active,loss
| statusOrNotIn  | string  | Menampilkan juga data berdasarkan ```statusOrIn``` <br> value yang tersedia = active, loss, banned, pending | statusOrNotIn=pending
| field  | string  | ```Field``` digunakan untuk mengurutkan data berdasarkan kolom yang dipilih | field=id
| order  | string  | ```order``` digunakan untuk mengurutkan data berdasarkan terbesar atau terkecil <br> value yang tersedia = asc,desc | order=desc
