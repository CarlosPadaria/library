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
The Administrator must be able to register, read, update and delete Users.

### FR3
The Administrator must be able to register, read and delete Borrowings.

### FR4
The Administrator must be able to return a borrowed Book.

## Non Functional Requirements
### NR1
the application must be responsive on all devices.

## Business Rules
### BR1
A User cannot borrow a Book that has not been returned;

### BR2
A User can borrow a maximum of 3 Books at the same time.

### BR3
If a User is deleted, their related Borrowings are deleted too.

### BR4
If a Book is deleted, its related Borrowings are deleted too.
