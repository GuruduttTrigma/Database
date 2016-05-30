---------------------------------------------------------		
					SQL SELECT
---------------------------------------------------------
		SELECT CustomerName,City FROM Customers; 
					OR
		SELECT * FROM Customers; 


---------------------------------------------------------
					SELECT DISTINCT
---------------------------------------------------------
		SELECT DISTINCT City FROM Customers; 


---------------------------------------------------------
					SQL SELECT TOP Clause
---------------------------------------------------------
		 SELECT TOP 2 * FROM Customers; 
					OR
		 SELECT TOP 50 PERCENT * FROM Customers; 


---------------------------------------------------------
					SQL WHERE Clause
---------------------------------------------------------
		SELECT * FROM Customers
		WHERE Country='Mexico';


---------------------------------------------------------
					Operators in The WHERE Clause
---------------------------------------------------------
		Operator 	Description
		= 			Equal
		<> 			Not equal. Note: In some versions of SQL this operator may be written as !=
		> 			Greater than
		< 			Less than		
		<= 			Less than or equal
		BETWEEN 	Between an inclusive range
		LIKE 		Search for a pattern
		IN 			To specify multiple possible values for a column
		>= 			Greater than or equal	  


----------------------------------------------------------
					SQL AND & OR Operators
----------------------------------------------------------
		SELECT * FROM Customers
		WHERE Country='Germany'
		AND (City='Berlin' OR City='München'); 


----------------------------------------------------------
					SQL ORDER BY Keyword
----------------------------------------------------------
		SELECT * FROM Customers
		ORDER BY Country ASC, CustomerName DESC;


----------------------------------------------------------
					SQL INSERT INTO Statement
----------------------------------------------------------
		INSERT INTO table_name
		VALUES (value1,value2,value3,...);
					OR
		INSERT INTO table_name (column1,column2,column3,...)
		VALUES (value1,value2,value3,...);


----------------------------------------------------------
					SQL UPDATE Statement
----------------------------------------------------------
		UPDATE Customers
		SET ContactName='Alfred Schmidt', City='Hamburg'
		WHERE CustomerName='Alfreds Futterkiste'; 


----------------------------------------------------------
					SQL DELETE Statement
----------------------------------------------------------
		DELETE FROM Customers
		WHERE CustomerName='Alfreds Futterkiste' AND ContactName='Maria Anders'; 


----------------------------------------------------------
					SQL LIKE Operator
----------------------------------------------------------
		SELECT * FROM Customers
		WHERE Country LIKE '%land%';
					OR
		SELECT * FROM Customers
		WHERE Country NOT LIKE '%land%';


-----------------------------------------------------------
					SQL Wildcards
-----------------------------------------------------------
		SELECT * FROM Customers
		WHERE City LIKE '_erlin'; 
					OR
		SELECT * FROM Customers
		WHERE City LIKE 'L_n_on'; 
					OR
		SELECT * FROM Customers
		WHERE City LIKE '[a-c]%'; 
					OR
		SELECT * FROM Customers
		WHERE City LIKE '[!bsp]%';
					OR
		SELECT * FROM Customers
		WHERE City NOT LIKE '[bsp]%';


------------------------------------------------------------
					SQL IN Operator
------------------------------------------------------------
		SELECT * FROM Customers
		WHERE City IN ('Paris','London'); 


------------------------------------------------------------
					SQL BETWEEN Operator
------------------------------------------------------------
		SELECT * FROM Products
		WHERE (Price BETWEEN 10 AND 20)
		AND NOT CategoryID IN (1,2,3); 


-------------------------------------------------------------
					SQL Aliases
-------------------------------------------------------------
		SELECT o.OrderID, o.OrderDate, c.CustomerName
		FROM Customers AS c, Orders AS o
		WHERE c.CustomerName="Around the Horn" AND c.CustomerID=o.CustomerID; 


-------------------------------------------------------------
					SQL INNER JOIN Keyword
-------------------------------------------------------------
		SELECT Customers.CustomerName, Orders.OrderID
		FROM Customers
		INNER JOIN Orders
		ON Customers.CustomerID=Orders.CustomerID
		ORDER BY Customers.CustomerName;


-------------------------------------------------------------
					SQL LEFT JOIN Keyword
-------------------------------------------------------------
		SELECT Customers.CustomerName, Orders.OrderID
		FROM Customers
		LEFT JOIN Orders
		ON Customers.CustomerID=Orders.CustomerID
		ORDER BY Customers.CustomerName; 


--------------------------------------------------------------
					SQL RIGHT JOIN Keyword
--------------------------------------------------------------
		SELECT Orders.OrderID, Employees.FirstName
		FROM Orders
		RIGHT JOIN Employees
		ON Orders.EmployeeID=Employees.EmployeeID
		ORDER BY Orders.OrderID;


--------------------------------------------------------------
					SQL FULL OUTER JOIN Keyword
--------------------------------------------------------------
		SELECT Customers.CustomerName, Orders.OrderID
		FROM Customers
		FULL OUTER JOIN Orders
		ON Customers.CustomerID=Orders.CustomerID
		ORDER BY Customers.CustomerName;


--------------------------------------------------------------
					SQL UNION Operator
--------------------------------------------------------------
		SELECT City FROM Customers
		UNION
		SELECT City FROM Suppliers
		ORDER BY City;
			OR
		SELECT City, Country FROM Customers
		WHERE Country='Germany'
		UNION ALL
		SELECT City, Country FROM Suppliers
		WHERE Country='Germany'
		ORDER BY City; 


---------------------------------------------------------------
					SQL SELECT INTO Statement
---------------------------------------------------------------

		SELECT *
		INTO newtable [IN externaldb]
		FROM table1;


---------------------------------------------------------------
					SQL INSERT INTO SELECT Statement
---------------------------------------------------------------

		INSERT INTO Customers (CustomerName, Country)
		SELECT SupplierName, Country FROM Suppliers; 


---------------------------------------------------------------
					SQL Constraints
---------------------------------------------------------------
		SQL constraints are used to specify rules for the data in a table.

		In SQL, we have the following constraints:

		NOT NULL 	- Indicates that a column cannot store NULL value
		UNIQUE 		- Ensures that each row for a column must have a unique value
		PRIMARY KEY - A combination of a NOT NULL and UNIQUE. Ensures that a column (or combination of two or more columns) 
						have a unique identity which helps to find a particular record in a table more easily and quickly
		FOREIGN KEY - Ensure the referential integrity of the data in one table to match values in another table
		CHECK 		- Ensures that the value in a column meets a specific condition
		DEFAULT 	- Specifies a default value for a column

		CREATE TABLE Orders
		(
		O_Id int NOT NULL,
		OrderNo int NOT NULL,
		P_Id int,
		PRIMARY KEY (O_Id),
		FOREIGN KEY (P_Id) REFERENCES Persons(P_Id)
		)

---------------------------------------------------------------
					SQL NOT NULL Constraint
---------------------------------------------------------------
		The NOT NULL constraint enforces a column to NOT accept NULL values.
		The NOT NULL constraint enforces a field to always contain a value. 
		This means that you cannot insert a new record, or update a record without adding a value to this field.
		The following SQL enforces the "P_Id" column and the "LastName" column to not accept NULL values:
		
		
----------------------------------------------------------------
					SQL UNIQUE Constraint
----------------------------------------------------------------
		The UNIQUE constraint uniquely identifies each record in a database table.
		The UNIQUE and PRIMARY KEY constraints both provide a guarantee for uniqueness for a column or set of columns.
		A PRIMARY KEY constraint automatically has a UNIQUE constraint defined on it.
		Note that you can have many UNIQUE constraints per table, but only one PRIMARY KEY constraint per table.

		
---------------------------------------------------------------
					SQL PRIMARY KEY Constraint
---------------------------------------------------------------
		The PRIMARY KEY constraint uniquely identifies each record in a database table.
		Primary keys must contain UNIQUE values.
		A primary key column cannot contain NULL values.
		Most tables should have a primary key, and each table can have only ONE primary key.

		
----------------------------------------------------------------
					SQL FOREIGN KEY Constraint
----------------------------------------------------------------
		A FOREIGN KEY in one table points to a PRIMARY KEY in another table.


----------------------------------------------------------------
					SQL CHECK Constraint
----------------------------------------------------------------
		The CHECK constraint is used to limit the value range that can be placed in a column.
		If you define a CHECK constraint on a single column it allows only certain values for this column.
		If you define a CHECK constraint on a table it can limit the values in certain columns based on values in other columns in the row.


----------------------------------------------------------------
					SQL DEFAULT Constraint
----------------------------------------------------------------
		The DEFAULT constraint is used to insert a default value into a column.
		The default value will be added to all new records, if no other value is specified.

		CREATE TABLE Persons
		(
		P_Id int NOT NULL,
		LastName varchar(255) NOT NULL,
		FirstName varchar(255),
		Address varchar(255),
		City varchar(255) DEFAULT 'Sandnes'
		)


-----------------------------------------------------------------
					SQL ALTER TABLE Statement
-----------------------------------------------------------------
		The ALTER TABLE statement is used to add, delete, or modify columns in an existing table.

		ALTER TABLE table_name
		ADD column_name datatype
				OR
		ALTER TABLE table_name
		DROP COLUMN column_name
				

-----------------------------------------------------------------
					SQL AUTO INCREMENT Field
-----------------------------------------------------------------
		Auto-increment allows a unique number to be generated when a new record is inserted into a table.

		CREATE TABLE Persons
		(
		ID int NOT NULL AUTO_INCREMENT,
		LastName varchar(255) NOT NULL,
		FirstName varchar(255),
		Address varchar(255),
		City varchar(255),
		PRIMARY KEY (ID)
		)


------------------------------------------------------------------
					SQL Views
------------------------------------------------------------------
		In SQL, a view is a virtual table based on the result-set of an SQL statement.
		A view contains rows and columns, just like a real table. The fields in a view are fields from one or more real tables in the database.
		You can add SQL functions, WHERE, and JOIN statements to a view and present the data as if the data were coming from one single table.

		CREATE VIEW [Current Product List] AS
		SELECT ProductID,ProductName
		FROM Products
		WHERE Discontinued=No

				OR

		CREATE OR REPLACE VIEW view_name AS
		SELECT column_name(s)
		FROM table_name
		WHERE condition

				OR

		 DROP VIEW view_name


-----------------------------------------------------------------
					MySQL Date Functions
-----------------------------------------------------------------
		The following table lists the most important built-in date functions in MySQL:
		Function 	Description
		NOW() 	Returns the current date and time
		CURDATE() 	Returns the current date
		CURTIME() 	Returns the current time
		DATE() 	Extracts the date part of a date or date/time expression
		EXTRACT() 	Returns a single part of a date/time
		DATE_ADD() 	Adds a specified time interval to a date
		DATE_SUB() 	Subtracts a specified time interval from a date
		DATEDIFF() 	Returns the number of days between two dates
		DATE_FORMAT() 	Displays date/time data in different formats


------------------------------------------------------------------
					SQL Functions
------------------------------------------------------------------
		SQL has many built-in functions for performing calculations on data.
		SQL Aggregate Functions

		SQL aggregate functions return a single value, calculated from values in a column.

		Useful aggregate functions:

			AVG() 	- Returns the average value
			COUNT() - Returns the number of rows
			FIRST() - Returns the first value
			LAST() 	- Returns the last value
			MAX() 	- Returns the largest value
			MIN() 	- Returns the smallest value
			SUM() 	- Returns the sum

		SQL Scalar functions

		SQL scalar functions return a single value, based on the input value.

		Useful scalar functions:

			UCASE() - Converts a field to upper case
			LCASE() - Converts a field to lower case
			MID() 	- Extract characters from a text field
			LEN() 	- Returns the length of a text field
			ROUND() - Rounds a numeric field to the number of decimals specified
			NOW() 	- Returns the current system date and time
			FORMAT()- Formats how a field is to be displayed


--------------------------------------------------------------------
					SQL GROUP BY Statement
--------------------------------------------------------------------
		Aggregate functions often need an added GROUP BY statement.
		The GROUP BY statement is used in conjunction with the aggregate functions to group the result-set by one or more columns.

		SELECT Shippers.ShipperName,COUNT(Orders.OrderID) AS NumberOfOrders FROM Orders
		LEFT JOIN Shippers
		ON Orders.ShipperID=Shippers.ShipperID
		GROUP BY ShipperName; 


--------------------------------------------------------------------
					SQL HAVING Clause
--------------------------------------------------------------------
		The HAVING clause was added to SQL because the WHERE keyword could not be used with aggregate functions.
		
		SELECT column_name, aggregate_function(column_name)
		FROM table_name
		WHERE column_name operator value
		GROUP BY column_name
		HAVING aggregate_function(column_name) operator value; 
















			







