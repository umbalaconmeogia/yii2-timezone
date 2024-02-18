# Yii2-Simple-Data-System design

## Database definition

### ERD

```plantuml
' avoid problems with angled crows feet
skinparam linetype ortho

entity "wc_schedule" as Schedule {
    * id : number <<generated>>
    * uuid : string
    * name : string
    --
    description : text
}

entity "wc_schedule_option" as ScheduleOption {
    * id : number <<generated>>
    * schedule_id: number
    * name : string
    * datetime : string
    * timezone : string
    --
    description : text
}

entity "wc_people" as People {
    * id : number <<generated>>
    * name : string
    --
    description : text
}

entity "wc_people_timezone" as PeopleTimezone {
    * id : number <<generated>>
    * people_id: number
    * timezone : string
    --
    name : string
}

entity "wc_schedule_option_people_timezone" as SOPT {
    * id : number <<generated>>
    * schedule_option_id: number
    * people_place_id: number
}

Schedule ||..|{ ScheduleOption
People ||..|{ PeopleTimezone
ScheduleOption ||..|{ SOPT
ScheduleOption ||..|{ PeopleTimezone
```

### Table "wc_schedule"

|column|description|
|----|----|
|id|Record id|
|uuid|Used to view in public|
|name|Name of the schedule|
|description|Description about the schedule|

### Table "wc_schedule_option"

|column|description|
|----|----|
|id|Record id|
|schedule_id|Link to schedule|
|name|Name of the schedule option|
|datetime|Y:m:d H:i:s|
|timezone|Timezone|
|description|Description about the schedule option|


### Table "wc_people"

|column|description|
|----|----|
|id|Record id|
|name|Name of the people|
|description|Description about the people|

### Table "wc_people_timezone"

|column|description|
|----|----|
|id|Record id|
|people_id|Link to people|
|timezone|Timezone|
|name|Name of the people timezone|

### Table "wc_schedule_option_people_timezone"

|column|description|
|----|----|
|id|Record id|
|schedule_option_id|Link to schedule_option|
|people_timezone_id|Link to people_timezone|
