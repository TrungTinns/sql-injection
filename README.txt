Author: 
MAI THẾ GIA BẢO – 520H0513
HUỲNH VĂN ĐỆ – 520H0036
NGUYỄN CHÁNH TÍN – 520H0587
NGUYỄN TRUNG TÍN – 520H0589

Prepare the source code:
- Copy the folder Demo Sql_Injection into xampp's htdocs folder

Data preparation: 
- in http://localhost/phpmyadmin/
- import file sql /mysql/sql/data.sql
  + account1: account table with unencrypted password
  + account2: account table with password encrypted BCRYPT standard
  + product: a table containing information about the products of the website

Structure:
- Mysql folder: contains database
- web_attacked folder: contains the relevant code for the website that was hacked sql injection
- web_security folder: contains relevant code for sql injection prevention website

How to do it:
web_attacked: 
  Form 1:
  test account: username: "NV01", password: "123456" (take the inner part "")
  Attack: username: "'or 1 = 1 = 1 -- " , password: arbitrary
  Form 2:
  Select the product on the navigation bar:
  Enter "5000000' union all select username, password ,firstname , email, lastname from account1 -- " (take the part in "")
  
