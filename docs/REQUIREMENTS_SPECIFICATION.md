# Requirements Specification
## Glossary
* **Administrator:** The person who is operating the system;
* **Books:** Refers to the Book entity;
* **Users:** Refers to the User entity;
* **Borrowings:** Refers to the Borrowing entity.

## Functional Requirements

### FR1
The Administrator must be able to register, list, update and delete Books.

### FR2
The Administrator must be able to search the book by title, ISBN or author.

### FR3
The Administrator must be able to register, read, update and delete Users.

### FR4
The Administrator must be able to search Users by unique ID or name.

### FR5
The Administrator must be able to register borrowings by providing the User unique ID and the book's ISBN.

### FR6
The Administrator must be able to list and delete borrowings.

### FR7
The Administrator must be able to return a borrowed Book.

## Non Functional Requirements
### NR1
the application must be responsive on all devices.

## Business Rules
### BR1
A User cannot borrow a Book that has not been returned, and this must be shown;

### BR2
A User can borrow a maximum of 3 Books at the same time.

### BR3
If a User is deleted, their related Borrowings are deleted too.

### BR4
Books aren't necessarily deleted. Instead its status is changed to false, and aren't shown on the book list. 
