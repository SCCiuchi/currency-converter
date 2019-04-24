# Currency Converter Application - PHP Beginner Learning Project
--


```
## Tasks:
* Get currency (and convert to any currency) using this url https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml
* Connect to db, get currency data from the db
* Create an API
```


### To Do: (code review issues from gitlab repo)
* function getApiResponse() -> exception case, what if the url becomes unavailable?
* $id = $_POST['currency']; -> rename to currency instead of id
* function getUserSelectedCurrency($id) -> validate user selected currency
* Separate exchange logic from output logic in get_input.php
* Add return types to function in get_input.php
* Separate into folders
