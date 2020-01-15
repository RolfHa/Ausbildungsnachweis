# Ausbildungsnachweis

### Datenbank erstellen (edu_documentation)

##### Tables:

```
Users (id, firstname, lastname, password, education_start_date)
Days (id, user_id, date, description, hours, totalhours, department)
Notices (id, user_id, date, notice)
Departments (id, name)
```

##### Classes:

```
User:
    Read
Day:
    Create
    Update
    Read
Notice:
    Create
    Update
    Read
Department:
    Read
```




## VIEW GET DATA

Daten die wir im View brauchen:

```
Array(
    [data] => Array(
        [document] => Array(
            [userId] => 14
            [userFirstname] => John
            [userLastname] => Doe
            [year] => 2020
            [number] => 12
            [start] => 2019-12-10
            [notice] => Notice
        )

        [sheet] => Array(
            [description] => Array(
                [0] => Description Mo
                [1] => Description Di
                [2] => Description Mi
                [3] => Description Do
                [4] => Description Fr
                [5] => Description Sa
                [6] => Description So
            )

            [hours] => Array(
                [0] => 8\n10
                [1] => 5
                [2] => 5
                [3] => 5
                [4] => 5
                [5] => 
                [6] => 
            )

            [department] => Array(
                [0] => 1
                [1] => 2
                [2] => 3
                [3] => 1
                [4] => 1
                [5] => 1
                [6] => 1
            )

            [totalHours] => Array(
                [0] => 18
                [1] => 5
                [2] => 5
                [3] => 5
                [4] => 5
                [5] => 
                [6] => 
            )
        )
    )
)
```