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